<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            ['name' => 'Sistemas Informáticos',  'icon' => 'fas fa-laptop-code',     'order' => 1,  'description' => 'Programación, redes, diseño y tecnología de la información.'],
            ['name' => 'Matemáticas',             'icon' => 'fas fa-calculator',      'order' => 2,  'description' => 'Aritmética, álgebra, geometría, cálculo y estadística.'],
            ['name' => 'Lenguaje y Literatura',   'icon' => 'fas fa-book',            'order' => 3,  'description' => 'Comunicación oral y escrita, literatura y comprensión lectora.'],
            ['name' => 'Ciencias Naturales',      'icon' => 'fas fa-flask',           'order' => 4,  'description' => 'Biología, química, física y ciencias de la tierra.'],
            ['name' => 'Ciencias Sociales',       'icon' => 'fas fa-globe-americas',  'order' => 5,  'description' => 'Historia, geografía, cívica y educación ciudadana.'],
            ['name' => 'Educación Física',        'icon' => 'fas fa-running',         'order' => 6,  'description' => 'Deportes, actividad física, salud y bienestar.'],
            ['name' => 'Educación Musical',       'icon' => 'fas fa-music',           'order' => 7,  'description' => 'Teoría musical, canto, instrumentos y apreciación musical.'],
            ['name' => 'Artes Plásticas',         'icon' => 'fas fa-palette',         'order' => 8,  'description' => 'Dibujo, pintura, escultura y expresión artística.'],
            ['name' => 'Inglés',                  'icon' => 'fas fa-language',        'order' => 9,  'description' => 'Idioma inglés: lectura, escritura, conversación y gramática.'],
            ['name' => 'Educación en Valores',    'icon' => 'fas fa-heart',           'order' => 10, 'description' => 'Formación ética, moral, ciudadana y espiritual.'],
            ['name' => 'Técnica Tecnológica',     'icon' => 'fas fa-tools',           'order' => 11, 'description' => 'Educación técnica y formación para el trabajo productivo.'],
            ['name' => 'Cosmovisiones y Filosofía', 'icon' => 'fas fa-brain',         'order' => 12, 'description' => 'Filosofía, lógica, epistemología y pensamiento crítico.'],
        ];

        foreach ($areas as $area) {
            Area::create([
                'name'        => $area['name'],
                'icon'        => $area['icon'],
                'order'       => $area['order'],
                'description' => $area['description'],
                'status'      => true,
            ]);
        }
    }
}
