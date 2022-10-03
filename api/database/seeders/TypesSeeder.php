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

    const TYPES = [
        'textarea',
        'choice',
        'rating'
    ];
    public function run()
    {
        foreach (self::TYPES as $type) {
            Type::create([
                'name' => $type
            ]);
        }   
    }
}