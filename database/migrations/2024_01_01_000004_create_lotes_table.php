<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Lotes — agricultural plots/fields within an establishment.
     * Corresponds to: /v2/admin/plot/
     */
    public function up(): void
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productor_id')->nullable()->constrained('productores')->onDelete('set null');
            $table->foreignId('establecimiento_id')->nullable()->constrained('establecimientos')->onDelete('set null');
            $table->string('nombre');
            $table->boolean('activo')->default(true);
            $table->decimal('area', 10, 2)->comment('Surface area in hectares');
            $table->decimal('latitud', 10, 7)->comment('Center point latitude');
            $table->decimal('longitud', 10, 7)->comment('Center point longitude');
            $table->longText('poligono')->nullable()->comment('GeoJSON polygon drawn on map (KML/KMZ import supported)');
            $table->string('codigo_externo', 100)->nullable()->comment('External system reference code');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
