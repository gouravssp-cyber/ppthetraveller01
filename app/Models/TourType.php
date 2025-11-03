<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TourType extends Model
{
    use HasFactory;

    protected $table = 'tour_types';
    protected $guarded = [];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get all packages associated with this tour type
     */
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
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
     * Get active tour types
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get all packages count for this type
     */
    public function getPackagesCountAttribute()
    {
        return $this->packages()->count();
    }
}
