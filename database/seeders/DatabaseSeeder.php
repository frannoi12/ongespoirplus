<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            RoleHasPermissionSeeder::class,
            UserSeeder::class,
            PersonnelSeeder::class,
            SecteurSeeder::class,
            ServiceSeeder::class,
            PolitiqueSeeder::class,
            TariffSeeder::class,
            EntrepriseRoleSeeder::class,
            // MenageSeeder::class,
        ]);
    }
}
