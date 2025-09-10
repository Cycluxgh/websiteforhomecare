<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDocuments extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', // Add user_id to link documents to a user
        'passport',
        'english_qualification',
        'certificate_of_qualification',
        'overseas_police_certificate',
        'overseas_tb_test',
        'covid_vaccination_certificate',
        'current_dbs',
        'care_training_certificates',
    ];

    /**
     * Get the user that owns the employee documents.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
