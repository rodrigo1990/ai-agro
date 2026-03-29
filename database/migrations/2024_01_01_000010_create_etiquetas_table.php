<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Etiquetas — tags/labels used to classify and filter entities.
     * Tags appear across: Productores, Establecimientos, Lotes, Campañas.
     */
    public function up(): void
    {
        Schema::create('etiquetas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('society_id')->constrained('societies')->onDelete('cascade');
            $table->string('nombre', 100);
            $table->string('color', 20)->nullable()->comment('Hex color code for UI display');
            $table->timestamps();

            $table->unique(['society_id', 'nombre']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('etiquetas');
    }
};
