<?php

namespace Database\Seeders;

use App\Models\SchoolSetting;
use Illuminate\Database\Seeder;

class SchoolSettingSeeder extends Seeder
{
    public function run(): void
    {
        SchoolSetting::updateOrCreate(
            ['id' => 1],
            [
                'school_name' => 'Unidad Educativa Padre Luis Variara',
                'description' => 'Institución educativa comprometida con la formación integral de estudiantes con valores humanos, cristianos y académicos de excelencia.',
                'address'     => 'Av. Principal s/n, Bolivia',
                'phone'       => '+591 2 000-0000',
                'whatsapp'    => '+59170000000',
                'email'       => 'info@uepluisvariara.edu.bo',
                'facebook'    => 'https://facebook.com',
                'instagram'   => 'https://instagram.com',
                'youtube'     => 'https://youtube.com',
                'tiktok'      => null,
                'google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15352.372736441785!2d-68.1195!3d-16.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTbCsDMwJzAwLjAiUyA2OMKwMDcnMTAuMiJX!5e0!3m2!1ses!2sbo!4v1700000000000!5m2!1ses!2sbo" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'schedule'    => "Lunes a Viernes\nTurno mañana: 7:30 – 12:30\nTurno tarde: 13:30 – 18:00\nSábados: 8:00 – 12:00",
                'footer_text' => '© ' . date('Y') . ' Unidad Educativa Padre Luis Variara. Todos los derechos reservados.',
            ]
        );
    }
}
