<?php

namespace Database\Data;

class Data
{
    // Current's existing Types of Questions 
    const TYPES = [
        'textarea',
        'rating',
        'choice',
    ];

    // List of existing form's Choices
    const CHOICES =
    [
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

    // List of existing form's questions with according Type name
    const QUESTIONS = [
        [
            "type" => self::TYPES[0],
            "question" => "Votre adresse mail",
        ],

        [
            "type" => self::TYPES[0],
            "question" => "Votre âge",
        ],

        [
            "type" => self::TYPES[1],
            "question" => "Votre sexe",
            "choices" => [2, 3, 4],
        ],

        [
            "type" => self::TYPES[2],
            "question" => "Nombre de personne dans votre foyer (adulte & enfants)",
        ],

        [
            "type" => self::TYPES[0],
            "question" => "Votre profession",
        ],

        [
            "type" => self::TYPES[1],
            "question" => "Quel marque de casque VR utilisez-vous ?",
            "choices" => [7, 8, 9, 10, 11],
        ],

        [
            "type" => self::TYPES[1],
            "question" => "Sur quel magasin d’application achetez vous des contenus VR ?",
            "choices" => [12, 13, 14, 15],
        ],

        [
            "type" => self::TYPES[1],
            "question" => "Quel casque envisagez-vous d’acheter dans un futur proche ?",
            "choices" => [7, 16, 17, 18, 5],
        ],

        [
            "type" => self::TYPES[2],
            "question" => "Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder Bigscreen ?",
        ],

        [
            "type" => self::TYPES[1],
            "question" => "Vous utilisez principalement Bigscreen pour :",
            "choices" => [19, 20, 21, 22, 23],
        ],

        [
            "type" => self::TYPES[2],
            "question" => "Combien donnez-vous de point pour la qualité de l’image sur Bigscreen ?",
        ],

        [
            "type" => self::TYPES[2],
            "question" => "Combien donnez-vous de point pour le confort d’utilisation de l’interface Bigscreen ?",
        ],

        [
            "type" => self::TYPES[2],
            "question" => "Combien donnez-vous de point pour la connexion réseau de Bigscreen ?",
        ],

        [
            "type" => self::TYPES[2],
            "question" => "Combien donnez-vous de point pour la qualité des graphismes 3D dans Bigscreen ?",
        ],

        [
            "type" => self::TYPES[2],
            "question" => "Combien donnez-vous de point pour la qualité audio dans Bigscreen ?",
        ],

        [
            "type" => self::TYPES[1],
            "question" => "Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?",
            "choices" => [0, 1],
        ],

        [
            "type" => self::TYPES[1],
            "question" => "Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?",
            "choices" => [0, 1],
        ],

        [
            "type" => self::TYPES[2],
            "question" => "Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?",
        ],

        [
            "type" => self::TYPES[2],
            "question" => "Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?",
        ],
        [
            "type" => self::TYPES[0],
            "question" => "Quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?",
        ],
    ];
}
