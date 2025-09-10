<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'questionable_id',
        'questionable_type',
        'question_text',
        'question_type',
        'options'
    ];

    protected $casts = [
        'options' => 'array'
    ];

    public function questionable()
    {
        return $this->morphTo();
    }

    public function answers()
    {
        return $this->hasMany(PatientProfileAnswer::class, 'profile_question_id');
    }
}
