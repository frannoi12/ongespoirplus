<?php

namespace Database\Seeders;

use App\Models\Politique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolitiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Politique::create([
            'description'=>"La pose d'un kit poubelle contre un frais d'adhésion fixé à mille(1000) FCFA.",
            'personnel_id'=>1,
        ]);
        Politique::create([
            'description'=>"Les poubelles demeurent la propriété exclusive de l'ONG Espoir Plus, l'usager doit en pre,dre soin en bon père de famille et s'acquitter des frais de l'option choisie.",
            'personnel_id'=>1,
        ]);
        Politique::create([
            'description'=>"En cas de perte la responsabilité incombe à l'adhérent.",
            'personnel_id'=>1,
        ]);
        Politique::create([
            'description'=>"Si l'élimination des déchets est temporellement suspendue où retardée pour cause de force majeure elle ne donnera pas droit à une réduction de taxes ou de la redevance.",
            'personnel_id'=>1,
        ]);
        Politique::create([
            'description'=>"A partir de Trois(3) mois d'impayés l'ONG Espoir Plus se réserve le droit de retirer le kit de poubelles installé sans préavis.",
            'personnel_id'=>1,
        ]);
        Politique::create([
            'description'=>"Les parties règlent leurs éventuels litiges à l'amiables en présence de la mairie de la commune de Tchaoudjo 1 et le Service Régional d'Hygiène et Assainissement de base (SRHAB-RC). Ce contrat pourra être complété où modifier selon les bésoin du service rendu.",
            'personnel_id'=>1,
        ]);
    }
}
