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
        Schema::create('menages', function (Blueprint $table) {
            $table->id();
            $table->string('type_menage');
            $table->boolean('politique');
            $table->string('code');
            $table->json('localisation')->nullable();
            $table->string('date_abonnement')->default(now());
            $table->string('date_prise_effet')->default(now());
            $table->foreignId('secteur_id')->constrained('secteurs')->onDelete('cascade');// A un secteur on associe 1 où plusieurs menage
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict'); // Définir la clé étrangère avec suppression en cascade
            $table->foreignId('tariff_id')->constrained('tariffs')->onDelete('cascade'); // Définir la clé étrangère avec suppression en cascade
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menages');
    }
};
