<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Section extends Model
{
    use HasFactory;

    public const TYPE_GRID = 'grid';
    public const TYPE_CAROUSEL = 'carousel';
    public const TYPE_BANNER_CAROUSEL = 'banner_carousel';
    public const TYPE_BANNER = 'banner';

    public static function getTypes(): array
    {
        return [
            self::TYPE_GRID => 'Grid',
            self::TYPE_CAROUSEL => 'Carousel',
            self::TYPE_BANNER_CAROUSEL => 'Banner Carousel',
            self::TYPE_BANNER => 'Banner',
        ];
    }

    protected $fillable = [
        'section_name',
        'section_type',
        'description',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];

    /**
     * Get products in this section
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_section')
            ->withTimestamps()
            ->orderByPivot('display_order');
    }
}

