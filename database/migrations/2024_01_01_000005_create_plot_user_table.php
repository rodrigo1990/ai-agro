<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Plot_User — pivot table assigning users to specific plots.
     * A plot can be assigned to multiple SIMA users for monitoring/access purposes.
     */
    public function up(): void
    {
        Schema::create('plot_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_id')->constrained('plots')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['plot_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plot_user');
    }
};
