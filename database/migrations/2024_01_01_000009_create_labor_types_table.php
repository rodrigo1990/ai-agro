<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Labor Types — work/labour order types used to classify field activities.
     * Corresponds to: /application-orders-labour-types/
     */
    public function up(): void
    {
        Schema::create('labor_types', function (Blueprint $table) {
            $table->id();
            $table->string('description')->comment('Labour type name (e.g. Plantar Soja, Pulverización)');
            $table->string('work_order_type', 100)->comment('Work order category (e.g. Orden de aplicación, Orden de siembra)');
            $table->string('category', 100)->nullable()->comment('Optional sub-category');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('labor_types');
    }
};
