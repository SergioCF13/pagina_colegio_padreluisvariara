<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'event_date',
        'event_time',
        'location',
        'category',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
            'status'     => 'boolean',
        ];
    }

    /**
     * Categorías disponibles para eventos.
     */
    public static function categories(): array
    {
        return [
            'acto_civico'        => 'Acto Cívico',
            'feria_educativa'    => 'Feria Educativa',
            'festival_cultural'  => 'Festival Cultural',
            'campeonato'         => 'Campeonato Deportivo',
            'aniversario'        => 'Aniversario',
            'reunion_padres'     => 'Reunión de Padres',
            'graduacion'         => 'Acto de Graduación',
            'academica'          => 'Actividad Académica',
            'religiosa'          => 'Actividad Religiosa',
            'excursion'          => 'Excursión',
            'otros'              => 'Otros',
        ];
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::categories()[$this->category] ?? ucfirst($this->category);
    }

    /** Scope: activos y futuros (o de hoy). */
    public function scopeUpcoming($query)
    {
        return $query->where('status', true)
            ->where('event_date', '>=', now()->toDateString())
            ->orderBy('event_date');
    }

    /** Scope: solo activos. */
    public function scopeActive($query)
    {
        return $query->where('status', true)->orderBy('event_date', 'desc');
    }
}
