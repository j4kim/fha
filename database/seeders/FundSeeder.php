<?php

namespace Database\Seeders;

use App\Models\Fund;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fund::create([
            'ref' => 'ANC',
            'name' => 'Ancien',
            'description' => 'Ce fonds regroupe tous les documents entrés aux Archives de la CMS avant le 03.04.1980 et qui sont recensés par le catalogue de Mezger et/ou par le Fichier (cartothèque) de 1980.',
            'status' => 'archive',
        ]);

        Fund::factory(20)->create();
    }
}
