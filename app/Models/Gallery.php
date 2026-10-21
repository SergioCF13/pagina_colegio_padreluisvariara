<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status'      => 'boolean',
            'category_id' => 'integer',
        ];
    }

    /**
     * Relación: foto pertenece a una categoría.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }

    /** Scope activas. */
    public function scopeActive($query)
    {
        return $query->where('status', true)->latest();
    }
}
