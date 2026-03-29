<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tipos de Labor — work/labour order types used to classify field activities.
     * Corresponds to: /application-orders-labour-types/
     */
    public function up(): void
    {
        Schema::create('tipos_labor', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->comment('Labour type name (e.g. Plantar Soja, Pulverización)');
            $table->string('tipo_orden_trabajo', 100)->comment('Work order category (e.g. Orden de aplicación, Orden de siembra)');
            $table->string('categoria', 100)->nullable()->comment('Optional sub-category');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipos_labor');
    }
};
