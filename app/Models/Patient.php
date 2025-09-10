<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'telephone_number',
        'mobile_phone_number',
        'date_of_birth',
        'image_path',
        'address',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_of_birth' => 'date', // or 'datetime' depending on your needs
    ];

    public function profile()
    {
        return $this->hasOne(PatientProfile::class);
    }

    public function employeePatientAssignments()
    {
        return $this->hasMany(EmployeePatientAssignment::class);
    }
}
