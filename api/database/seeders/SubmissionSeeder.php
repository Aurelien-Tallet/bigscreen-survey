<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\Response;
use App\Models\Submission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $form = Form::all()->first()->with('questions', 'questions.choices', 'questions.type')->get();
        $questions = $form->pluck('questions')->flatten();
        for ($i = 1; $i <= 5; $i++) {
            $Responses = [];
            foreach ($questions as $question) {
                $type = $question['type']['name'];
                switch ($type) {
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

            $Submission = Submission::create([
                'form_id' => $form->first()->id,
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
        }
    }
}
