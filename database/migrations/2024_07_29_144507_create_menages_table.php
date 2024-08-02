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
            $table->string('code')->unique();
            $table->string('personne_a_contacter');
            $table->string('date_abonnement')->default(now());
            $table->string('date_prise_effet')->default(now());
            $table->integer('secteur_id');
            $table->foreign('secteur_id')->references('id')->on('secteurs');// A un secteur on associe 1 où plusieurs menage
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
