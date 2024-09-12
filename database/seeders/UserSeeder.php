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


        $user=User::create([
            'name'=>'TOYI',
            'prenom'=>'Francois',
            'email'=>'francoistoyi4@gmail.com',
            'contact'=>97607031,
            'password'=>Hash::make('frannois12'),
        ]);
        $user1=User::create([
            'name'=>'DERMANE',
            'prenom'=>'Fad',
            'email'=>'dermanefad1@gmail.com',
            'contact'=>90148882,
            'password'=>Hash::make('F@d-28101998'),
        ]);

        $users = [
            ['name' => 'OMOROU', 'prenom' => 'K. Aboubakar', 'email' => 'aboubakar.omorou@example.com', 'contact' => '90111756', 'password' => Hash::make('password')],
            ['name' => 'BIWE-ISSODOJO', 'prenom' => 'Abdel Azize', 'email' => 'voixdelumiere2018@gmail.com', 'contact' => '92588561', 'password' => Hash::make('password')],
            ['name' => 'TCHEDRE', 'prenom' => 'Saharou', 'email' => 'saharou.tchedre@example.com', 'contact' => '90713850', 'password' => Hash::make('password')],
            ['name' => 'OURO-TAGBA', 'prenom' => 'Habibou', 'email' => 'habibou.ouro@example.com', 'contact' => '92139616', 'password' => Hash::make('password')],
            ['name' => 'ALKARPEY', 'prenom' => 'Firdouss', 'email' => 'firdouss.alkarpey@example.com', 'contact' => '90251772', 'password' => Hash::make('password')],
            ['name' => 'TEHCINODO', 'prenom' => 'Abdou', 'email' => 'abdou.tehcinodo@example.com', 'contact' => '90487515', 'password' => Hash::make('password')],
            ['name' => 'N\'ZONOU', 'prenom' => 'Deyadéma', 'email' => 'deyadema.nzounou@example.com', 'contact' => '92877621', 'password' => Hash::make('password')],
            ['name' => 'GNON', 'prenom' => 'Damba', 'email' => 'damba.gnon@example.com', 'contact' => '92883168', 'password' => Hash::make('password')],
            ['name' => 'GNONFAM', 'prenom' => 'Expedi', 'email' => 'expedi.gnonfam@example.com', 'contact' => '90776590', 'password' => Hash::make('password')],
            ['name' => 'MADDOURI', 'prenom' => 'Mohamed Amine', 'email' => 'mohamedamine.maddouri@example.com', 'contact' => '91215324', 'password' => Hash::make('password')],
            ['name' => 'AFFO', 'prenom' => 'Koumouw', 'email' => 'koumouw.affo@example.com', 'contact' => '92113730', 'password' => Hash::make('password')],
            ['name' => 'Bassarou', 'prenom' => 'OURO-BANG\'NA', 'email' => 'bassarou.ouro@example.com', 'contact' => '96698107', 'password' => Hash::make('password')],
            ['name' => 'BOURAÏMA', 'prenom' => 'Foudou', 'email' => 'foudou.bouraima@example.com', 'contact' => '70459574', 'password' => Hash::make('password')],
            ['name' => 'SIBABI OURO AGOUDA', 'prenom' => 'Yaminou', 'email' => 'yaminou.sibabi@example.com', 'contact' => '91213826', 'password' => Hash::make('password')],
            ['name' => 'AGBEDOUPE', 'prenom' => 'Afi', 'email' => 'afi.agbedoupe@example.com', 'contact' => '70265318', 'password' => Hash::make('password')],
            ['name' => 'KERIM', 'prenom' => 'Nouriatou', 'email' => 'nouriatou.kerim@example.com', 'contact' => '70096933', 'password' => Hash::make('password')],
            ['name' => 'KOUKO', 'prenom' => 'Safouratou', 'email' => 'safouratou.kouko@example.com', 'contact' => '90718713', 'password' => Hash::make('password')],
            ['name' => 'AROUNA', 'prenom' => 'Sadia', 'email' => 'sadia.arouna@example.com', 'contact' => '91554616', 'password' => Hash::make('password')],
            ['name' => 'EGBARE', 'prenom' => 'Abalonoyon', 'email' => 'abalonoyon.egbare@example.com', 'contact' => '92782800', 'password' => Hash::make('password')],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }


        // $utilisateurs = User::factory()->count(10)->create();
        // Attribuez un rôle à chaque utilisateur individuellement
        // foreach ($utilisateurs as $utilisateur) {
        //     $utilisateur->assignRole(Role::find(1)->name);
        // }
    }
}
