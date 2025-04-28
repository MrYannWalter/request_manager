<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'sexe' => $faker->randomElement(['masculin', 'féminin']),
                'telephone' => $faker->phoneNumber,
                'service_code' => strtoupper($faker->bothify('SRV-###??')),
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // mot de passe par défaut
                'role' => 'agent',
                'remember_token' => \Str::random(10),
            ]);
        }
    }
}
