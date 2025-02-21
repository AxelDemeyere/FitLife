<?php

namespace Database\Factories;

use App\Models\Cours;
use App\Models\Creneau;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CreneauFactory extends Factory
{
    protected $model = Creneau::class;

    public function definition()
    {
        return [
            'date_heure' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'id_cours' => Cours::factory(),
        ];
    }
}
