<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $user1=User::create([
            'name'=>'TOYI',
            'prenom'=>'Francois',
            'email'=>'t@t.t',
            'contact'=>93526499,
            'password'=>Hash::make('1234'),
        ]);


        $user2=User::create([
            'name'=>'TOYI',
            'prenom'=>'Francois',
            'email'=>'francoistoyi4@gmail.com',
            'contact'=>97607031,
            'password'=>Hash::make('frannois12'),
        ]);


        $utilisateurs = User::factory()->count(10)->create();
        // Attribuez un rôle à chaque utilisateur individuellement
        foreach ($utilisateurs as $utilisateur) {
            $utilisateur->assignRole(Role::find(1)->name);
        }
    }
}
