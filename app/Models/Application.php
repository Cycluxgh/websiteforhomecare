<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_posting_id',
        'full_name',
        'date_of_birth',
        'address_line_1',
        'city',
        'email',
        'phone_number',
        'national_insurance_number',
        'worked_with_us_before',
        'applied_with_us_before',
        'related_to_employee',
        'related_details',
        'eligible_to_work_uk',
        'requires_adjustments',
        'adjustment_details',
        'vacancy_source',
        'professional_body_member',
        'professional_body_name',
        'registration_number',
        'registration_expiry_date',
        'registration_revoked',
        'revocation_details',
        'currently_employed',
        'not_employed_details',
        'employer_name',
        'job_title',
        'nature_of_business',
        'employer_address_line_1',
        'employer_city',
        'employer_phone_number',
        'employer_email',
        'duties_description',
        'date_started',
        'date_left',
        'reason_for_leaving',
        'salary',
        'salary_period',
        'notice_period',
        'is_only_job',
        'other_jobs_details',
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
        'understood_rehabilitation_act',
        'disciplinary_action_hm_forces',
        'unspent_convictions',
        'spent_convictions_disclose',
        'pending_charges',
        'regulatory_investigation',
        'registration_conditions',
        'conviction_details',
        'uk_driving_license',
        'access_to_car',
        'endorsements',
        'endorsement_details',
        'driving_license_number',
        'supporting_statement',
        'data_processing_consent',
        'interests_achievements',
        'status',
        'selected_at',
        'converted_to_employee',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'date',
        'registration_expiry_date' => 'date',
        'date_started' => 'date',
        'date_left' => 'date',
        'worked_with_us_before' => 'boolean',
        'applied_with_us_before' => 'boolean',
        'related_to_employee' => 'boolean',
        'eligible_to_work_uk' => 'boolean',
        'requires_adjustments' => 'boolean',
        'professional_body_member' => 'boolean',
        'registration_revoked' => 'boolean',
        'currently_employed' => 'boolean',
        'is_only_job' => 'boolean',
        'ref_contact_permission' => 'boolean',
        'understood_rehabilitation_act' => 'boolean',
        'disciplinary_action_hm_forces' => 'boolean',
        'unspent_convictions' => 'boolean',
        'spent_convictions_disclose' => 'boolean',
        'pending_charges' => 'boolean',
        'regulatory_investigation' => 'boolean',
        'registration_conditions' => 'boolean',
        'uk_driving_license' => 'boolean',
        'access_to_car' => 'boolean',
        'endorsements' => 'boolean',
        'data_processing_consent' => 'boolean',
    ];

    /**
     * Get the job posting associated with the application.
     */
    public function jobPosting(): BelongsTo
    {
        return $this->belongsTo(JobPosting::class);
    }

    /**
     * Get the education history records for the application.
     */
    public function educationHistory(): HasMany
    {
        return $this->hasMany(EducationHistory::class);
    }
}
