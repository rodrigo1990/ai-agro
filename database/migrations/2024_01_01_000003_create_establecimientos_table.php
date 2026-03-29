<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Establecimientos — agricultural farms/properties belonging to a producer.
     * Corresponds to: /admin/establishment/
     */
    public function up(): void
    {
        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productor_id')->nullable()->constrained('productores')->onDelete('set null');
            $table->string('nombre');
            $table->string('codigo_externo', 100)->nullable()->comment('External system reference code');
            $table->string('localidad')->nullable()->comment('City/town name or address search string');
            $table->decimal('latitud', 10, 7);
            $table->decimal('longitud', 10, 7);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('establecimientos');
    }
};
