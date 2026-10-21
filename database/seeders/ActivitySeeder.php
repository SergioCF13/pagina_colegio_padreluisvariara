<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $activities = [
            // Académicas
            ['title' => 'Feria de Ciencias 2026',             'type' => 'academica',  'category' => 'Feria educativa',      'activity_date' => now()->addDays(20)->format('Y-m-d'), 'description' => 'Los estudiantes exponen sus proyectos de investigación científica ante la comunidad educativa.'],
            ['title' => 'Olimpiada de Matemáticas',           'type' => 'academica',  'category' => 'Competencia',          'activity_date' => now()->addDays(35)->format('Y-m-d'), 'description' => 'Competencia de matemáticas a nivel institucional con los mejores estudiantes de cada grado.'],
            ['title' => 'Concurso de Ortografía',             'type' => 'academica',  'category' => 'Concurso',             'activity_date' => now()->addDays(12)->format('Y-m-d'), 'description' => 'Concurso de ortografía y redacción para estudiantes de primaria y secundaria.'],
            ['title' => 'Taller de Programación',             'type' => 'academica',  'category' => 'Taller',               'activity_date' => now()->addDays(8)->format('Y-m-d'),  'description' => 'Taller introductorio de programación para estudiantes de secundaria.'],
            // Deportivas
            ['title' => 'Torneo de Fútbol Sala',              'type' => 'deportiva',  'category' => 'Fútbol',               'activity_date' => now()->addDays(18)->format('Y-m-d'), 'description' => 'Torneo institucional de fútbol sala con equipos de todos los cursos.'],
            ['title' => 'Campeonato de Básquetbol',           'type' => 'deportiva',  'category' => 'Básquetbol',           'activity_date' => now()->addDays(25)->format('Y-m-d'), 'description' => 'Campeonato interescolar de básquetbol masculino y femenino.'],
            ['title' => 'Torneo de Voleibol',                 'type' => 'deportiva',  'category' => 'Voleibol',             'activity_date' => now()->addDays(40)->format('Y-m-d'), 'description' => 'Torneo de voleibol entre los diferentes grados del nivel secundario.'],
            ['title' => 'Atletismo y Juegos Escolares',       'type' => 'deportiva',  'category' => 'Atletismo',            'activity_date' => now()->addDays(50)->format('Y-m-d'), 'description' => 'Jornada de atletismo y juegos recreativos para todos los niveles.'],
            // Culturales
            ['title' => 'Festival de Danzas Típicas',         'type' => 'cultural',   'category' => 'Danza',                'activity_date' => now()->addDays(22)->format('Y-m-d'), 'description' => 'Presentación de danzas folklóricas y típicas a cargo de los estudiantes.'],
            ['title' => 'Presentación de Teatro Estudiantil', 'type' => 'cultural',   'category' => 'Teatro',               'activity_date' => now()->addDays(45)->format('Y-m-d'), 'description' => 'Obra teatral preparada por los estudiantes de secundaria.'],
            ['title' => 'Concierto de Música Escolar',        'type' => 'cultural',   'category' => 'Música',               'activity_date' => now()->addDays(55)->format('Y-m-d'), 'description' => 'Concierto con presentaciones musicales de los grupos de la institución.'],
            ['title' => 'Exposición de Arte Estudiantil',     'type' => 'cultural',   'category' => 'Arte',                 'activity_date' => now()->addDays(30)->format('Y-m-d'), 'description' => 'Exposición de trabajos artísticos realizados por los estudiantes durante el año.'],
        ];

        foreach ($activities as $a) {
            Activity::create(array_merge($a, ['status' => true]));
        }
    }
}
