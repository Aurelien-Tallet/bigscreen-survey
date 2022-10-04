<?php

namespace Database\Seeders;

use App\Http\Traits\GlobalTrait;
use App\Models\Choice;
use App\Models\Question;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieving array of Types
        $typesCollection = Type::all();
        $types = $typesCollection->all();
        $questions = GlobalTrait::getQuestions();
        $choices = GlobalTrait::getChoices();

        foreach ( $questions as $index => $question) {
            // Get the right Type id based on question Type name
            $type = array_search($question["type"], array_column($types, 'name'));
            // Create Question
            $Question = Question::create([
                'name' => "Question " . $index+1 . "/" . count($questions), // Add the index in the Question
                'body' => $question["body"],
                'type_id' => $types[$type]->id
            ]);
            if($question["type"] == "choice"){
                foreach ($question["choices"] as $choiceIndex){
                    $choice = Choice::where('name',$choices[$choiceIndex]);
                    dd($choice);
                }
            }
        }
    }
}
