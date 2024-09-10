<?php

namespace Database\Seeders;

use App\Models\Personnel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::all();
        $roles= Role::all();

        // Création des enregistrements Personnel avec lieu de provenance
        $personnelsData = [
            ['user_email' => 'aboubakar.omorou@example.com', 'lieu_de_provenance' => 'Bouré-Koufouloumlé', 'etat' => 'Actif', 'role' => 'PCA'],
            ['user_email' => 'abdel.azize@example.com', 'lieu_de_provenance' => 'Pangalam', 'etat' => 'Actif', 'role' => 'Chargé à la communication'],
            ['user_email' => 'saharou.tchedre@example.com', 'lieu_de_provenance' => 'Salimdè', 'etat' => 'Actif', 'role' => 'Consultant'],
            ['user_email' => 'habibou.ouro@example.com', 'lieu_de_provenance' => 'Kouloundè', 'etat' => 'Actif', 'role' => 'Responsable Commercial'],
            ['user_email' => 'firdouss.alkarpey@example.com', 'lieu_de_provenance' => 'Pangalam Chateau', 'etat' => 'Actif', 'role' => 'Secrétaire - Comptable'],
            ['user_email' => 'abdou.tehcinodo@example.com', 'lieu_de_provenance' => 'Akamadè', 'etat' => 'Actif', 'role' => 'Conducteur tricycle'],
            ['user_email' => 'deyadema.nzounou@example.com', 'lieu_de_provenance' => 'Tehawanda', 'etat' => 'Actif', 'role' => 'Responsable de la ferme'],
            ['user_email' => 'damba.gnon@example.com', 'lieu_de_provenance' => 'Tchawanda', 'etat' => 'Actif', 'role' => 'Collectrice & Chargée d\'entretien Bureau'],
            ['user_email' => 'expedi.gnonfam@example.com', 'lieu_de_provenance' => 'Tchawanda', 'etat' => 'Actif', 'role' => 'Volontaire'],
            ['user_email' => 'mohamedamine.maddouri@example.com', 'lieu_de_provenance' => 'Barrière', 'etat' => 'Actif', 'role' => 'Volontaire'],
            ['user_email' => 'koumouw.affo@example.com', 'lieu_de_provenance' => 'Komah', 'etat' => 'Actif', 'role' => 'Conducteur tricycle'],
            ['user_email' => 'bassarou.ouro@example.com', 'lieu_de_provenance' => 'Didauré', 'etat' => 'Actif', 'role' => 'Conducteur tricycle'],
            ['user_email' => 'foudou.bouraima@example.com', 'lieu_de_provenance' => 'Akamadè', 'etat' => 'Actif', 'role' => 'Conducteur tricycle'],
            ['user_email' => 'yaminou.sibabi@example.com', 'lieu_de_provenance' => 'Kuwawu-woro', 'etat' => 'Actif', 'role' => 'Conducteur tricycle'],
            ['user_email' => 'afi.agbedoupe@example.com', 'lieu_de_provenance' => 'Kouloundè', 'etat' => 'Actif', 'role' => 'Femme de tri (Présidente)'],
            ['user_email' => 'nouriatou.kerim@example.com', 'lieu_de_provenance' => 'Kouloundè', 'etat' => 'Actif', 'role' => 'Femme de tri'],
            ['user_email' => 'safouratou.kouko@example.com', 'lieu_de_provenance' => 'Kouloundè', 'etat' => 'Actif', 'role' => 'Femme de tri'],
            ['user_email' => 'sadia.arouna@example.com', 'lieu_de_provenance' => 'Salimdè', 'etat' => 'Actif', 'role' => 'Femme de tri'],
            ['user_email' => 'abalonoyon.egbare@example.com', 'lieu_de_provenance' => 'Tehawanda', 'etat' => 'Actif', 'role' => 'Sécurité'],
        ];



        $personne1=Personnel::create([
            'lieu_de_provenance' => 'Bamadolo',
            'etat'=>'Actif',
            'role'=>$roles[0]->name,
            'user_id'=>$users[0]->id,
        ]);


        foreach ($personnelsData as $data) {
            $user = $users->where('email', $data['user_email'])->first();
            // $role = $roles->where('name', $data['role'])->first();

            if ($user) {
                Personnel::create([
                    'user_id' => $user->id,
                    'lieu_de_provenance' => $data['lieu_de_provenance'],
                    'etat' => $data['etat'],
                    'role' => $data['role'],
                ]);

                $user->assignRole($roles[2]);
            }
        }



        // // // dd($users);
        // $personne1=Personnel::create([
        //     'etat'=>'Actif',
        //     'role'=>$roles[0]->name,
        //     'user_id'=>$users[0]->id,
        // ]);
        // $personne2=Personnel::create([
        //     'etat'=>'Actif',
        //     'role'=>$roles[0]->name,
        //     'user_id'=>$users[1]->id,
        // ]);
        // $personne0=Personnel::create([
        //     'etat' => 'Inactif',
        //     'role' => $roles[3]->name,
        //     'user_id' => $users[2]->id,
        // ]);
    }
}
