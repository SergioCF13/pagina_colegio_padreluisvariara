<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        // Crear imágenes SVG de ejemplo como banners
        $banners = [
            [
                'color1' => '#1a4a8e', 'color2' => '#3a7bd5',
                'title'  => 'Unidad Educativa Padre Luis Variara',
                'text'   => 'Formando estudiantes para el presente y el futuro',
            ],
            [
                'color1' => '#2c3e50', 'color2' => '#4a6491',
                'title'  => 'Excelencia Académica',
                'text'   => 'Educación de calidad con valores humanos y cristianos',
            ],
            [
                'color1' => '#1a6e3c', 'color2' => '#27ae60',
                'title'  => 'Formación Integral',
                'text'   => 'Desarrollamos el potencial de cada estudiante',
            ],
        ];

        $storagePath = storage_path('app/public/banners');
        File::ensureDirectoryExists($storagePath);

        foreach ($banners as $i => $b) {
            $filename = "banner-demo-" . ($i + 1) . ".svg";
            $fullPath = $storagePath . '/' . $filename;

            $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="1920" height="800" viewBox="0 0 1920 800">
  <defs>
    <linearGradient id="g{$i}" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:{$b['color1']};stop-opacity:1" />
      <stop offset="100%" style="stop-color:{$b['color2']};stop-opacity:1" />
    </linearGradient>
  </defs>
  <rect width="1920" height="800" fill="url(#g{$i})"/>
  <circle cx="1600" cy="150" r="250" fill="rgba(255,255,255,0.05)"/>
  <circle cx="200" cy="650" r="180" fill="rgba(255,255,255,0.05)"/>
  <text x="960" y="340" font-family="Arial,sans-serif" font-size="64" font-weight="bold" text-anchor="middle" fill="white">{$b['title']}</text>
  <text x="960" y="430" font-family="Arial,sans-serif" font-size="32" text-anchor="middle" fill="rgba(255,255,255,0.85)">{$b['text']}</text>
</svg>
SVG;
            File::put($fullPath, $svg);

            Banner::create([
                'title'              => $b['title'],
                'subtitle'           => $b['text'],
                'btn_primary_text'   => 'Conócenos',
                'btn_primary_url'    => '/institucion',
                'btn_secondary_text' => 'Ver eventos',
                'btn_secondary_url'  => '/eventos',
                'image'              => 'banners/' . $filename,
                'order'              => $i + 1,
                'status'             => true,
            ]);
        }
    }
}
