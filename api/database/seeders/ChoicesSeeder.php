<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Choice;
use App\Models\Type;
use Database\Data\Data;
use Illuminate\Database\Seeder;

class ChoicesSeeder extends Seeder
{


  

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (Data::CHOICES as $choice) {

            // Create Choice
            Choice::create([
                'response' => $choice
            ]);
        }
    }
}
