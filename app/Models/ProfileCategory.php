<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function subCategories()
    {
        return $this->hasMany(ProfileSubCategory::class);
    }

    public function questions()
    {
        return $this->morphMany(ProfileQuestion::class, 'questionable');
    }
}
