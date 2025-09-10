<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientProfileAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_profile_id',
        'profile_question_id',
        'answer'
    ];

    public function patientProfile()
    {
        return $this->belongsTo(PatientProfile::class);
    }

    public function question()
    {
        return $this->belongsTo(ProfileQuestion::class, 'profile_question_id');
    }
}
