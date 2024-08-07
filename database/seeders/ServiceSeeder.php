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
            ['code_service' => 'H', 'type_service' => 'Hotel'],
            ['code_service' => 'R', 'type_service' => 'Restaurant'],
            ['code_service' => 'R', 'type_service' => 'Bar-Restaurant'],
            ['code_service' => 'R', 'type_service' => 'Bar'],
            ['code_service' => ' ', 'type_service' => 'menage'],
            ['code_service' => 'CMS', 'type_service' => 'Centre Médicale'],
            ['code_service' => 'B', 'type_service' => 'Boutique'],
            ['code_service' => 'P', 'type_service' => 'Primaire'],
            ['code_service' => 'C', 'type_service' => 'Collège'],
            ['code_service' => 'L', 'type_service' => 'Lycée'],
            ['code_service' => 'S', 'type_service' => 'Services'],
            // Ajouter d'autres services selon vos besoins
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
