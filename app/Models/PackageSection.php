<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageSection extends Model
{
    use HasFactory;

    protected $table = 'package_sections';
    protected $guarded = [];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'position',
        'status',
        'meta_title',
        'meta_description',
        'section_icon',
        'banner_image',          // NEW
        'banner_image_alt',      // NEW
    ];

    protected $casts = [
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get all packages in this section (ordered by position)
     */
    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(
            Package::class,
            'package_sections',
            'package_section_id',
            'package_id'
        )
        ->withTimestamps()
        ->withPivot('position')
        ->orderByPivot('position');
    }

    /**
     * Boot method for model events
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Auto-generate slug from title
         */
        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = \Illuminate\Support\Str::slug($model->title);
            }
        });
    }

    /**
     * Get active sections
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get sections ordered by position
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('position');
    }

    /**
     * Get published packages in section
     */
    public function getPublishedPackagesAttribute()
    {
        return $this->packages()
            ->where('status', 'published')
            ->get();
    }

    /**
     * Get package count
     */
    public function getPackagesCountAttribute()
    {
        return $this->packages()->count();
    }

    /**
     * Get full banner image URL
     */
    public function getFullBannerImageUrlAttribute()
    {
        if (!$this->banner_image) {
            return null;
        }

        if (filter_var($this->banner_image, FILTER_VALIDATE_URL)) {
            return $this->banner_image;
        }

        return asset('storage/' . $this->banner_image);
    }
}
