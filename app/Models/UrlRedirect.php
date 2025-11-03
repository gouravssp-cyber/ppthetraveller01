<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UrlRedirect extends Model
{
    use HasFactory;

    protected $table = 'url_redirects';
    protected $guarded = [];

    protected $fillable = [
        'old_url',
        'old_slug',
        'new_url',
        'package_id',
        'destination_id',
        'redirect_type',
        'status',
        'notes',
    ];

    protected $casts = [
        'redirect_type' => 'string',
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the package this redirect points to (if any)
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get the destination this redirect points to (if any)
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    /**
     * Get active redirects
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get permanent redirects (301)
     */
    public function scopePermanent($query)
    {
        return $query->where('redirect_type', '301');
    }

    /**
     * Get temporary redirects (302)
     */
    public function scopeTemporary($query)
    {
        return $query->where('redirect_type', '302');
    }

    /**
     * Check if redirect is active and permanent
     */
    public function isActivePermanent(): bool
    {
        return $this->status === 'active' && $this->redirect_type === '301';
    }

    /**
     * Get HTTP status code
     */
    public function getHttpStatusCodeAttribute()
    {
        return (int) $this->redirect_type;
    }
}
