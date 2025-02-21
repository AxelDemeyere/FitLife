<?php

namespace Database\Factories;

use App\Models\Cours;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CoursFactory extends Factory
{
    protected $model = Cours::class;

    public function definition(): array
    {
        $sports = [
            'Yoga Flow' => 'Séance de yoga dynamique pour améliorer force et souplesse',
            'CrossFit' => 'Entraînement haute intensité combinant cardio et musculation',
            'Pilates Fusion' => 'Renforcement des muscles profonds et amélioration de la posture',
            'Zumba Dance' => 'Cours de fitness dansé sur des rythmes latins',
            'Body Pump' => 'Cours collectif de renforcement musculaire en musique',
            'Spinning Cardio' => 'Cours de vélo en salle avec coach et musique motivante',
            'HIIT Training' => 'Entraînement fractionné de haute intensité pour brûler un maximum de calories',
            'Boxing Fitness' => 'Initiation aux techniques de boxe et cardio intense',
            'TRX Core' => 'Entraînement en suspension pour renforcer tout le corps',
            'Stretching' => 'Séance d\'étirements pour améliorer la souplesse et la récupération',
            'Bootcamp Military' => 'Entraînement type militaire en groupe pour repousser ses limites',
            'Aqua Gym' => 'Exercices dynamiques dans l\'eau pour une remise en forme en douceur',
            'Power Yoga' => 'Yoga dynamique axé sur la force et l\'endurance',
            'Circuit Training' => 'Parcours d\'exercices variés pour un entraînement complet',
            'Step Advanced' => 'Chorégraphies dynamiques sur step pour brûler les calories'
        ];

        $nom = $this->faker->unique()->randomElement(array_keys($sports));

        return [
            'nom' => $nom,
            'description' => $sports[$nom],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
