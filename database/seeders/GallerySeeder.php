<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $storagePath = storage_path('app/public/gallery');
        File::ensureDirectoryExists($storagePath);

        $categories = GalleryCategory::all();

        $colors = [
            '#1a4a8e','#27ae60','#e74c3c','#f39c12','#8e44ad',
            '#2980b9','#16a085','#d35400','#2c3e50','#c0392b',
            '#1abc9c','#e67e22',
        ];

        $titles = [
            'Acto de inicio escolar', 'Feria de Ciencias 2026',
            'Campeonato deportivo', 'Festival cultural',
            'Visita de estudios', 'Día del estudiante',
            'Exposición artística', 'Torneo de fútbol',
            'Acto de graduación', 'Paseo recreativo',
            'Concurso de ortografía', 'Desfile cívico',
        ];

        for ($i = 0; $i < 12; $i++) {
            $color   = $colors[$i % count($colors)];
            $title   = $titles[$i % count($titles)];
            $catId   = $categories->isNotEmpty() ? $categories->random()->id : null;
            $filename = "gallery-demo-" . ($i + 1) . ".svg";
            $fullPath = $storagePath . '/' . $filename;

            $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="800" height="600" viewBox="0 0 800 600">
  <rect width="800" height="600" fill="{$color}"/>
  <circle cx="400" cy="250" r="100" fill="rgba(255,255,255,0.15)"/>
  <text x="400" y="240" font-family="Arial,sans-serif" font-size="80" text-anchor="middle" fill="rgba(255,255,255,0.3)">&#128247;</text>
  <text x="400" y="370" font-family="Arial,sans-serif" font-size="24" text-anchor="middle" fill="white" font-weight="bold">{$title}</text>
  <text x="400" y="410" font-family="Arial,sans-serif" font-size="16" text-anchor="middle" fill="rgba(255,255,255,0.7)">U.E. Padre Luis Variara</text>
</svg>
SVG;
            File::put($fullPath, $svg);

            Gallery::create([
                'title'       => $title,
                'description' => 'Fotografía de ' . strtolower($title) . ' en la Unidad Educativa Padre Luis Variara.',
                'image'       => 'gallery/' . $filename,
                'category_id' => $catId,
                'status'      => true,
            ]);
        }
    }
}
