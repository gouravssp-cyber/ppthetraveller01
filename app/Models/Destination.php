<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'destinations';
    protected $guarded = [];

    protected $fillable = [
        'name',
        'slug',
        'tour_type_id',
        'meta_title',
        'meta_description',
        'h1_title',
        'description',
        'status',
        'featured',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the tour type this destination belongs to
     */
    public function tourType(): BelongsTo
    {
        return $this->belongsTo(TourType::class);
    }

    /**
     * Get all packages for this destination
     */
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }

    /**
     * Get all itinerary places for this destination
     */
    public function itineraryPlaces(): HasMany
    {
        return $this->hasMany(ItineraryPlace::class);
    }

    /**
     * Get all FAQs for this destination
     */
    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    /**
     * Get all URL redirects pointing to this destination
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
         * Auto-generate slug from name when creating
         */
        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = \Illuminate\Support\Str::slug($model->name);
            }
        });
    }

    /**
     * Get active destinations
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get featured destinations
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Get domestic destinations
     */
    public function scopeDomestic($query)
    {
        return $query->whereHas('tourType', function ($q) {
            $q->where('name', 'like', '%Domestic%')
              ->orWhere('slug', 'like', '%domestic%');
        });
    }

    /**
     * Get international destinations
     */
    public function scopeInternational($query)
    {
        return $query->whereHas('tourType', function ($q) {
            $q->where('name', 'like', '%International%')
              ->orWhere('slug', 'like', '%international%');
        });
    }

    /**
     * Get count of packages for this destination
     */
    public function getPackagesCountAttribute()
    {
        return $this->packages()->count();
    }
}
