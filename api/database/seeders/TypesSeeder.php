<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Type;
use Database\Data\Data;
use Illuminate\Database\Seeder;
class TypesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (Data::TYPES as $type) {
            Type::create([
                'name' => $type
            ]);
        }
    }
}
