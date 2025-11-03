<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faqs';
    protected $guarded = [];

    protected $fillable = [
        'package_id',
        'destination_id',
        'question',
        'answer',
        'sort_order',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the package associated with this FAQ (if any)
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get the destination associated with this FAQ (if any)
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    /**
     * Scope to get package-specific FAQs
     */
    public function scopePackageSpecific($query)
    {
        return $query->whereNotNull('package_id');
    }

    /**
     * Scope to get destination-specific FAQs
     */
    public function scopeDestinationSpecific($query)
    {
        return $query->whereNotNull('destination_id');
    }

    /**
     * Get the related entity (package or destination)
     */
    public function getRelatedEntityAttribute()
    {
        return $this->package ?? $this->destination;
    }

    /**
     * Get the related entity type
     */
    public function getRelatedEntityTypeAttribute()
    {
        return $this->package_id ? 'Package' : 'Destination';
    }
}
