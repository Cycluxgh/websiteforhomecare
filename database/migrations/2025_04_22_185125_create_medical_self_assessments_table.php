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
        Schema::create('medical_self_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // 1. PERSONAL DETAILS
            $table->string('job_title')->nullable();
            $table->string('surname')->nullable();
            $table->string('other_names')->nullable();
            $table->text('address')->nullable();
            $table->string('daytime_contact_number')->nullable();
            $table->string('alternative_contact_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('email')->nullable();
            $table->string('company_number')->nullable();
            $table->string('doctor_name')->nullable();
            $table->text('doctor_address')->nullable();

            // 2. CURRENT WORKING
            $table->enum('night_shift_restrictions', ['Yes', 'No'])->nullable();

            // 2.1 CURRENT WORKING (NHS Criteria)
            $table->enum('nhs_student_nurse', ['Yes', 'No'])->nullable();
            $table->enum('nhs_healthcare_assistant', ['Yes', 'No'])->nullable();
            $table->enum('nhs_nurse_or_the_above', ['Yes', 'No'])->nullable();

            // 2.2 CURRENT WORKING (TB Related)
            $table->enum('tb_risk', ['Yes', 'No'])->nullable();
            $table->enum('tb_diagnosis', ['Yes', 'No'])->nullable();
            $table->enum('tb_contact', ['Yes', 'No'])->nullable();
            $table->enum('persistent_cough', ['Yes', 'No'])->nullable();
            $table->enum('weight_loss_fever', ['Yes', 'No'])->nullable();
            $table->enum('bcg_vaccination', ['Yes', 'No'])->nullable();

            // 3. THERAPEUTIC MANAGEMENT OF VIOLENCE AND AGGRESSION (TIVA)
            $table->enum('musculoskeletal_problems', ['Yes', 'No'])->nullable();
            $table->enum('physical_restrictions', ['Yes', 'No'])->nullable();

            // 4. MEDICAL HISTORY
            $table->enum('fits_faints', ['Yes', 'No'])->nullable();
            $table->enum('allergies', ['Yes', 'No'])->nullable();
            $table->enum('medication', ['Yes', 'No'])->nullable();
            $table->enum('blood_borne_viruses', ['Yes', 'No'])->nullable();

            // 5. ANY OTHER HEALTH ISSUES WHICH MAY AFFECT YOUR WORK?
            $table->text('other_health_issues')->nullable();

            // 6. WORK ADJUSTMENTS
            $table->enum('work_adjustments', ['Yes', 'No'])->nullable();

            // 7. EMPLOYEE DECLARATION & CONSENT
            // $table->string('signature')->nullable();
            $table->date('declaration_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_self_assessments');
    }
};
