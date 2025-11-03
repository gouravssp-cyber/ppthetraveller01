<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItineraryPlace extends Model
{
    use HasFactory;

    protected $table = 'itinerary_places';
    protected $guarded = [];

    protected $fillable = [
        'itinerary_day_id',
        'place_name',
        'place_description',
        'destination_id',
        'latitude',
        'longitude',
        'image_url',
        'image_alt',
        'sort_order',
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the itinerary day associated with this place
     */
    public function itineraryDay(): BelongsTo
    {
        return $this->belongsTo(ItineraryDay::class);
    }

    /**
     * Get the destination associated with this place (optional)
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    /**
     * Check if this place has coordinates
     */
    public function hasCoordinates(): bool
    {
        return !is_null($this->latitude) && !is_null($this->longitude);
    }

    /**
     * Get coordinates as array
     */
    public function getCoordinatesAttribute()
    {
        if ($this->hasCoordinates()) {
            return [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ];
        }
        return null;
    }

    /**
     * Get Google Maps URL
     */
    public function getGoogleMapsUrlAttribute()
    {
        if ($this->hasCoordinates()) {
            return "https://www.google.com/maps/search/{$this->latitude},{$this->longitude}";
        }
        return null;
    }
}
