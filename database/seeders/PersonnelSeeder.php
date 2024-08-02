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

        // // dd($users);
        $personne1=Personnel::create([
            'etat'=>'Actif',
            'role'=>$roles[0]->name,
            'user_id'=>$users[0]->id,
        ]);
        $personne2=Personnel::create([
            'etat'=>'Actif',
            'role'=>$roles[0]->name,
            'user_id'=>$users[1]->id,
        ]);
        $personne0=Personnel::create([
            'etat' => 'Inactif',
            'role' => $roles[3]->name,
            'user_id' => $users[2]->id,
        ]);
    }
}
