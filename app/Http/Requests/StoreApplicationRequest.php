<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'job_posting_id' => 'required|exists:job_postings,id',
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'address_line_1' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'national_insurance_number' => 'nullable|string|max:20',
            'worked_with_us_before' => 'required|boolean',
            'applied_with_us_before' => 'required|boolean',
            'related_to_employee' => 'required|boolean',
            'related_details' => 'required_if:worked_with_us_before,1|required_if:applied_with_us_before,1|required_if:related_to_employee,1|nullable|string|max:1000',
            'eligible_to_work_uk' => 'required|boolean',
            'requires_adjustments' => 'required|boolean',
            'adjustment_details' => 'required_if:requires_adjustments,1|nullable|string|max:1000',
            'vacancy_source' => 'required|string|max:255',
            'interests_achievements' => 'nullable|string|max:1000',
            'professional_body_member' => 'required|boolean',
            'professional_body_name' => 'required_if:professional_body_member,1|nullable|string|max:255',
            'registration_number' => 'required_if:professional_body_member,1|nullable|string|max:50',
            'registration_expiry_date' => 'required_if:professional_body_member,1|nullable|date',
            'registration_revoked' => 'required_if:professional_body_member,1|boolean',
            'revocation_details' => 'required_if:registration_revoked,1|nullable|string|max:1000',
            'currently_employed' => 'required|boolean',
            'not_employed_details' => 'required_if:currently_employed,0|nullable|string|max:1000',
            'employer_name' => 'required_if:currently_employed,1|nullable|string|max:255',
            'job_title' => 'required_if:currently_employed,1|nullable|string|max:255',
            'nature_of_business' => 'nullable|string|max:255',
            'employer_address_line_1' => 'required_if:currently_employed,1|nullable|string|max:255',
            'employer_city' => 'required_if:currently_employed,1|nullable|string|max:100',
            'employer_phone_number' => 'required_if:currently_employed,1|nullable|string|max:20',
            'employer_email' => 'nullable|email|max:255',
            'duties_description' => 'required_if:currently_employed,1|nullable|string|max:1000',
            'date_started' => 'required_if:currently_employed,1|nullable|date|before_or_equal:today',
            'date_left' => 'nullable|date|after:date_started|before_or_equal:today',
            'reason_for_leaving' => 'nullable|string|max:1000',
            'salary' => 'nullable|max:50',
            'salary_period' => 'nullable|in:Per Hour,Per Week,Per Month,Per Annum',
            'notice_period' => 'nullable|string|max:100',
            'is_only_job' => 'required_if:currently_employed,1|boolean',
            'other_jobs_details' => 'required_if:is_only_job,0|nullable|string|max:1000',
            'ref1_full_name' => 'required|string|max:255',
            'ref1_company_name' => 'required|string|max:255',
            'ref1_job_title' => 'required|string|max:255',
            'ref1_phone_number' => 'required|string|max:20',
            'ref1_email' => 'required|email|max:255',
            'ref1_address_line_1' => 'required|string|max:255',
            'ref1_city' => 'required|string|max:100',
            'ref2_full_name' => 'required|string|max:255',
            'ref2_company_name' => 'required|string|max:255',
            'ref2_job_title' => 'required|string|max:255',
            'ref2_phone_number' => 'required|string|max:20',
            'ref2_email' => 'required|email|max:255',
            'ref2_address_line_1' => 'required|string|max:255',
            'ref2_city' => 'required|string|max:100',
            'ref_contact_permission' => 'required|boolean',
            'relevant_experience' => 'required|string|max:2000',
            'understood_rehabilitation_act' => 'required|boolean|accepted',
            'disciplinary_action_hm_forces' => 'required|boolean',
            'unspent_convictions' => 'required|boolean',
            'spent_convictions_disclose' => 'required|boolean',
            'pending_charges' => 'required|boolean',
            'regulatory_investigation' => 'required|boolean',
            'registration_conditions' => 'required|boolean',
            'conviction_details' => 'required_if:disciplinary_action_hm_forces,1|required_if:unspent_convictions,1|required_if:spent_convictions_disclose,1|required_if:pending_charges,1|required_if:regulatory_investigation,1|required_if:registration_conditions,1|nullable|string|max:2000',
            'uk_driving_license' => 'required|boolean',
            'access_to_car' => 'required|boolean',
            'endorsements' => 'required_if:uk_driving_license,1|boolean',
            'endorsement_details' => 'required_if:endorsements,1|nullable|string|max:1000',
            'driving_license_number' => 'nullable|string|max:50',
            'supporting_statement' => 'required|string|max:2000',
            'data_processing_consent' => 'required|boolean|accepted',
            'education' => 'required|array|min:1',
            'education.*.type' => 'required|string|in:school_qualification,other_training',
            'education.*.qualification_name' => 'required|string|max:255',
        ];
    }
}
