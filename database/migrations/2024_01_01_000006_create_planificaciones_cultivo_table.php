<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Planificaciones de Cultivo — crop planning templates (master campaigns).
     * Defines the crop, sowing season, cycle and agronomic parameters.
     * Corresponds to: /admin/master-campaigns/list
     */
    public function up(): void
    {
        Schema::create('planificaciones_cultivo', function (Blueprint $table) {
            $table->id();
            $table->string('cultivo', 100)->comment('Crop type (e.g. Soja, Maíz, Trigo)');
            $table->string('momento_siembra', 100)->comment('Sowing season (e.g. De primera, De segunda)');
            $table->string('ciclo', 20)->comment('Agricultural cycle (e.g. 2025/2026)');
            $table->string('nombre_referencia')->comment('Auto-generated reference name: cultivo | momento | ciclo');
            $table->string('variedad_hibrido', 150)->nullable()->comment('Seed variety or hybrid');
            $table->decimal('distancia_siembra_cm', 8, 2)->nullable()->comment('Row spacing in centimetres');
            $table->decimal('densidad_objetivo_semillas_ha', 10, 2)->nullable()->comment('Target seed density (seeds/ha)');
            $table->decimal('densidad_objetivo_kg_ha', 10, 2)->nullable()->comment('Target density in kg/ha');
            $table->date('fecha_siembra_objetivo')->nullable()->comment('Target sowing date');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('planificaciones_cultivo');
    }
};
