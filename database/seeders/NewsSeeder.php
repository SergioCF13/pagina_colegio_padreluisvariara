<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $newsItems = [
            [
                'title'   => 'Inicio del Año Escolar 2026: Bienvenidos a una nueva gestión educativa',
                'summary' => 'Con gran entusiasmo y motivación, la Unidad Educativa Padre Luis Variara da la bienvenida a todos sus estudiantes, docentes y familias al inicio del año escolar 2026.',
                'content' => "Con gran entusiasmo y motivación, la Unidad Educativa Padre Luis Variara da la bienvenida a todos sus estudiantes, docentes y familias al inicio del año escolar 2026.\n\nEste año trae consigo nuevos retos y oportunidades para toda nuestra comunidad educativa. El equipo directivo ha preparado una propuesta pedagógica renovada, con nuevas metodologías de enseñanza y recursos didácticos actualizados.\n\nLas inscripciones para el nuevo año están abiertas y pueden realizarse en la secretaría del colegio de lunes a viernes de 8:00 a 17:00.\n\nInvitamos a toda la comunidad a participar activamente en las actividades programadas para esta gestión.",
                'author'  => 'Dirección General',
                'status'  => 'published',
                'published_at' => now()->subDays(2),
            ],
            [
                'title'   => 'Estudiantes de secundaria ganan primer lugar en Olimpiada de Matemáticas',
                'summary' => 'Nuestros estudiantes de 5to y 6to de secundaria obtuvieron brillantes resultados en la Olimpiada Regional de Matemáticas, consagrándose campeones.',
                'content' => "Con enorme orgullo compartimos que los estudiantes de 5to y 6to de secundaria de la Unidad Educativa Padre Luis Variara obtuvieron el primer lugar en la Olimpiada Regional de Matemáticas.\n\nEl equipo estuvo conformado por estudiantes que demostraron un excelente nivel académico y una dedicación admirable en su preparación.\n\nFelicitamos a los estudiantes ganadores, a sus familias y a los docentes del Área de Matemáticas por este logro que enorgullece a toda nuestra institución.\n\nEste resultado refleja el compromiso de nuestra institución con la excelencia académica y el desarrollo del pensamiento lógico-matemático.",
                'author'  => 'Coordinación Académica',
                'status'  => 'published',
                'published_at' => now()->subDays(7),
            ],
            [
                'title'   => 'Nueva sala de computación equipada con tecnología de última generación',
                'summary' => 'Nuestra institución estrena una moderna sala de computación con 40 equipos nuevos, conexión de alta velocidad y software educativo actualizado.',
                'content' => "Con gran satisfacción anunciamos la inauguración de nuestra nueva sala de computación, equipada con 40 computadoras de última generación, internet de alta velocidad y una amplia variedad de software educativo.\n\nEsta nueva infraestructura tecnológica permitirá a nuestros estudiantes desarrollar competencias digitales fundamentales para el siglo XXI.\n\nEl proyecto fue posible gracias al esfuerzo conjunto de la dirección, padres de familia y el apoyo de instituciones colaboradoras.\n\nLa sala estará disponible para todas las áreas curriculares y también en horario extracurricular para actividades de refuerzo.",
                'author'  => 'Área de Sistemas',
                'status'  => 'published',
                'published_at' => now()->subDays(14),
            ],
            [
                'title'   => 'Programa de orientación vocacional para estudiantes de bachillerato',
                'summary' => 'La institución implementa un programa especial de orientación vocacional para ayudar a los estudiantes de últimos años a elegir su carrera profesional.',
                'content' => "La Unidad Educativa Padre Luis Variara ha implementado un programa integral de orientación vocacional dirigido a los estudiantes de 5to y 6to de secundaria.\n\nEl programa incluye:\n- Talleres de autoconocimiento y exploración de intereses\n- Visitas a universidades e institutos\n- Charlas con profesionales de diversas áreas\n- Tests vocacionales y orientación psicológica\n\nLos estudiantes interesados pueden inscribirse en la secretaría del colegio o hablar con su tutor de aula.\n\nEsta iniciativa forma parte del compromiso de nuestra institución con el futuro de sus estudiantes.",
                'author'  => 'Departamento de Orientación',
                'status'  => 'published',
                'published_at' => now()->subDays(20),
            ],
            [
                'title'   => 'Comunicado: Calendario de actividades del primer trimestre 2026',
                'summary' => 'Se informa a toda la comunidad educativa el calendario oficial de actividades académicas y eventos institucionales para el primer trimestre.',
                'content' => "Se comunica a todos los padres de familia, estudiantes y docentes el calendario oficial de actividades del primer trimestre 2026.\n\nFechas importantes:\n- Inicio de clases: 3 de febrero\n- Reunión de padres: 15 de febrero\n- Feria educativa: 20 de marzo\n- Festival cultural: 5 de abril\n- Evaluaciones de primer trimestre: 25-30 de abril\n\nPara mayor información comunicarse con la secretaría del colegio.\n\nAtentamente,\nDirección General\nUnidad Educativa Padre Luis Variara",
                'author'  => 'Secretaría',
                'status'  => 'published',
                'published_at' => now()->subDays(5),
            ],
            [
                'title'   => 'Próximamente: Gran feria gastronómica y cultural',
                'summary' => 'En preparación para el aniversario institucional, se organizará una gran feria gastronómica y cultural con la participación de todos los grados.',
                'content' => "En el marco de las celebraciones por el aniversario de nuestra institución, se organizará una Gran Feria Gastronómica y Cultural con la participación de todos los cursos.\n\nActividades planificadas:\n- Puestos gastronómicos con comidas típicas\n- Presentaciones artísticas\n- Exposición de trabajos estudiantiles\n- Concursos y juegos recreativos\n\nLas familias están invitadas a participar activamente.\n\nMás información próximamente.",
                'author'  => 'Comité de Eventos',
                'status'  => 'draft',
                'published_at' => null,
            ],
        ];

        foreach ($newsItems as $item) {
            $item['slug'] = News::generateSlug($item['title']);
            News::create($item);
        }
    }
}
