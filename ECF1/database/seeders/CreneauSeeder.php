<?php

namespace Database\Seeders;

use App\Models\Creneau;
use App\Models\Cours;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CreneauSeeder extends Seeder
{
    public function run(): void
    {
        $cours = Cours::all();

        foreach ($cours as $cours) {
            // Créer 3 créneaux pour chaque cours
            for ($i = 0; $i < 3; $i++) {
                $date = Carbon::now()->addDays($i)->setHour(rand(9, 17))->setMinute(0);

                Creneau::create([
                    'date_heure' => $date,
                    'cours_id' => $cours->id
                ]);
            }
        }
    }
}
