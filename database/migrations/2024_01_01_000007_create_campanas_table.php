<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Campañas — active crop campaigns tied to a specific lote and planning.
     * Tracks real sowing dates, emergence, densities and field metrics.
     * Corresponds to: /admin/campaign/list
     */
    public function up(): void
    {
        Schema::create('campanas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productor_id')->nullable()->constrained('productores')->onDelete('set null');
            $table->foreignId('establecimiento_id')->nullable()->constrained('establecimientos')->onDelete('set null');
            $table->foreignId('lote_id')->nullable()->constrained('lotes')->onDelete('set null');
            $table->foreignId('planificacion_cultivo_id')->nullable()->constrained('planificaciones_cultivo')->onDelete('set null');

            // Sowing dates
            $table->date('fecha_siembra_objetivo')->nullable()->comment('Planned sowing date');
            $table->date('fecha_siembra')->nullable()->comment('Actual sowing date');
            $table->date('fecha_emergencia')->nullable()->comment('Crop emergence date');

            // Agronomic metrics
            $table->unsignedSmallInteger('dds')->nullable()->default(0)->comment('Days since sowing (DDS)');
            $table->decimal('gm', 5, 2)->nullable()->comment('Maturity group (GM)');
            $table->string('variedad_hibrido', 150)->nullable()->comment('Seed variety or hybrid used');
            $table->string('sistema_siembra', 100)->nullable()->comment('Sowing system (e.g. Directa, Convencional)');
            $table->string('des', 100)->nullable()->comment('Plant density / stand establishment');
            $table->decimal('area_sembrada_objetivo', 10, 2)->nullable()->comment('Target sown area in hectares');

            $table->string('codigo_externo', 100)->nullable()->comment('External system reference code');
            $table->text('observaciones')->nullable()->comment('Free-text notes or observations');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campanas');
    }
};
