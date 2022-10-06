<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Question;
use App\Models\Response;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\Uuid;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Form::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Form::findOrfail($id)->with('questions', 'questions.type', 'questions.choices')->first();
    }
    public function getQuestions($id){
        $questions = Form::findOrfail($id)->with('questions', 'questions.type', 'questions.choices')->first()->only('questions');
        return $questions['questions'];
    }
    public function showSubmission($uuid){
        return Submission::where('uuid', $uuid)->with('responses', 'responses.question', 'responses.question.choices')->first();
    }

    public function submit(Request $request, $id)
    {

        $formQuestions = $this->show($id);
        if(count($formQuestions->questions) != count($request->questions)) {
            return response()->json([
                'message' => 'The number of questions in the form is not the same as the number of questions in the response'
            ], 400);
        }

        $Responses = [];
        foreach ($formQuestions->questions as $key => $question) {
            switch ($question->type->name) {
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
        $Submission = Submission::create([
            'form_id' => $id,
            'uuid' => Uuid::uuid4()->toString(),
            'created_at' => now()
        ]);

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
            'message' => 'Form submitted successfully'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
}
