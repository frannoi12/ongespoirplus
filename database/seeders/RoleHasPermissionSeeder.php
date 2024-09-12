<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // $roles = Role::all();
        $permissions = Permission::all();

        $admin = Role::where('name', 'Admin')->first();
        $personnel = Role::where('name', 'personnel')->first();

        // dd($admin);

        // $admin = $roles[0];
        $admin->syncPermissions($permissions);


        // $personnel = $roles[2];
        // dd($menage);

        $rollbak_permissions_client = [
            // user general
            "user_create",
            "user_update",
            "user_delete",

            //personnel de l'ong
            "personnel_create",
            "personnel_update",
            "personnel_delete",

            // menage
            "menage_delete",

            // secteur
            "secteur_delete",

            // paiement en liquide
            "liquide_delete",

            //tarrif de paiement
            "tariff_create",
            "tariff_update",
            "tariff_delete",

            // politique de l'entreprise
            "politique_create",
            "politique_update",
            "politique_delete",

            // service
            "service_delete",
        ];

        $permissions_to_assign = $permissions->filter(function ($permission) use ($rollbak_permissions_client) {
            return !in_array($permission->name, $rollbak_permissions_client);
        });

        $personnel->syncPermissions($permissions_to_assign);

        // foreach ($permissions as $p) {
        //     if (!(in_array($p, $rollbak_permissions_client))) {
        //         $personnel->syncPermissions($p);
        //     }
        // }
    }
}
