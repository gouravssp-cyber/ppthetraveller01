<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageVariant extends Model
{
    use HasFactory;

    protected $table = 'package_variants';
    protected $guarded = [];

    protected $fillable = [
        'package_id',
        'variant_name',
        'variant_slug',
        'variant_description',
        'duration_days',
        'duration_nights',
        'price',
        'price_compare_at',
        'highlights',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'highlights' => 'json',
        'status' => 'string',
        'price' => 'decimal:2',
        'price_compare_at' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the package associated with this variant
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get all itinerary days for this variant
     */
    public function itineraryDays(): HasMany
    {
        return $this->hasMany(ItineraryDay::class)->orderBy('day_number');
    }

    /**
     * Get all gallery images for this variant
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(PackageGallery::class)->orderBy('sort_order');
    }

    /**
     * Boot method for model events
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Auto-generate slug from variant_name when creating
         */
        static::creating(function ($model) {
            if (!$model->variant_slug) {
                $model->variant_slug = \Illuminate\Support\Str::slug($model->variant_name);
            }
        });
    }

    /**
     * Get active variants
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Calculate discounted percentage
     */
    public function getDiscountPercentageAttribute()
    {
        if (!$this->price_compare_at || !$this->price) {
            return 0;
        }

        return round(
            (($this->price_compare_at - $this->price) / $this->price_compare_at) * 100
        );
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return $this->price ? '₹' . number_format($this->price, 2) : null;
    }

    /**
     * Get formatted compare price
     */
    public function getFormattedComparePriceAttribute()
    {
        return $this->price_compare_at ? '₹' . number_format($this->price_compare_at, 2) : null;
    }

    /**
     * Get duration from package if not set on variant
     */
    public function getEffectiveDurationDaysAttribute()
    {
        return $this->duration_days ?? $this->package->duration_days;
    }

    /**
     * Get duration nights from package if not set on variant
     */
    public function getEffectiveDurationNightsAttribute()
    {
        return $this->duration_nights ?? $this->package->duration_nights;
    }

    /**
     * Get price from package if not set on variant
     */
    public function getEffectivePriceAttribute()
    {
        return $this->price ?? $this->package->price_start;
    }
}
