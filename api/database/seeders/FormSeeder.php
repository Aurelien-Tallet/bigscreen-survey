<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Traits\GlobalTrait;
use App\Models\Choice;
use App\Models\Form;
use App\Models\Question;
use App\Models\Type;

class FormSeeder extends Seeder
{
    /**
     * Seed the application's database with Forms.
     *
     * @return void
     */
    public function run()
    {
        $typesCollection = Type::all();
        $types = $typesCollection->all();
        $questions = GlobalTrait::getDefaultFormQuestions();
        $globalChoices = GlobalTrait::getChoices();

        $formInfos = GlobalTrait::getDefaultFormInformations();
        $Form = Form::create([
            'entitled' => $formInfos["entitled"],
            'description' => $formInfos["description"],
        ]);
        foreach ($questions as $index => $question) {
            // Get the right Type id based on question Type name
            $type = array_search($question["type"], array_column($types, 'name'));
            // Create Question
            $Question = Question::create([
                'name' => "Question " . $index + 1 . "/" . count($questions), // Add the index in the Question
                'body' => $question["body"],
                'type_id' => $types[$type]->id
            ]);
            $Form->questions()->attach($Question->id);
            if ($question["type"] == "choice") {
                $questionChoices = [];
                foreach ($question["choices"] as $choice) {
                    $questionChoices[] = $globalChoices[$choice];
                }
                $choices = Choice::whereIn('response', $questionChoices)->get();

                // add in question_choice table id of question and question_id
                $Question->choices()->sync($choices);
            }
        }
    }
}
