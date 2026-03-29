<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tags — tags/labels used to classify and filter entities.
     * Tags appear across: Farmers, Establishments, Plots, Campaigns.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('society_id')->constrained('societies')->onDelete('cascade');
            $table->string('name', 100);
            $table->string('color', 20)->nullable()->comment('Hex color code for UI display');
            $table->timestamps();

            $table->unique(['society_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
