<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Factory as Faker;

class ResponsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'sexe' => $faker->randomElement(['homme', 'femme']),
                'telephone' => $faker->phoneNumber,
                'service_code' => strtoupper(Str::random(5)),
                'email_verified_at' => now(),
                'password' => Hash::make('password'), 
                'role' => 'responsable',
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
