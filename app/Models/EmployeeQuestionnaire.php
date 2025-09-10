<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeQuestionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        // Personal Information
        'title',
        'first_name',
        'last_name',
        'other_names',
        'gender',
        'date_of_birth',
        'place_of_birth',
        'nationalities',
        'passport_details',

        // Residential Information
        'current_address',
        'duration_at_address',
        'ownership_status',
        'contact_number',
        'worked_in_uk',
        'travel_outside_uk',
        'english_test',
        'adverse_immigration',
        'criminal_offence',
        'lived_in_other_countries',

        // Employment History - Current Employer
        'current_employer_name',
        'current_job_title',
        'current_start_date',
        'current_end_date',
        'employment_breaks',

        // Employment History - Previous Employer
        'previous_employer',
        'previous_job_title',
        'previous_start_date',
        'previous_end_date',

        // Academic Qualifications
        'qualification',
        'subject',
        'awarding_institution',
        'qualification_date_from',
        'qualification_date_to',
        'taught_in_english',

        // UK Employment
        'uk_job_title',
        'uk_employer_name',
        'uk_start_date',
        'travel_to_uk_date',
        'skills_experience',
        'governing_body_details',

        // Family Details
        'family_given_name',
        'family_surname',
        'family_nationality',
        'family_date_of_birth',
        'family_relationship',
        'family_travel_with_you',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'current_start_date' => 'date',
        'current_end_date' => 'date',
        'previous_start_date' => 'date',
        'previous_end_date' => 'date',
        'qualification_date_from' => 'date',
        'qualification_date_to' => 'date',
        'uk_start_date' => 'date',
        'travel_to_uk_date' => 'date',
        'family_date_of_birth' => 'date',
        'worked_in_uk' => 'boolean',
        'travel_outside_uk' => 'boolean',
        'english_test' => 'boolean',
        'adverse_immigration' => 'boolean',
        'criminal_offence' => 'boolean',
        'lived_in_other_countries' => 'boolean',
        'taught_in_english' => 'boolean',
        'family_travel_with_you' => 'boolean',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
