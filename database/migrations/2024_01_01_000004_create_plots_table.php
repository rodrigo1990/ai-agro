<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Plots — agricultural plots/fields within an establishment.
     * Corresponds to: /v2/admin/plot/
     */
    public function up(): void
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->nullable()->constrained('farmers')->onDelete('set null');
            $table->foreignId('establishment_id')->nullable()->constrained('establishments')->onDelete('set null');
            $table->string('name');
            $table->boolean('active')->default(true);
            $table->decimal('area', 10, 2)->comment('Surface area in hectares');
            $table->decimal('latitude', 10, 7)->comment('Center point latitude');
            $table->decimal('longitude', 10, 7)->comment('Center point longitude');
            $table->longText('polygon')->nullable()->comment('GeoJSON polygon drawn on map (KML/KMZ import supported)');
            $table->string('external_code', 100)->nullable()->comment('External system reference code');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plots');
    }
};
