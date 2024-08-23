<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            'Admin',
            'Secretaire & Comptable',
            'Volontaire',
            'PCA',
            'Chargé à la communication',
            'Consultant',
            'Responsable Commercial',
            'Conducteur tricycle',
            'Responsable de la ferme',
            'Collectrice & Chargée d\'entretien Bureau',
            'Femme de tri (Présidente)',
            'Femme de tri',
            'Sécurité'
        ];
        // $roles = array('admin', 'agent','comptable','secretaire','volontaire');
        foreach($roles as $role){
            Role::create(['name' => $role]);
        }
    }
}
