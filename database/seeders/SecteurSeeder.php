<?php

namespace Database\Seeders;

use App\Models\Secteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Utilisez la factory pour créer des secteurs fictifs
        // Secteur::factory()->count(8)->create();
        Secteur::create([
            'nomSecteur'=>'BAMADOLO',
            'personnel_id'=>1,
        ]);
        Secteur::create([
            'nomSecteur'=>'LOMNAVA',
            'personnel_id'=>1,
        ]);
        Secteur::create([
            'nomSecteur'=>'TCHAKPALADE',
            'personnel_id'=>1,
        ]);
        Secteur::create([
            'nomSecteur'=>'KOMAH',
            'personnel_id'=>1,
        ]);
        Secteur::create([
            'nomSecteur'=>'KPANGALAM',
            'personnel_id'=>1,
        ]);
        Secteur::create([
            'nomSecteur'=>'DIDAOURE',
            'personnel_id'=>1,
        ]);
        Secteur::create([
            'nomSecteur'=>'AKAMADE',
            'personnel_id'=>1,
        ]);
        Secteur::create([
            'nomSecteur'=>'KWAWOUWORO',
            'personnel_id'=>1,
        ]);
    }
}
