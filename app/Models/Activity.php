<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'activity_date',
        'type',
        'category',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'activity_date' => 'date',
            'status'        => 'boolean',
        ];
    }

    public static function types(): array
    {
        return [
            'academica'  => 'Académica',
            'deportiva'  => 'Deportiva',
            'cultural'   => 'Cultural',
        ];
    }

    public function getTypeLabelAttribute(): string
    {
        return self::types()[$this->type] ?? ucfirst($this->type);
    }

    /** Scope activas. */
    public function scopeActive($query)
    {
        return $query->where('status', true)->latest('activity_date');
    }

    /** Scope por tipo. */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }
}
