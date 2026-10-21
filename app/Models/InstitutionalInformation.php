<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitutionalInformation extends Model
{
    protected $table = 'institutional_information';

    protected $fillable = [
        'history',
        'history_image',
        'history_title',
        'mission',
        'vision',
        'values',
        'objectives',
        'education_level',
        'general_info',
    ];

    /**
     * Obtener el registro único de información institucional.
     */
    public static function getCurrent(): self
    {
        return self::firstOrCreate(
            ['id' => 1],
            [
                'history_title' => 'Nuestra Historia',
                'mission'       => 'Formar integralmente a los estudiantes con valores humanos y cristianos.',
                'vision'        => 'Ser una institución educativa líder en calidad educativa.',
                'values'        => 'Respeto, Responsabilidad, Solidaridad, Honestidad, Fe.',
            ]
        );
    }
}
