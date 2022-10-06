<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Traits\GlobalTrait;
use App\Models\Type;
use Illuminate\Database\Seeder;
class TypesSeeder extends Seeder
{
    /**
     * Seed the application's database with Types.
     *
     * @return void
     */
    public function run()
    {
        $types = GlobalTrait::getTypes();
        foreach ($types as $type) {
            Type::create([
                'name' => $type
            ]);
        }
    }
}
