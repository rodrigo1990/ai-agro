<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Farmers — agricultural producers/farmers.
     * Corresponds to: /admin/farmer/
     */
    public function up(): void
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('society_id')->constrained('societies')->onDelete('cascade');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('tax_id', 50)->nullable()->comment('Tax identification number');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null')
                ->comment('Linked SIMA user account (Usuario Productor SIMA)');
            $table->string('external_code', 100)->nullable()->comment('External system reference code');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
