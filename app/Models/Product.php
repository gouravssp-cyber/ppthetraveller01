<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_name',
        'product_title',
        'face_image',
        'category_id',
        'variants',
        'is_active',
    ];

    protected $casts = [
        'variants' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the category this product belongs to
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get sections where this product is displayed
     */
    public function sections(): BelongsToMany
    {
        return $this->belongsToMany(Section::class, 'product_section')
            ->withPivot('display_order')
            ->withTimestamps()
            ->orderByPivot('display_order');
    }

    /**
     * Get SEO data for this product
     */
    public function seo(): HasOne
    {
        return $this->hasOne(ProductSeo::class);
    }

    /**
     * Generate product_id from name if not provided
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->product_id)) {
                $product->product_id = Str::slug($product->product_name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('product_name') && empty($product->product_id)) {
                $product->product_id = Str::slug($product->product_name);
            }
        });
    }
}

