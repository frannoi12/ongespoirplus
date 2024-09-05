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
        Schema::create('tournees', function (Blueprint $table) {
            $table->id();
            $table->string('type_tourne'); // général(pour l'agence) ou simple(pour les agents de terrain)
            $table->string('statut'); // accomplie, en cours,
            $table->string('date_jour')->default(now());
            $table->foreignId('secteur_id')->constrained('secteurs')->onDelete('set null');// A un secteur on associe 1 où plusieurs menage
            $table->foreignId('personnel_id')->constrained('personnels')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournees');
    }
};
