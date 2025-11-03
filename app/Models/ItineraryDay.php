<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItineraryDay extends Model
{
    use HasFactory;

    protected $table = 'itinerary_days';
    protected $guarded = [];

    protected $fillable = [
        'package_id',
        'variant_id',
        'day_number',
        'day_title',
        'day_description',
        'feature_image',
        'feature_image_alt',
        'sort_order',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the package associated with this itinerary day
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get the variant associated with this itinerary day (if any)
     */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(PackageVariant::class);
    }

    /**
     * Get all places for this itinerary day
     */
    public function places(): HasMany
    {
        return $this->hasMany(ItineraryPlace::class)->orderBy('sort_order');
    }

    /**
     * Get places count
     */
    public function getPlacesCountAttribute()
    {
        return $this->places()->count();
    }

    /**
     * Get formatted day title with number
     */
    public function getFormattedDayTitleAttribute()
    {
        return "Day {$this->day_number}: {$this->day_title}";
    }
}
