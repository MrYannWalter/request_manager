<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Request;
use App\Models\Category;
use App\Models\Pjointe;
use App\Models\Response;
use App\Models\Service;
use App\Models\Role;
use App\Models\UserRole;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed users and their roles
        User::factory(10)->create()->each(function ($user) {
            UserRole::factory()->create(['user_id' => $user->user_id]);
        });

        // Seed other models
        Request::factory(10)->create();
        Response::factory(10)->create();
        Category::factory(10)->create();
        Pjointe::factory(10)->create();
        Service::factory(10)->create();
        Role::factory(10)->create();

        // Seed a specific test user
        User::factory()->create([
            'user_id' => 1,
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'test@example.com',
            'username' => 'testuser',
            'password' => bcrypt('password'),
            'service_code' => 'default_service_code',
        ]);
    }
}
?>
