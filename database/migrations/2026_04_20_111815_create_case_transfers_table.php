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
        Schema::create('case_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_case_id')->constrained('vehicle_cases')->cascadeOnDelete();

            // From
            $table->string('from_name');
            $table->string('from_s_o');
            $table->string('from_nic');
            $table->boolean('from_biometric')->default(0);

            // To
            $table->string('to_name');
            $table->string('to_s_o');
            $table->string('to_nic');
            $table->boolean('to_biometric')->default(0);

            // Vehicle
            $table->string('engine_no');
            $table->string('chassis_no');
            $table->string('wheels')->nullable();
            $table->string('weight')->nullable();
            $table->string('last_tax')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_transfers');
    }
};
