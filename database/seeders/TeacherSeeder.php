<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = [
            ['name' => 'María',    'lastname' => 'González Vargas',  'role' => 'director',       'position' => 'Directora General',           'area' => 'Dirección',              'order' => 1],
            ['name' => 'Carlos',   'lastname' => 'Mamani Quispe',    'role' => 'administrativo', 'position' => 'Secretario Académico',        'area' => 'Secretaría',             'order' => 2],
            ['name' => 'Ana',      'lastname' => 'Flores Condori',   'role' => 'docente',        'position' => 'Docente de Matemáticas',      'area' => 'Matemáticas',            'order' => 3],
            ['name' => 'Roberto',  'lastname' => 'Chura Layme',      'role' => 'docente',        'position' => 'Docente de Lenguaje',         'area' => 'Lenguaje y Literatura',  'order' => 4],
            ['name' => 'Patricia', 'lastname' => 'Torrez Huanca',    'role' => 'docente',        'position' => 'Docente de Ciencias',         'area' => 'Ciencias Naturales',     'order' => 5],
            ['name' => 'Jorge',    'lastname' => 'Quispe Apaza',     'role' => 'docente',        'position' => 'Docente de Sistemas',         'area' => 'Sistemas Informáticos',  'order' => 6],
            ['name' => 'Lucía',    'lastname' => 'Poma Huallpa',     'role' => 'docente',        'position' => 'Docente de Educación Física', 'area' => 'Educación Física',       'order' => 7],
            ['name' => 'Miguel',   'lastname' => 'Ramos Villca',     'role' => 'docente',        'position' => 'Docente de Historia',         'area' => 'Ciencias Sociales',      'order' => 8],
        ];

        foreach ($teachers as $t) {
            Teacher::create(array_merge($t, ['status' => true, 'description' => 'Docente con amplia experiencia en la formación académica y humana de los estudiantes.']));
        }
    }
}
