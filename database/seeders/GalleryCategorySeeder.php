<?php

namespace Database\Seeders;

use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GalleryCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Actividades Académicas',
            'Actividades Deportivas',
            'Actividades Culturales',
            'Actos Cívicos',
            'Aniversarios',
            'Graduaciones',
            'Excursiones',
            'Infraestructura',
            'Docentes',
            'Estudiantes',
            'Otros',
        ];

        foreach ($categories as $name) {
            GalleryCategory::create([
                'name'   => $name,
                'slug'   => Str::slug($name),
                'status' => true,
            ]);
        }
    }
}
