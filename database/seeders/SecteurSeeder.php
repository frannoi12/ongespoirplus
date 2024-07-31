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
        ]);
        Secteur::create([
            'nomSecteur'=>'LOMNAVA',
        ]);
        Secteur::create([
            'nomSecteur'=>'TCHAKPALADE',
        ]);
        Secteur::create([
            'nomSecteur'=>'KOMAH',
        ]);
        Secteur::create([
            'nomSecteur'=>'KPANGALAM',
        ]);
        Secteur::create([
            'nomSecteur'=>'DIDAOURE',
        ]);
        Secteur::create([
            'nomSecteur'=>'AKAMADE',
        ]);
        Secteur::create([
            'nomSecteur'=>'KWAWOUWORO',
        ]);
    }
}
