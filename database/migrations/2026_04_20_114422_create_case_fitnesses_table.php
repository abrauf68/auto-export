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
        Schema::create('case_fitnesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_case_id')->constrained('vehicle_cases')->cascadeOnDelete();
            $table->string('fitness_from');
            $table->string('docs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_fitnesses');
    }
};
