<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'position',
        'area',
        'photo',
        'description',
        'role',
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

    public static function roles(): array
    {
        return [
            'director'       => 'Director/a',
            'docente'        => 'Docente',
            'administrativo' => 'Administrativo/a',
            'apoyo'          => 'Personal de Apoyo',
        ];
    }

    public function getRoleLabelAttribute(): string
    {
        return self::roles()[$this->role] ?? ucfirst($this->role);
    }

    public function getFullNameAttribute(): string
    {
        return trim($this->name . ' ' . $this->lastname);
    }

    /** Scope activos ordenados. */
    public function scopeActive($query)
    {
        return $query->where('status', true)->orderBy('order');
    }
}
