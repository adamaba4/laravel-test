<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Créer un utilisateur de test
        \App\Models\User::create([
            'name' => 'Adama BAH',
            'email' => 'bah04.adam@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        // Créer un utilisateur admin pour Filament
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
        ]);

        // Créer les propriétés
        \App\Models\Property::create([
            'name' => 'Appartement Paris 11e',
            'description' => 'Bel appartement lumineux de 50m² proche du métro.',
            'price_per_night' => 85.00,
        ]);

        \App\Models\Property::create([
            'name' => 'Villa Côte d\'Azur',
            'description' => 'Grande villa avec piscine et vue sur mer.',
            'price_per_night' => 250.00,
        ]);

        \App\Models\Property::create([
            'name' => 'Studio Lyon Centre',
            'description' => 'Studio moderne en plein centre-ville.',
            'price_per_night' => 55.00,
        ]);

        \App\Models\Property::create([
            'name' => 'Loft Bordeaux',
            'description' => 'Loft industriel rénové avec terrasse et parking.',
            'price_per_night' => 120.00,
        ]);

        \App\Models\Property::create([
            'name' => 'Chalet Alpes',
            'description' => 'Chalet cosy au pied des pistes de ski.',
            'price_per_night' => 180.00,
        ]);

        \App\Models\Property::create([
            'name' => 'Maison Bretagne',
            'description' => 'Maison de charme avec vue sur mer à 5 min de la plage.',
            'price_per_night' => 95.00,
        ]);
    }
}
