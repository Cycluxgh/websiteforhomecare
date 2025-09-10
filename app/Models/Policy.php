<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Policy extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'content',
        'pdf_path',
        'effective_date',
        'expiry_date',
        'status',
        'is_featured',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_featured' => 'boolean',
        'effective_date' => 'datetime',
        'expiry_date' => 'datetime',
    ];

    /**
     * Get the user that created the policy.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Automatically generate a slug from the title if none is provided.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($policy) {
            if (!$policy->slug) {
                $policy->slug = Str::slug($policy->title);
            }
        });

        static::updating(function ($policy) {
            if (!$policy->slug) {
                $policy->slug = Str::slug($policy->title);
            }
        });
    }

    /**
     * Scope a query to only include published policies.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope a query to only include featured policies.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // In your Policy model
public function getFormattedEffectiveDateAttribute()
{
    return $this->effective_date?->format('jS F Y') ?? 'Not specified';
}

public function getFormattedExpiryDateAttribute()
{
    return $this->expiry_date?->format('jS F Y') ?? 'Not specified';
}


    // New relationship for consents
    public function consents()
    {
        return $this->hasMany(PolicyConsent::class);
    }

    // Accessor to check if the authenticated user has consented to this policy
    public function getHasConsentedAttribute()
    {
        return $this->consents()->where('user_id', auth()->id())->exists();
    }
}
