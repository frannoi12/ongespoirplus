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
        Schema::create('ordures', function (Blueprint $table) {
            $table->id();
            $table->string('type_ordure');//papier carton,sachet pure watter,sachet flottant,pastique solide,etc ...
            $table->string('statut');//Savoir si l'ordure est toujours recyclé par l'entreprise où pas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordures');
    }
};
