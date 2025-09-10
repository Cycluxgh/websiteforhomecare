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
        Schema::create('employee_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->timestamps();

            // Document fields
            $table->string('passport')->nullable();
            $table->string('english_qualification')->nullable();
            $table->string('certificate_of_qualification')->nullable();
            $table->string('overseas_police_certificate')->nullable();
            $table->string('overseas_tb_test')->nullable();
            $table->string('covid_vaccination_certificate')->nullable();
            $table->string('current_dbs')->nullable();
            $table->string('care_training_certificates')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_documents');
    }
};
