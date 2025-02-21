<?php

namespace Database\Factories;

use App\Models\Creneau;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'creneaux_id' => Creneau::factory(),
        ];
    }
}
