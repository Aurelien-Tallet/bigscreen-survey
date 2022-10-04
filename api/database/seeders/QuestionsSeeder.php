<?php

namespace Database\Seeders;

use App\Models\Choice;
use App\Models\Question;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{

    const QUESTIONS =
        array(
            ["Votre adresse mail","textarea"],
            ["Votre âge","textarea"],
            ["Votre sexe","choice"],
            ["Nombre de personne dans votre foyer (adulte & enfants)","rating"],
            ["Votre profession","textarea"],
            ["Quel marque de casque VR utilisez-vous ?","choice"],
            ["Sur quel magasin d’application achetez vous des contenus VR ?","choice"],
            ["Quel casque envisagez-vous d’acheter dans un futur proche ?","choice"],
            ["Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder Bigscreen ?","rating"],
            ["Vous utilisez principalement Bigscreen pour :","choice"],
            ["Combien donnez-vous de point pour la qualité de l’image sur Bigscreen ?","rating"],
            ["Combien donnez-vous de point pour le confort d’utilisation de l’interface Bigscreen ?","rating"],
            ["Combien donnez-vous de point pour la connexion réseau de Bigscreen ?","rating"],
            ["Combien donnez-vous de point pour la qualité des graphismes 3D dans Bigscreen ?","rating"],
            ["Combien donnez-vous de point pour la qualité audio dans Bigscreen ?","rating"],
            ["Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?","choice"],
            ["Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?","choice"],
            ["Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?","rating"],
            ["Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?","rating"],
            ["Quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?","textarea"]);

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

        foreach (self::QUESTIONS as $index => $question) {
            // Get the right Type id based on question Type name
            $type = array_search($question[1], array_column($types, 'name'));
            // Create Question
            $Question = Question::create([
                'name' => "Question " . $index+1 . "/" . count(self::QUESTIONS), // Add the index in the Question
                'body' => $question[1],
                'type_id' => $types[$type]->id
            ]);
            if($question[1] == "choice"){
                // $question_id = $Question->id;
                $choice_id = Choice::where('response', $question[0])->first()->id;
                dd($Question->id);

            }
        }
    }
}
