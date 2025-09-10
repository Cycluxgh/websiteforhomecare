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
        Schema::table('employee_profiles', function (Blueprint $table) {
            $table->string('full_name')->nullable()->after('employee_code');
            $table->date('date_of_birth')->nullable()->after('full_name');
            $table->string('address_line_1')->nullable()->after('date_of_birth');
            $table->string('city')->nullable()->after('address_line_1');
            $table->string('email')->nullable()->after('city'); // Personal email
            $table->string('phone_number')->nullable()->after('email');
            $table->string('national_insurance_number')->nullable()->after('phone_number');


            $table->boolean('currently_employed')->nullable()->after('admin_notes');
            $table->string('job_title')->nullable()->after('currently_employed');
            $table->text('duties_description')->nullable()->after('job_title');
            $table->decimal('salary', 10, 2)->nullable()->after('duties_description'); // Their current salary at your company
            $table->string('salary_period', 50)->nullable()->after('salary');      // e.g., 'annual', 'monthly', 'hourly'
            $table->string('notice_period', 50)->nullable()->after('salary_period'); // Their required notice period
            $table->boolean('is_only_job')->nullable()->after('notice_period');     // True if this is their only employment
            $table->text('other_jobs_details')->nullable()->after('is_only_job'); // Details if 'is_only_job' is false

            // Compliance & Eligibility
            // eligible_to_work_uk, requires_adjustments, adjustment_details,
            // professional_body_member, professional_body_name, registration_number,
            // registration_expiry_date, registration_revoked, revocation_details
            $table->boolean('eligible_to_work_uk')->nullable()->after('other_jobs_details');
            $table->boolean('requires_adjustments')->nullable()->after('eligible_to_work_uk');
            $table->text('adjustment_details')->nullable()->after('requires_adjustments');
            $table->boolean('professional_body_member')->nullable()->after('adjustment_details');
            $table->string('professional_body_name')->nullable()->after('professional_body_member');
            $table->string('registration_number')->nullable()->after('professional_body_name');
            $table->date('registration_expiry_date')->nullable()->after('registration_number');
            $table->boolean('registration_revoked')->nullable()->after('registration_expiry_date');
            $table->text('revocation_details')->nullable()->after('registration_revoked');

            // Driving & Access (if relevant to their role)
            // uk_driving_license, access_to_car, endorsements, endorsement_details, driving_license_number
            $table->boolean('uk_driving_license')->nullable()->after('revocation_details');
            $table->boolean('access_to_car')->nullable()->after('uk_driving_license');
            $table->string('endorsements')->nullable()->after('access_to_car'); // e.g., types of endorsements
            $table->text('endorsement_details')->nullable()->after('endorsements');
            $table->string('driving_license_number')->nullable()->after('endorsement_details');

            // Reference Information (for internal records, if needed post-hire)
            // ref1_full_name, ref1_company_name, ref1_job_title, ref1_phone_number, ref1_email, ref1_address_line_1, ref1_city,
            // ref2_full_name, ref2_company_name, ref2_job_title, ref2_phone_number, ref2_email, ref2_address_line_1, ref2_city,
            // ref_contact_permission
            $table->string('ref1_full_name')->nullable()->after('driving_license_number');
            $table->string('ref1_company_name')->nullable()->after('ref1_full_name');
            $table->string('ref1_job_title')->nullable()->after('ref1_company_name');
            $table->string('ref1_phone_number')->nullable()->after('ref1_job_title');
            $table->string('ref1_email')->nullable()->after('ref1_phone_number');
            $table->string('ref1_address_line_1')->nullable()->after('ref1_email');
            $table->string('ref1_city')->nullable()->after('ref1_address_line_1');
            $table->string('ref2_full_name')->nullable()->after('ref1_city');
            $table->string('ref2_company_name')->nullable()->after('ref2_full_name');
            $table->string('ref2_job_title')->nullable()->after('ref2_company_name');
            $table->string('ref2_phone_number')->nullable()->after('ref2_job_title');
            $table->string('ref2_email')->nullable()->after('ref2_phone_number');
            $table->string('ref2_address_line_1')->nullable()->after('ref2_email');
            $table->string('ref2_city')->nullable()->after('ref2_address_line_1');
            $table->boolean('ref_contact_permission')->nullable()->after('ref2_city');

            // General Information & Declarations
            // relevant_experience, interests_achievements, data_processing_consent
            $table->text('relevant_experience')->nullable()->after('ref_contact_permission'); // A summary of relevant experience
            $table->text('interests_achievements')->nullable()->after('relevant_experience');
            $table->boolean('data_processing_consent')->nullable()->after('interests_achievements'); // Ongoing consent for HR data processing
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_profiles', function (Blueprint $table) {
            // Drop columns in reverse order of addition or group logically
            $table->dropColumn([
                'full_name',
                'date_of_birth',
                'address_line_1',
                'city',
                'email',
                'phone_number',
                'national_insurance_number',

                'currently_employed',
                'job_title',
                'duties_description',
                'salary',
                'salary_period',
                'notice_period',
                'is_only_job',
                'other_jobs_details',

                'eligible_to_work_uk',
                'requires_adjustments',
                'adjustment_details',
                'professional_body_member',
                'professional_body_name',
                'registration_number',
                'registration_expiry_date',
                'registration_revoked',
                'revocation_details',

                'uk_driving_license',
                'access_to_car',
                'endorsements',
                'endorsement_details',
                'driving_license_number',

                'ref1_full_name',
                'ref1_company_name',
                'ref1_job_title',
                'ref1_phone_number',
                'ref1_email',
                'ref1_address_line_1',
                'ref1_city',
                'ref2_full_name',
                'ref2_company_name',
                'ref2_job_title',
                'ref2_phone_number',
                'ref2_email',
                'ref2_address_line_1',
                'ref2_city',
                'ref_contact_permission',

                'relevant_experience',
                'interests_achievements',
                'data_processing_consent',
            ]);
        });
    }
};
