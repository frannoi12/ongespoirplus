<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['code_service' => 'H', 'type_service' => 'Hotel','personnel_id'=>1],
            ['code_service' => 'R', 'type_service' => 'Restaurant','personnel_id'=>1],
            ['code_service' => 'R', 'type_service' => 'Bar-Restaurant','personnel_id'=>1],
            ['code_service' => 'R', 'type_service' => 'Bar','personnel_id'=>1],
            ['code_service' => ' ', 'type_service' => 'Menage','personnel_id'=>1],
            ['code_service' => 'CMS', 'type_service' => 'Centre Médicale','personnel_id'=>1],
            ['code_service' => 'B', 'type_service' => 'Boutique','personnel_id'=>1],
            ['code_service' => 'P', 'type_service' => 'Primaire','personnel_id'=>1],
            ['code_service' => 'C', 'type_service' => 'Collège','personnel_id'=>1],
            ['code_service' => 'L', 'type_service' => 'Lycée','personnel_id'=>1],
            ['code_service' => 'S', 'type_service' => 'Services','personnel_id'=>1],
            // Ajouter d'autres services selon vos besoins
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
