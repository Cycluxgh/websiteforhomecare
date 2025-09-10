<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'application_id',
        'employee_code',
        'position',
        'employment_type',    // e.g., 'full-time', 'part-time', 'contract'
        'hourly_rate',        // If applicable for their employment type
        'start_date',         // Date employment began with the company
        'end_date',           // Date employment ended (if terminated)
        'active',             // Boolean: true if currently active employee
        'terminated',         // Boolean: true if employment has been terminated
        'termination_date',   // Date of termination
        'termination_reason', // Reason for termination
        'admin_notes',        // General notes from HR/Admin

        // Personal & Contact Information (from JobApplication)
        'full_name',
        'date_of_birth',
        'address_line_1',
        'city',
        'email',              // Employee's personal email (can differ from work email)
        'phone_number',
        'national_insurance_number', // UK National Insurance Number

        // Emergency Contact Information
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relationship',

        // Employment Specifics (related to current role with your company)
        'currently_employed', // Could indicate if they hold other jobs while employed here
        // The following fields often refer to their role *within your company*
        'job_title',          // Their specific job title at your company
        'duties_description', // Description of their duties at your company
        'salary',             // Their current salary at your company
        'salary_period',      // e.g., 'annual', 'monthly', 'hourly'
        'notice_period',      // Their required notice period
        'is_only_job',        // True if this is their only employment
        'other_jobs_details', // Details if 'is_only_job' is false

        // Compliance & Eligibility
        'eligible_to_work_uk',
        'requires_adjustments',
        'adjustment_details',
        'professional_body_member',
        'professional_body_name',
        'registration_number',
        'registration_expiry_date',
        'registration_revoked',
        'revocation_details',

        // Driving & Access (if relevant to their role)
        'uk_driving_license',
        'access_to_car',
        'endorsements',
        'endorsement_details',
        'driving_license_number',

        // Reference Information (for internal records, if needed post-hire)
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
        'ref_contact_permission', // Permission from application to contact referees

        // General Information & Declarations
        'relevant_experience',    // A summary of relevant experience
        'interests_achievements',
        'data_processing_consent', // Ongoing consent for HR data processing
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'date_of_birth' => 'date',
        'registration_expiry_date' => 'date',
        'active' => 'boolean',
        'terminated' => 'boolean',
        'eligible_to_work_uk' => 'boolean',
        'requires_adjustments' => 'boolean',
        'professional_body_member' => 'boolean',
        'registration_revoked' => 'boolean',
        'currently_employed' => 'boolean', // If tracking other jobs
        'is_only_job' => 'boolean',
        'uk_driving_license' => 'boolean',
        'access_to_car' => 'boolean',
        'data_processing_consent' => 'boolean',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
