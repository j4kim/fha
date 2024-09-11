<?php

namespace Database\Seeders;

use App\Models\Fund;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fund = Fund::first();

        $fund->lots()->create([
            'name' => 'Gerber Claudine',
            'ref' => '4',
            'date' => '1992-02-03',
            'status' => 'Prêt',
        ]);
    }
}
