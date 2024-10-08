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
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('lieu_de_provenance');
            $table->string('etat'); // actif ou inactif
            $table->string('role'); // ce que la personne fait dans l'entreprise
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict'); // Définir la clé étrangère avec suppression en set null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
