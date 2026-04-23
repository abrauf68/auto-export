<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('case_alterations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_case_id')->constrained('vehicle_cases')->cascadeOnDelete();

            $table->string('engine_no')->nullable();
            $table->string('chassis_no')->nullable();
            $table->string('wheels')->nullable();
            $table->string('weight')->nullable();
            $table->string('last_tax')->nullable();
            $table->string('other')->nullable();

            // Alteration Details
            $table->string('alt_from')->nullable();
            $table->string('alt_to')->nullable();
            $table->string('alt_wheels')->nullable();
            $table->string('alt_engine')->nullable();
            $table->string('alt_body')->nullable();
            $table->string('alt_docs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_alterations');
    }
};
