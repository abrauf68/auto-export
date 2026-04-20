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
        Schema::create('vehicle_cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_no')->unique();
            // Step 1
            $table->string('vehicle_reg_no');
            $table->string('make')->nullable();
            $table->year('year')->nullable();
            $table->string('submitted_by');
            $table->string('mobile_no');
            $table->date('submission_date');
            $table->date('tentative_return_date')->nullable();

            // Step 2
            $table->string('case_refer_to'); // Karachi, Quetta etc
            $table->string('work_type'); // Transfer, Tax etc

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_cases');
    }
};
