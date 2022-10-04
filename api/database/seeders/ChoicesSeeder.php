<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Traits\GlobalTrait;
use App\Models\Choice;
use App\Models\Type;
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
        $choices = GlobalTrait::getChoices();
        foreach ($choices as $choice) {

            // Create Choice
            Choice::create([
                'response' => $choice
            ]);
        }
    }
}
