<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = array(

            //user
            "user_create",
            "user_update",
            "user_delete",
            "user_show",
            "user_index",

            //personnel
            "personnel_create",
            "personnel_update",
            "personnel_delete",
            "personnel_show",
            "personnel_index",

            //menange
            "menage_create",
            "menage_update",
            "menage_delete",
            "menage_show",
            "menage_index",

            //secteur
            "secteur_create",
            "secteur_update",
            "secteur_delete",
            "secteur_show",
            "secteur_index",

            //tourne
            "tourne_create",
            "tourne_update",
            "tourne_delete",
            "tourne_show",
            "tourne_index",

            //tarif
            "tarif_create",
            "tarif_update",
            "tarif_delete",
            "tarif_show",
            "tarif_index",

            //liquide
            "liquide_create",
            "liquide_update",
            "liquide_delete",
            "liquide_show",
            "liquide_index",

            //politiques
            "politique_create",
            "politique_update",
            "politique_delete",
            "politique_show",
            "politique_index",
            ""
        );

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}
