<?php

namespace App\Http\Traits;


trait GlobalTrait
{


    // Get current's existing Types of Questions
    public static function getTypes()
    {
        return [
            'textarea',
            'rating',
            'choice',
        ];
    }

    // Get list of existing form's Choices
    public static function getChoices()
    {
        return [
            "Oui",
            "Non",
            "Homme",
            "Femme",
            "Préfère ne pas répondre",
            "Autre",
            "Aucun",
            "Oculus Quest",
            "Oculus Rift/s",
            "HTC Vive",
            "Windows Mixed Reality",
            "Valve index",
            "SteamVR",
            "Occulus store",
            "Viveport",
            "Windows store",
            "Oculus Go",
            "HTC Vive Pro",
            "PSVR",
            "Regarder la TV en direct",
            "Regarder des films",
            "Travailler",
            "Jouer en solo",
            "Jouer en équipe",
        ];
    }

    // Get list of existing form's questions with according Type name
    public static function getDefaultFormQuestions()
    {
        $types = self::getTypes();
        return [
            [
                "type" => $types[0],
                "body" => "Votre adresse mail",
            ],

            [
                "type" => $types[0],
                "body" => "Votre âge",
            ],

            [
                "type" => $types[2],
                "body" => "Votre sexe",
                "choices" => [2, 3, 4],
            ],

            [
                "type" => $types[1],
                "body" => "Nombre de personne dans votre foyer (adulte & enfants)",
            ],

            [
                "type" => $types[0],
                "body" => "Votre profession",
            ],

            [
                "type" => $types[2],
                "body" => "Quel marque de casque VR utilisez-vous ?",
                "choices" => [7, 8, 9, 10, 11],
            ],

            [
                "type" => $types[2],
                "body" => "Sur quel magasin d’application achetez vous des contenus VR ?",
                "choices" => [12, 13, 14, 15],
            ],

            [
                "type" => $types[2],
                "body" => "Quel casque envisagez-vous d’acheter dans un futur proche ?",
                "choices" => [7, 16, 17, 18, 5],
            ],

            [
                "type" => $types[1],
                "body" => "Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder Bigscreen ?",
            ],

            [
                "type" => $types[2],
                "body" => "Vous utilisez principalement Bigscreen pour :",
                "choices" => [19, 20, 21, 22, 23],
            ],

            [
                "type" => $types[1],
                "body" => "Combien donnez-vous de point pour la qualité de l’image sur Bigscreen ?",
            ],

            [
                "type" => $types[1],
                "body" => "Combien donnez-vous de point pour le confort d’utilisation de l’interface Bigscreen ?",
            ],

            [
                "type" => $types[1],
                "body" => "Combien donnez-vous de point pour la connexion réseau de Bigscreen ?",
            ],

            [
                "type" => $types[1],
                "body" => "Combien donnez-vous de point pour la qualité des graphismes 3D dans Bigscreen ?",
            ],

            [
                "type" => $types[1],
                "body" => "Combien donnez-vous de point pour la qualité audio dans Bigscreen ?",
            ],

            [
                "type" => $types[2],
                "body" => "Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?",
                "choices" => [0, 1],
            ],

            [
                "type" => $types[2],
                "body" => "Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?",
                "choices" => [0, 1],
            ],

            [
                "type" => $types[1],
                "body" => "Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?",
            ],

            [
                "type" => $types[1],
                "body" => "Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?",
            ],
            [
                "type" => $types[0],
                "body" => "Quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?",
            ],
        ];
    }
    public static function getDefaultFormInformations()
    {
        return [
            "entitled" => "Formulaire de satisfaction",
            "description" => "Merci de répondre à ce questionnaire pour nous aider à améliorer Bigscreen",
        ];
    }
}
