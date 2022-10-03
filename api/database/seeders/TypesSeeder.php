<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    // Current's existing Types of Questions 
    const TYPES = [
        'textarea',
        'choice',
        'rating'
    ];
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::TYPES as $type) {
            Type::create([
                'name' => $type
            ]);
        }   
    }
}