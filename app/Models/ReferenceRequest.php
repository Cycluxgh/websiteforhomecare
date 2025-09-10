<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReferenceRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'referee_first_name',
        'referee_last_name',
        'referee_email',
        'referee_phone',
        'referee_job_title',
        'referee_company',
        'applicant_full_name',
        'employment_from',
        'employment_to',
        'reemploy',
        'care_plans_rating',
        'reliability_rating',
        'character_rating',
        'attitude_rating',
        'dignity_rating',
        'communication_rating',
        'relationships_rating',
        'initiative_rating',
        'disciplinary_action',
        'safeguarding_investigations',
        'not_suitable_for_vulnerable',
        'criminal_offense',
        'additional_comments',
        'confirmed_accuracy',
        'signature',
        'company_stamp',
        'confirmed_storage',
    ];

    /**
     * Get the user that initiated the reference request.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
