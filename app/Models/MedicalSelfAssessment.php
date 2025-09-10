<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalSelfAssessment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'job_title',
        'surname',
        'other_names',
        'address',
        'daytime_contact_number',
        'alternative_contact_number',
        'date_of_birth',
        'email',
        'company_number',
        'doctor_name',
        'doctor_address',
        'night_shift_restrictions',
        'nhs_student_nurse',
        'nhs_healthcare_assistant',
        'nhs_nurse_or_the_above',
        'tb_risk',
        'tb_diagnosis',
        'tb_contact',
        'persistent_cough',
        'weight_loss_fever',
        'bcg_vaccination',
        'musculoskeletal_problems',
        'physical_restrictions',
        'fits_faints',
        'allergies',
        'medication',
        'blood_borne_viruses',
        'other_health_issues',
        'work_adjustments',
        'declaration_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'date',
        'declaration_date' => 'date',
    ];

    /**
     * Get the user that owns the MedicalSelfAssessment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
