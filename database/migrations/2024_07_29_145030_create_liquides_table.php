<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('liquides', function (Blueprint $table) {
            $table->id();
            $table->string('type_paiement'); // c'est-à-dire en espèce où par chèque.
            $table->string('statut'); //Un indicateur du statut du paiement (par exemple, "en attente", "confirmé", "annulé", etc.).
            $table->string('date_paiement')->default(now()); //Date du paiement.
            $table->integer('personnel_id');//ici sa concerne un comptable (toute personne qui en caisse de l'argent d'un abonnement)
            $table->foreign('personnel_id')->references('id')->on('personnels');
            $table->integer('paiement_id');
            $table->foreign('paiement_id')->references('id')->on('paiements'); //j'ai mis ceci en passant à comment récupéré l'attribut montant dans la table paiement
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liquides');
    }
};
