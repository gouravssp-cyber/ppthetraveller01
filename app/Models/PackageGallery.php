<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageGallery extends Model
{
    use HasFactory;

    protected $table = 'package_gallery';
    protected $guarded = [];

    protected $fillable = [
        'package_id',
        'variant_id',
        'image_url',
        'alt_text',
        'caption',
        'sort_order',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the package associated with this gallery image
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get the variant associated with this gallery image (if any)
     */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(PackageVariant::class);
    }

    /**
     * Get full image URL
     */
    public function getFullImageUrlAttribute()
    {
        if (filter_var($this->image_url, FILTER_VALIDATE_URL)) {
            return $this->image_url;
        }
        return asset('storage/' . $this->image_url);
    }
}
