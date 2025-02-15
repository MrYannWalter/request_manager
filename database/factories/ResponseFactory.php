<?php

namespace Database\Factories;

use App\Models\Response;
use App\Models\User;
use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponseFactory extends Factory
{
    protected $model = Response::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'request_code' => Request::factory()->create()->request_code,
            'response_code' => $this->faker->unique()->word,
            'label' => $this->faker->word,
            'description' => $this->faker->sentence,
            'date' => $this->faker->date,
        ];
    }
}
?>
