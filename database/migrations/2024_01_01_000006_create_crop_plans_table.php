<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crop Plans — crop planning templates (master campaigns).
     * Defines the crop, sowing season, cycle and agronomic parameters.
     * Corresponds to: /admin/master-campaigns/list
     */
    public function up(): void
    {
        Schema::create('crop_plans', function (Blueprint $table) {
            $table->id();
            $table->string('crop', 100)->comment('Crop type (e.g. Soja, Maíz, Trigo)');
            $table->string('sowing_season', 100)->comment('Sowing season (e.g. De primera, De segunda)');
            $table->string('cycle', 20)->comment('Agricultural cycle (e.g. 2025/2026)');
            $table->string('reference_name')->comment('Auto-generated reference name: crop | sowing_season | cycle');
            $table->string('variety_hybrid', 150)->nullable()->comment('Seed variety or hybrid');
            $table->decimal('sowing_distance_cm', 8, 2)->nullable()->comment('Row spacing in centimetres');
            $table->decimal('target_density_seeds_ha', 10, 2)->nullable()->comment('Target seed density (seeds/ha)');
            $table->decimal('target_density_kg_ha', 10, 2)->nullable()->comment('Target density in kg/ha');
            $table->date('target_sowing_date')->nullable()->comment('Target sowing date');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crop_plans');
    }
};
