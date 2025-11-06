<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';
    protected $guarded = [];

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'full_description',
        'tour_type_id',
        'destination_id',
        'duration_days',
        'duration_nights',
        'price_start',
        'price_compare_at',
        'currency',
        'highlights',
        'meta_title',
        'meta_description',
        'canonical_url',
        'h1_title',
        'og_title',
        'og_description',
        'og_image',
        'banner_image',
        'banner_image_alt',
        'status',
        'featured',
        'migrated_from_legacy',
    ];

    protected $casts = [
        'highlights' => 'json',
        'status' => 'string',
        'featured' => 'boolean',
        'migrated_from_legacy' => 'boolean',
        'price_start' => 'decimal:2',
        'price_compare_at' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    public function tourType(): BelongsTo
    {
        return $this->belongsTo(TourType::class);
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function itineraryDays(): HasMany
    {
        return $this->hasMany(ItineraryDay::class)->orderBy('day_number');
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(PackageGallery::class)->orderBy('sort_order');
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class)->orderBy('sort_order');
    }

    public function relatedPackages(): BelongsToMany
    {
        return $this->belongsToMany(
            Package::class,
            'related_packages',
            'package_id',
            'related_package_id'
        )->orderByPivot('sort_order');
    }

    public function urlRedirects(): HasMany
    {
        return $this->hasMany(UrlRedirect::class);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeByTourType($query, $tourTypeId)
    {
        return $query->where('tour_type_id', $tourTypeId);
    }

    public function scopeByDestination($query, $destinationId)
    {
        return $query->where('destination_id', $destinationId);
    }

    public function scopeLegacy($query)
    {
        return $query->where('migrated_from_legacy', true);
    }

    public function scopeDomestic($query)
    {
        return $query->whereHas('tourType', function ($q) {
            $q->where('name', 'like', '%Domestic%')
              ->orWhere('slug', 'like', '%domestic%');
        });
    }

    public function scopeInternational($query)
    {
        return $query->whereHas('tourType', function ($q) {
            $q->where('name', 'like', '%International%')
              ->orWhere('slug', 'like', '%international%');
        });
    }

    // Accessors
    public function getDiscountPercentageAttribute()
    {
        if (!$this->price_compare_at || !$this->price_start) {
            return 0;
        }

        return round(
            (($this->price_compare_at - $this->price_start) / $this->price_compare_at) * 100
        );
    }

    public function getFormattedPriceAttribute()
    {
        return '₹' . number_format($this->price_start, 2);
    }

    public function getGalleryCountAttribute()
    {
        return $this->gallery()->count();
    }

    public function getItineraryDaysCountAttribute()
    {
        return $this->itineraryDays()->count();
    }

    public function getFaqsCountAttribute()
    {
        return $this->faqs()->count();
    }


    // 
    public function sections(): BelongsToMany
    {
        return $this->belongsToMany(
            PackageSection::class,
            'package_package_section',
            'package_id',
            'package_section_id'
        )
        ->withTimestamps()
        ->withPivot('position')
        ->orderByPivot('position');
    }

}
