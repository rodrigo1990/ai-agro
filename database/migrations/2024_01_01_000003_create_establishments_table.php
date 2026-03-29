<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Establishments — agricultural farms/properties belonging to a farmer.
     * Corresponds to: /admin/establishment/
     */
    public function up(): void
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->constrained('farmers');
            $table->string('name');
            $table->string('external_code', 100)->nullable()->comment('External system reference code');
            $table->string('locality')->nullable()->comment('City/town name or address search string');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('establishments');
    }
};
