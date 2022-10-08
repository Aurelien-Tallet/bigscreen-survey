<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\Response;
use App\Models\Submission;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class SubmissionSeeder extends Seeder
{
    /**
     * Create 5 different submissions
     *
     * @return void
     */
    public function run()
    {
        //Number of submissions to generate
        $num = 5;
//        Get the form
        $form = Form::all()->first()->with('questions', 'questions.choices', 'questions.type')->get();

//        Get questions
        $questions = $form->pluck('questions')->flatten();


        for ($i = 1; $i <= $num; $i++) {
            $Responses = [];
            foreach ($questions as $question) {
                $type = $question['type']['name'];
                switch ($type) {

                    //        If question is type : textarea, put xxxxxxxxxxx as response
                    case 'textarea':
                        $response =
                            [
                                'response' => [
                                    'question_id' => $question->id,
                                    'response' => "xxxxxxxxxxx"
                                ],
                                'type' => 'textarea'
                            ];
                        $Responses[] = $response;
                        break;

                    //        If question is type : rating, chose a random int between 0 and 5 as response
                    case 'rating':
                        $response =
                            [
                                'response' => [
                                    'question_id' => $question->id,
                                    'response' => rand(0, 5)
                                ],
                                'type' => 'rating'
                            ];
                        $Responses[] = $response;
                        break;

                    //        If question is type : rating, chose a random question's choice
                    case 'choice':
                        $choices = $question['choices'];
                        $response = [
                            'response' => [
                                'question_id' => $question->id,
                                'response' => null
                            ],
                            'type' => 'choice',
                            'choice' => $choices[rand(0, count($choices) - 1)]->response,
                            'question' => $question
                        ];
                        $Responses[] = $response;
                        break;

                    default:
                        # code...
                        break;
                }
            }

            // Create a submission with unique id
            $Submission = Submission::create([
                'form_id' => $form->first()->id,
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
        }
    }
}
