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

    /**
     * Get the tour type associated with this package
     */
    public function tourType(): BelongsTo
    {
        return $this->belongsTo(TourType::class);
    }

    /**
     * Get the destination associated with this package
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    /**
     * Get all variants for this package
     */
    public function variants(): HasMany
    {
        return $this->hasMany(PackageVariant::class)->orderBy('sort_order');
    }

    /**
     * Get all itinerary days for this package
     */
    public function itineraryDays(): HasMany
    {
        return $this->hasMany(ItineraryDay::class)->orderBy('day_number');
    }

    /**
     * Get all gallery images for this package
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(PackageGallery::class)->orderBy('sort_order');
    }

    /**
     * Get all FAQs for this package
     */
    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class)->orderBy('sort_order');
    }

    /**
     * Get related packages (You May Also Like)
     */
    public function relatedPackages(): BelongsToMany
    {
        return $this->belongsToMany(
            Package::class,
            'related_packages',
            'package_id',
            'related_package_id'
        )->orderByPivot('sort_order');
    }

    /**
     * Get packages that reference this package as related
     */
    public function relatedToPackages(): BelongsToMany
    {
        return $this->belongsToMany(
            Package::class,
            'related_packages',
            'related_package_id',
            'package_id'
        );
    }

    /**
     * Get URL redirects for this package
     */
    public function urlRedirects(): HasMany
    {
        return $this->hasMany(UrlRedirect::class);
    }

    /**
     * Boot method for model events
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Generate slug from title when creating (if not already set)
         * Note: On migration/edit, slug should NOT be auto-generated to preserve SEO
         */
        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = \Illuminate\Support\Str::slug($model->title);
            }
        });
    }

    /**
     * Get active published packages
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Get featured packages
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Get packages by tour type
     */
    public function scopeByTourType($query, $tourTypeId)
    {
        return $query->where('tour_type_id', $tourTypeId);
    }

    /**
     * Get packages by destination
     */
    public function scopeByDestination($query, $destinationId)
    {
        return $query->where('destination_id', $destinationId);
    }

    /**
     * Get packages migrated from legacy
     */
    public function scopeLegacy($query)
    {
        return $query->where('migrated_from_legacy', true);
    }

    /**
     * Calculate discounted percentage
     */
    public function getDiscountPercentageAttribute()
    {
        if (!$this->price_compare_at || !$this->price_start) {
            return 0;
        }

        return round(
            (($this->price_compare_at - $this->price_start) / $this->price_compare_at) * 100
        );
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return '₹' . number_format($this->price_start, 2);
    }

    /**
     * Get formatted compare price
     */
    public function getFormattedComparePriceAttribute()
    {
        return $this->price_compare_at ? '₹' . number_format($this->price_compare_at, 2) : null;
    }

    /**
     * Get total number of variants
     */
    public function getVariantsCountAttribute()
    {
        return $this->variants()->count();
    }

    /**
     * Get total gallery images
     */
    public function getGalleryCountAttribute()
    {
        return $this->gallery()->count();
    }
}
