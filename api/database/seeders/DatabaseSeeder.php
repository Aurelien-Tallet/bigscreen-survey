<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        $this->call([
            UserSeeder::class,
            TypesSeeder::class,
            ChoicesSeeder::class,
            FormSeeder::class,
        ]);
    }
}
