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
            $table->unsignedBigInteger('ordure_id');
            $table->integer('quantite');
            $table->string('statut');
            $table->unsignedBigInteger('menage_vendeurs_id');
            $table->timestamps();

            $table->foreign('ordure_id')->references('id')->on('ordures');
            $table->foreign('menage_vendeurs_id')->references('id')->on('menages');
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
