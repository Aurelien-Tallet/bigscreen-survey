<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    const CHOICE = 
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
    
    public function run()
    {
        foreach (self::CHOICE as $choice) {
            Type::create([
                'response' => $choice
            ]);
        }
    }
}
