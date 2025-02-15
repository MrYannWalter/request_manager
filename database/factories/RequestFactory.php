<?php

namespace Database\Factories;

use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Request::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'request_code' => $this->faker->unique()->numerify('REQ-#####'),
            'user_id' => \App\Models\User::factory(),
            'category_code' => $this->faker->word,
            'subject' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'date' => $this->faker->dateTime,
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
