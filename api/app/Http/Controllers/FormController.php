<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Response;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Form::all();
    }


    /*
     * Display the specified resource.
     */
    public function show($id)
    {
        return Form::where('id', $id)->with('questions', 'questions.type', 'questions.choices')->firstOrFail();
    }


    /*
     * Display all submissions related to a form based on form's ID
     */
    public function getAllSubmissions($formId)
    {
        $submissions = Form::where("id", $formId)->with('submissions', 'submissions.responses', 'submissions.responses.question', 'submissions.responses.question.type', 'submissions.responses.choices')->firstOrFail()->only('submissions');
        return $submissions['submissions'];
    }


    /*
     * Form Submission / Validation
     */
    public function submit(Request $request, $id)
    {
        // Verifiy if the number of answers is equal to the number of question
        $formQuestions = $this->show($id);
        if (count($formQuestions->questions) != count($request->questions)) {
            return response()->json([
                'message' => 'The number of questions in the form is not the same as the number of questions in the response'
            ], 400);
        }

        $Responses = [];
        // Valid each question in the request and create a response for each question
        foreach ($formQuestions->questions as $key => $question) {
            switch ($question->type->name) {
                // Validate the question by the type of question
                case 'textarea':
                    $validator = Validator::make($request->questions[$key], [
                        'response' => 'required|string|max:255',
                    ]);
                    if ($validator->fails()) {
                        return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
                    }
                    $response =
                        [
                            'response' => [
                                'question_id' => $question->id,
                                'response' => $request->questions[$key]['response']
                            ],
                            'type' => 'textarea'
                        ];
                    array_push($Responses, $response);
                    break;
                case 'rating':
                    $validator = Validator::make($request->questions[$key], [
                        'response' => 'required|int|min:0|max:5',
                    ]);
                    if ($validator->fails()) {
                        return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
                    }
                    $response =
                        [
                            'response' => [
                                'question_id' => $question->id,
                                'response' => strval($request->questions[$key]['response'])
                            ],
                            'type' => 'rating'
                        ];
                    array_push($Responses, $response);
                    break;
                case 'choice':

                    // Check if the response in request is in the choices of the question
                    $choicesResponse = $question->choices->pluck('response')->toArray();
                    if (!in_array($request->questions[$key]['response'], $choicesResponse)) {
                        return response()->json(['message' => 'The response is not in the choices of the question'], 400);
                    }
                    $response = [
                        'response' => [
                            'question_id' => $question->id,
                            'response' => null
                        ],
                        'type' => 'choice',
                        'choice' => $request->questions[$key]['response'],
                        'question' => $question
                    ];
                    array_push($Responses, $response);
                    break;

                default:
                    # code...
                    break;
            }
        }
        // Create a submission with unique id
        $Submission = Submission::create([
            'form_id' => $id,
            'uuid' => Uuid::uuid4()->toString(),
            'created_at' => now()
        ]);
        // Create a response for each question and associate choices if the question is a choice
        foreach ($Responses as $response) {
            $resp = Response::create($response['response']);
            $Submission->responses()->attach($resp->id);
            if ($response['type'] == 'choice') {
                $question = $response['question'];
                $choice = $question->choices->whereIn('response', $response['choice'])->first();
                $resp->choices()->sync($choice->id);
            }
        }

        return response()->json([
            'message' => 'Form submitted successfully',
            'submission' => $Submission->uuid,
        ]);
    }
}
