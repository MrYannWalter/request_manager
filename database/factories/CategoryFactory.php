<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'category_code' => $this->faker->unique()->word,
            'label' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}
?>
