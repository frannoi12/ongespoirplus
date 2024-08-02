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
        Schema::create('mobile_moneys', function (Blueprint $table) {
            $table->id();
            $table->string('type_mobile_money'); // pour savoir si c'est flooz où tmoney
            $table->foreignId('paiement_id')->constrained('paiements')->onDelete('cascade');
            $table->string('ref_transaction'); //ici on récupère les informations concernant une transaction
            $table->string('devise')->default('frcfa');
            $table->string('date_transaction')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_moneys');
    }
};
