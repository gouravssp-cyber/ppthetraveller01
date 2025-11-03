<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RelatedPackage extends Model
{
    use HasFactory;

    protected $table = 'related_packages';
    protected $guarded = [];

    protected $fillable = [
        'package_id',
        'related_package_id',
        'sort_order',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the main package
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get the related package
     */
    public function relatedPackage(): BelongsTo
    {
        return $this->belongsTo(Package::class, 'related_package_id');
    }
}
