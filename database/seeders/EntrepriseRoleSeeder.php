<?php

namespace Database\Seeders;

use App\Models\EntrepriseRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrepriseRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $EntrepriseRoles = [
            'PCA',
            'Chargé à la communication',
            'Consultant',
            'Responsable Commercial',
            'Secrétaire - Comptable',
            'Conducteur tricycle',
            'Responsable de la ferme',
            'Collectrice & Chargée d\'entretien Bureau',
            'Volontaire',
            'Femme de tri (Présidente)',
            'Femme de tri',
            'Sécurité',
        ];
        // $roles = array('admin', 'agent','comptable','secretaire','volontaire');
        foreach($EntrepriseRoles as $role){
            EntrepriseRole::create(['name' => $role]);
        }
    }
}
