<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Lote_Usuario — pivot table assigning users to specific plots (lotes).
     * A lote can be assigned to multiple SIMA users for monitoring/access purposes.
     */
    public function up(): void
    {
        Schema::create('lote_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lote_id')->constrained('lotes')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['lote_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lote_usuario');
    }
};
