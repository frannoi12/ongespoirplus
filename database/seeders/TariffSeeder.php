<?php

namespace Database\Seeders;

use App\Models\Tariff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tariff::create([
            'designation'=>'FCFA Soit un(1) collecte par semaine',
            'montant'=>'1000',
            'personnel_id'=>1
        ]);
        Tariff::create([
            'designation'=>'FCFA Soit deux(2) collecte par semaine',
            'montant'=>'2000',
            'personnel_id'=>1
        ]);
        Tariff::create([
            'designation'=>'FCFA Soit trois(3) collecte par semaine',
            'montant'=>'3000',
            'personnel_id'=>1
        ]);
        Tariff::create([
            'designation'=>'FCFA Soit cinq(5) collecte par semaine',
            'montant'=>'5000',
            'personnel_id'=>1
        ]);
    }
}
