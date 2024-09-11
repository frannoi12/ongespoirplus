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

        $roles = Role::all();
        $permissions = Permission::all();

        $admin = $roles[0];
        $admin->syncPermissions($permissions);


        // $Agent_terrain=$roles[1];
        // $menage = $roles[2];
        $personnel = $roles[2];
        // $secretaire=$roles[3];
        // $Volontaire=$roles[4];
        // dd($menage);

        $rollbak_permissions_client = [
            "user_create",
            "user_update",
            "user_delete",
            "personnel_create",
            "personnel_update",
            "personnel_delete",
            "menage_delete",
            "secteur_delete",
            "liquide_delete",
            "tarif_create",
            "tarif_update",
            "tarif_delete",
            "politique_create",
            "politique_update",
            "politique_delete",
        ];
        foreach ($permissions as $p) {
            if (!(in_array($p, $rollbak_permissions_client))) {
                $personnel->syncPermissions($p);
            }
        }
    }
}
