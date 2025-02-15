<?php

namespace Database\Factories;

use App\Models\Pjointe;
use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

class PjointeFactory extends Factory
{
    protected $model = Pjointe::class;

    public function definition()
    {
        return [
            'pjointe_code' => $this->faker->unique()->word,
            'request_code' => Request::factory()->create()->request_code,
            'label' => $this->faker->word,
            'file' => $this->faker->filePath(),
        ];
    }
}
?>
