<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_posting_id')->constrained()->onDelete('cascade');

            // Personal Information
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('address_line_1');
            $table->string('city');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('national_insurance_number')->nullable();
            $table->boolean('worked_with_us_before')->default(false);
            $table->boolean('applied_with_us_before')->default(false);
            $table->boolean('related_to_employee')->default(false);
            $table->text('related_details')->nullable();
            $table->boolean('eligible_to_work_uk')->default(true);
            $table->boolean('requires_adjustments')->default(false);
            $table->text('adjustment_details')->nullable();
            $table->string('vacancy_source')->nullable();


            $table->text('interests_achievements')->nullable();

            // Professional Registrations
            $table->boolean('professional_body_member')->default(false);
            $table->string('professional_body_name')->nullable();
            $table->string('registration_number')->nullable();
            $table->date('registration_expiry_date')->nullable();
            $table->boolean('registration_revoked')->default(false);
            $table->text('revocation_details')->nullable();

            // Employment History
            $table->boolean('currently_employed')->default(true);
            $table->text('not_employed_details')->nullable();
            $table->string('employer_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('nature_of_business')->nullable();
            $table->string('employer_address_line_1')->nullable();
            $table->string('employer_city')->nullable();
            $table->string('employer_phone_number')->nullable();
            $table->string('employer_email')->nullable();
            $table->text('duties_description')->nullable();
            $table->date('date_started')->nullable();
            $table->date('date_left')->nullable();
            $table->string('reason_for_leaving')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('salary_period')->nullable();
            $table->string('notice_period')->nullable();
            $table->boolean('is_only_job')->default(true);
            $table->text('other_jobs_details')->nullable();

            // References
            $table->string('ref1_full_name')->nullable();
            $table->string('ref1_company_name')->nullable();
            $table->string('ref1_job_title')->nullable();
            $table->string('ref1_phone_number')->nullable();
            $table->string('ref1_email')->nullable();
            $table->string('ref1_address_line_1')->nullable();
            $table->string('ref1_city')->nullable();

            $table->string('ref2_full_name')->nullable();
            $table->string('ref2_company_name')->nullable();
            $table->string('ref2_job_title')->nullable();
            $table->string('ref2_phone_number')->nullable();
            $table->string('ref2_email')->nullable();
            $table->string('ref2_address_line_1')->nullable();
            $table->string('ref2_city')->nullable();

            $table->boolean('ref_contact_permission')->default(false);

            // Additional Information
            $table->text('relevant_experience')->nullable();

            // Rehabilitation of Offenders Act
            $table->boolean('understood_rehabilitation_act')->default(false);
            $table->boolean('disciplinary_action_hm_forces')->default(false);
            $table->boolean('unspent_convictions')->default(false);
            $table->boolean('spent_convictions_disclose')->default(false);
            $table->boolean('pending_charges')->default(false);
            $table->boolean('regulatory_investigation')->default(false);
            $table->boolean('registration_conditions')->default(false);
            $table->text('conviction_details')->nullable();

            // Driving License
            $table->boolean('uk_driving_license')->default(false);
            $table->boolean('access_to_car')->default(false);
            $table->boolean('endorsements')->default(false);
            $table->text('endorsement_details')->nullable();
            $table->string('driving_license_number')->nullable();

            // Supporting Statement
            $table->text('supporting_statement')->nullable();

            // Consent and Submission
            $table->boolean('data_processing_consent')->default(false);

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
