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
         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin.com',
         ]);
        $this->call([
            TypesSeeder::class,
            ChoicesSeeder::class,
            FormSeeder::class,
        ]);
    }
}
