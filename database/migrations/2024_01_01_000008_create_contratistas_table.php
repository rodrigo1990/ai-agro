<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Contratistas — contractors/service providers used for field operations.
     * Corresponds to: /admin/contractors/list
     */
    public function up(): void
    {
        Schema::create('contratistas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono', 50)->nullable();
            $table->string('direccion')->nullable();
            $table->string('email')->nullable();
            $table->boolean('propia')->default(false)->comment('True if this is the account owner\'s own contracting company');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contratistas');
    }
};
