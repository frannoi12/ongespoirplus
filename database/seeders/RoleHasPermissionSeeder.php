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

        
        $Agent_terrain=$roles[1];
        $menage = $roles[2];
        $comptable = $roles[3];
        $secretaire=$roles[4];
        $Volontaire=$roles[5];
        // dd($menage);

        $rollbak_permissions_client = [
            "user_create",
            "user_update",
            "user_delete",
        ];
        foreach ($permissions as $p) {
            if (!(in_array($p, $rollbak_permissions_client))) {
                $comptable->syncPermissions($p);
            }
        }
    }
}
