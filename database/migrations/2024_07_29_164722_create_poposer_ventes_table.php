<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('poposer_ventes', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->string('statut');
            $table->timestamps();

            $table->foreignId('ordure_id')->constrained('ordures')->onDelete('cascade');
            $table->foreignId('menage_vandeur_id')->constrained('menages')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poposer_ventes');
    }
};
