<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'icon',
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

    /** Scope activas ordenadas. */
    public function scopeActive($query)
    {
        return $query->where('status', true)->orderBy('order');
    }
}
