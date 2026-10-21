<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'btn_primary_text',
        'btn_primary_url',
        'btn_secondary_text',
        'btn_secondary_url',
        'image',
        'order',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'order'  => 'integer',
        ];
    }

    /**
     * Scope: solo banners activos ordenados.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true)->orderBy('order');
    }
}
