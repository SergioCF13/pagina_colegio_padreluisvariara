<?php

namespace Database\Seeders;

use App\Models\InstitutionalInformation;
use Illuminate\Database\Seeder;

class InstitutionalInformationSeeder extends Seeder
{
    public function run(): void
    {
        InstitutionalInformation::updateOrCreate(
            ['id' => 1],
            [
                'history_title' => 'Nuestra Historia',
                'history'       => "La Unidad Educativa Padre Luis Variara nació con el firme propósito de brindar educación de calidad a los jóvenes de nuestra comunidad. Fundada hace más de dos décadas, nuestra institución lleva el nombre del Beato Padre Luis Variara, un ejemplo de vocación y entrega al servicio de los más necesitados.\n\nDesde sus inicios, el colegio ha apostado por una educación integral que combina la excelencia académica con la formación en valores humanos y cristianos. A lo largo de los años hemos formado a cientos de jóvenes que hoy son profesionales comprometidos con el desarrollo de nuestra sociedad.\n\nNuestra institución cuenta con modernas instalaciones, docentes altamente capacitados y un ambiente propicio para el aprendizaje y el desarrollo personal de cada estudiante. Continuamos creciendo y mejorando día a día para ofrecer la mejor educación posible.",
                'mission'       => 'Formar integralmente a los estudiantes con sólidos valores humanos, éticos y cristianos, brindando una educación de calidad que desarrolle sus capacidades intelectuales, afectivas y sociales, preparándolos para ser ciudadanos responsables, comprometidos con el bien común y el desarrollo sostenible de la sociedad.',
                'vision'        => 'Ser una institución educativa de excelencia, reconocida a nivel nacional por la calidad de su propuesta pedagógica, la sólida formación en valores de sus egresados y su compromiso con la innovación educativa, contribuyendo al desarrollo integral de la persona y de la comunidad.',
                'values'        => "• Respeto: Reconocemos la dignidad de cada persona\n• Responsabilidad: Cumplimos nuestros compromisos con excelencia\n• Solidaridad: Trabajamos juntos por el bien común\n• Honestidad: Actuamos con transparencia e integridad\n• Fe: Cultivamos la dimensión espiritual del ser humano\n• Excelencia: Buscamos siempre lo mejor en todo lo que hacemos\n• Creatividad: Fomentamos el pensamiento innovador",
                'objectives'    => "• Brindar educación de calidad con equidad e inclusión.\n• Desarrollar competencias académicas, sociales y emocionales en los estudiantes.\n• Formar ciudadanos con valores éticos y comprometidos con su comunidad.\n• Promover la innovación pedagógica y el uso de tecnologías educativas.\n• Fortalecer la relación familia-escuela-comunidad.\n• Garantizar un ambiente seguro y favorable para el aprendizaje.\n• Impulsar actividades deportivas, culturales y artísticas.",
                'education_level' => 'Educación Inicial, Primaria Comunitaria Vocacional y Secundaria Comunitaria Productiva',
                'general_info'  => 'La Unidad Educativa Padre Luis Variara es una institución de carácter fiscal, que atiende a estudiantes desde nivel inicial hasta bachillerato. Contamos con más de 500 estudiantes, un equipo de docentes altamente calificados y una infraestructura moderna que permite el desarrollo óptimo del proceso educativo.',
            ]
        );
    }
}
