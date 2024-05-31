<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('clients')->insert([
                  'full_name_en' => $faker->name,
        'full_name_ar' => $faker->name,
        'user_name' => $faker->userName,
        'email' => $faker->email,
        'mobile' => $faker->phoneNumber,
        'country' => $faker->country,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }   
    }
}
