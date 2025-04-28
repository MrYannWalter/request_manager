<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class StudentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'sexe' => $faker->randomElement(['Masculin', 'Féminin']),
                'telephone' => $faker->phoneNumber,
                'service_code' => strtoupper(Str::random(8)),
                'password' => Hash::make('password'), // mot de passe fixe pour les tests
                'role' => 'etudiant',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
