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
            $table->integer('montant');
            //ici sa concerne un comptable (toute personne qui en caisse de l'argent d'un abonnement)
            $table->foreignId('paiement_id')->constrained('paiements')->onDelete('set null');
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
