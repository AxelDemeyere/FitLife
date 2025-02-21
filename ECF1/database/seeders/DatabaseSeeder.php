<?php

namespace Database\Seeders;

use App\Models\Cours;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Cours::factory(15)->create();
        User::create([
            'name' => 'Axel Demeyere',
            'email' => 'axel.demeyere@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true
        ]);

        $this->call([
            CreneauSeeder::class,
        ]);
    }



}
