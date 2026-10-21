<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    /**
     * Relación: una categoría tiene muchas fotos.
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }

    /** Scope activas. */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
