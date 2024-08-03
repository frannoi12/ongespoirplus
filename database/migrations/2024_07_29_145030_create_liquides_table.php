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
            //ici sa concerne un comptable (toute personne qui en caisse de l'argent d'un abonnement)
            $table->foreignId('personnel_id')->constrained('personnels')->onDelete('cascade');
            $table->foreignId('paiement_id')->constrained('paiements')->onDelete('cascade');
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
