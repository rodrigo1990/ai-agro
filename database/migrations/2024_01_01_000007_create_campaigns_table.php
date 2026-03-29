<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Campaigns — active crop campaigns tied to a specific plot and crop plan.
     * Tracks real sowing dates, emergence, densities and field metrics.
     * Corresponds to: /admin/campaign/list
     */
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->nullable()->constrained('farmers')->onDelete('set null');
            $table->foreignId('establishment_id')->nullable()->constrained('establishments')->onDelete('set null');
            $table->foreignId('plot_id')->nullable()->constrained('plots')->onDelete('set null');
            $table->foreignId('crop_plan_id')->nullable()->constrained('crop_plans')->onDelete('set null');

            // Sowing dates
            $table->date('target_sowing_date')->nullable()->comment('Planned sowing date');
            $table->date('sowing_date')->nullable()->comment('Actual sowing date');
            $table->date('emergence_date')->nullable()->comment('Crop emergence date');

            // Agronomic metrics
            $table->unsignedSmallInteger('dds')->nullable()->default(0)->comment('Days since sowing (DDS)');
            $table->decimal('gm', 5, 2)->nullable()->comment('Maturity group (GM)');
            $table->string('variety_hybrid', 150)->nullable()->comment('Seed variety or hybrid used');
            $table->string('sowing_system', 100)->nullable()->comment('Sowing system (e.g. Directa, Convencional)');
            $table->string('des', 100)->nullable()->comment('Plant density / stand establishment');
            $table->decimal('target_sown_area', 10, 2)->nullable()->comment('Target sown area in hectares');

            $table->string('external_code', 100)->nullable()->comment('External system reference code');
            $table->text('notes')->nullable()->comment('Free-text notes or observations');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
