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
        Schema::create('employee_questionnaires', function (Blueprint $table) {
            $table->id();
            // Link to User (Employee)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Personal Information
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_names')->nullable();
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('nationalities');
            $table->string('passport_details')->nullable();

            // Residential Information
            $table->text('current_address')->nullable();
            $table->string('duration_at_address')->nullable();
            $table->string('ownership_status')->nullable();
            $table->string('contact_number');
            $table->boolean('worked_in_uk')->nullable();
            $table->boolean('travel_outside_uk')->nullable();
            $table->boolean('english_test')->nullable();
            $table->boolean('adverse_immigration')->nullable();
            $table->boolean('criminal_offence')->nullable();
            $table->boolean('lived_in_other_countries')->nullable();

            // Employment History - Current Employer
            $table->string('current_employer_name');
            $table->string('current_job_title');
            $table->date('current_start_date');
            $table->date('current_end_date')->nullable();
            $table->text('employment_breaks');

            // Employment History - Previous Employer
            $table->text('previous_employer')->nullable();
            $table->string('previous_job_title');
            $table->date('previous_start_date');
            $table->date('previous_end_date');

            // Academic Qualifications
            $table->string('qualification')->nullable();
            $table->string('subject')->nullable();
            $table->string('awarding_institution')->nullable();
            $table->date('qualification_date_from')->nullable();
            $table->date('qualification_date_to')->nullable();
            $table->boolean('taught_in_english')->nullable();

            // UK Employment
            $table->string('uk_job_title');
            $table->string('uk_employer_name')->nullable();
            $table->date('uk_start_date')->nullable();
            $table->date('travel_to_uk_date')->nullable();
            $table->text('skills_experience')->nullable();
            $table->text('governing_body_details')->nullable();

            // Family Details
            $table->string('family_given_name')->nullable();
            $table->string('family_surname')->nullable();
            $table->string('family_nationality')->nullable();
            $table->date('family_date_of_birth')->nullable();
            $table->string('family_relationship')->nullable();
            $table->boolean('family_travel_with_you')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_questionnaires');
    }
};
