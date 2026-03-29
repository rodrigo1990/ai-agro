<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Productores — agricultural producers/farmers.
     * Corresponds to: /admin/farmer/
     */
    public function up(): void
    {
        Schema::create('productores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('society_id')->constrained('societies')->onDelete('cascade');
            $table->string('nombre');
            $table->string('apellido')->nullable();
            $table->string('cuit', 50)->nullable()->comment('Tax identification number');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null')
                ->comment('Linked SIMA user account (Usuario Productor SIMA)');
            $table->string('codigo_externo', 100)->nullable()->comment('External system reference code');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productores');
    }
};
