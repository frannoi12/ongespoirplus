<?php

namespace Database\Seeders;

use App\Models\Menage;
use App\Models\Secteur;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $secteurs = Secteur::all();
        $services = Service::all();

        foreach ($secteurs as $secteur) {
            foreach ($services as $service) {
                // Get the highest existing menage number in the current sector and service
                $lastMenage = Menage::where('secteur_id', $secteur->id)
                    ->where('service_id', $service->id)
                    ->orderBy('id', 'desc')
                    ->first();

                $lastNumber = $lastMenage ? intval($lastMenage->code) : 0;
                if ($service->code_service !== ' ') {
                    $code = $service->code_service . '-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
                } else {
                    $code = $secteur->nomSecteur . '-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
                }

                // $lastNumber = $lastMenage ? intval(explode('-', $lastMenage->code)[1]) : 0;

                // // Generate the code for the new menage, ensuring two digits
                // $code = $service->code_service . '-' . str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);


                Menage::create([
                    'type_menage' => 1,
                    'politique' => true,
                    'code' => $code,
                    'date_abonnement' => now(),
                    'date_prise_effet' => now(),
                    'secteur_id' => $secteur->id,
                    'user_id' => User::inRandomOrder()->first()->id,
                    'tariff_id' => 1,
                    'service_id' => $service->id,
                ]);
            }
        }
    }
}
