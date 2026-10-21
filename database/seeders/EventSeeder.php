<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title'       => 'Acto de Inicio del Año Escolar 2026',
                'description' => 'Ceremonia de bienvenida para todos los estudiantes, padres y docentes al inicio del nuevo año escolar. Se presentará la propuesta educativa para la gestión.',
                'event_date'  => now()->addDays(5)->format('Y-m-d'),
                'event_time'  => '08:00:00',
                'location'    => 'Patio central del colegio',
                'category'    => 'acto_civico',
                'status'      => true,
            ],
            [
                'title'       => 'Feria Educativa de Ciencias y Tecnología 2026',
                'description' => 'Los estudiantes de todos los niveles presentarán sus proyectos científicos y tecnológicos. Evento abierto a la comunidad.',
                'event_date'  => now()->addDays(15)->format('Y-m-d'),
                'event_time'  => '09:00:00',
                'location'    => 'Salones y patios del colegio',
                'category'    => 'feria_educativa',
                'status'      => true,
            ],
            [
                'title'       => 'Festival Cultural Aniversario Institucional',
                'description' => 'Gran festival cultural con presentaciones de danzas, música, teatro y más, celebrando el aniversario de nuestra institución.',
                'event_date'  => now()->addDays(22)->format('Y-m-d'),
                'event_time'  => '15:00:00',
                'location'    => 'Auditorio institucional',
                'category'    => 'festival_cultural',
                'status'      => true,
            ],
            [
                'title'       => 'Campeonato Deportivo Interescolar',
                'description' => 'Torneo de fútbol, básquet y voleibol con participación de los mejores equipos de los colegios de la zona.',
                'event_date'  => now()->addDays(30)->format('Y-m-d'),
                'event_time'  => '08:30:00',
                'location'    => 'Canchas deportivas',
                'category'    => 'campeonato',
                'status'      => true,
            ],
            [
                'title'       => 'Reunión General de Padres de Familia',
                'description' => 'Reunión informativa con los padres y tutores para presentar el avance académico del primer trimestre y tratar temas importantes.',
                'event_date'  => now()->addDays(10)->format('Y-m-d'),
                'event_time'  => '18:00:00',
                'location'    => 'Aula magna',
                'category'    => 'reunion_padres',
                'status'      => true,
            ],
            [
                'title'       => 'Acto de Graduación Promoción 2026',
                'description' => 'Ceremonia solemne de graduación de los estudiantes bachilleres de la promoción 2026. Acto de entrega de diplomas y reconocimientos.',
                'event_date'  => now()->addDays(60)->format('Y-m-d'),
                'event_time'  => '19:00:00',
                'location'    => 'Teatro Municipal',
                'category'    => 'graduacion',
                'status'      => true,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
