<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Sociedad — company/organization profile (one per user account).
     * Corresponds to: /admin/user/society
     */
    public function up(): void
    {
        Schema::create('societies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('razon_social');
            $table->string('nro_identificacion_fiscal', 100)->nullable();
            $table->string('pais', 100)->default('Argentina');
            $table->string('logo')->nullable()->comment('Path to society logo image');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('societies');
    }
};
