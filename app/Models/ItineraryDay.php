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

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function places(): HasMany
    {
        return $this->hasMany(ItineraryPlace::class)->orderBy('sort_order');
    }

    public function getPlacesCountAttribute()
    {
        return $this->places()->count();
    }

    public function getFormattedDayTitleAttribute()
    {
        return "Day {$this->day_number}: {$this->day_title}";
    }
}
