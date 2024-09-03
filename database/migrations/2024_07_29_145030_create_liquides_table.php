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
            $table->string('date_paiement')->default(now()); //Date du paiement.
            $table->integer('nbre_mois');
            $table->integer('montant');
            $table->text('montant_lettre');
            $table->text('objet');
            //ici sa concerne un comptable (toute personne qui en caisse de l'argent d'un abonnement)
            $table->foreignId('paiement_id')->constrained('paiements')->onDelete('cascade');
            $table->foreignId('secteur_id')->constrained('secteurs')->onDelete('cascade');
            $table->foreignId('tariff_id')->constrained('tariffs')->onDelete('cascade');
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
