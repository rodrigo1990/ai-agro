<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Etiquetables — polymorphic pivot linking etiquetas (tags) to any taggable entity.
     * Supported morph types: Productor, Establecimiento, Lote, Campana.
     */
    public function up(): void
    {
        Schema::create('etiquetables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etiqueta_id')->constrained('etiquetas')->onDelete('cascade');
            $table->morphs('etiquetable'); // adds etiquetable_type (string) + etiquetable_id (unsignedBigInt)
            $table->timestamps();

            $table->unique(['etiqueta_id', 'etiquetable_type', 'etiquetable_id'], 'etiquetables_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('etiquetables');
    }
};
