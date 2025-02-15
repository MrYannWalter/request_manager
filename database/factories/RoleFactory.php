<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition(): array
    {
        return [
            'role_code' => $this->faker->unique()->word(),
            'label' => $this->faker->word(),
            'description' => $this->faker->sentence(),
        ];
    }
}
