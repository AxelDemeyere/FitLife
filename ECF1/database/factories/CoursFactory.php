<?php

namespace Database\Factories;

use App\Models\Cours;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CoursFactory extends Factory
{
    protected $model = Cours::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
