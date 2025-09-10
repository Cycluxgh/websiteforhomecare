<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['profile_category_id', 'name', 'description'];

    public function category()
    {
        return $this->belongsTo(ProfileCategory::class, 'profile_category_id');
    }

    public function questions()
    {
        return $this->morphMany(ProfileQuestion::class, 'questionable');
    }
}
