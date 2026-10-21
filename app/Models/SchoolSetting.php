<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolSetting extends Model
{
    protected $fillable = [
        'school_name',
        'logo',
        'favicon',
        'description',
        'address',
        'phone',
        'whatsapp',
        'email',
        'facebook',
        'instagram',
        'youtube',
        'tiktok',
        'google_maps',
        'schedule',
        'footer_text',
    ];

    /**
     * Obtener la configuración actual (siempre un solo registro).
     */
    public static function getCurrent(): self
    {
        return self::firstOrCreate(
            ['id' => 1],
            [
                'school_name' => 'Unidad Educativa Padre Luis Variara',
                'description'  => 'Formando estudiantes para el presente y el futuro.',
                'footer_text'  => '© ' . date('Y') . ' Unidad Educativa Padre Luis Variara. Todos los derechos reservados.',
            ]
        );
    }
}
