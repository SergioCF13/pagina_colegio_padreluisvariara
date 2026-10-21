<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Usuario administrador ─────────────────────────────
        User::updateOrCreate(
            ['email' => 'admin@variara.edu.bo'],
            [
                'name'     => 'Administrador',
                'email'    => 'admin@variara.edu.bo',
                'password' => Hash::make('Admin@2026'),
            ]
        );

        // ── Datos del sistema ─────────────────────────────────
        $this->call([
            SchoolSettingSeeder::class,
            InstitutionalInformationSeeder::class,
            GalleryCategorySeeder::class,
            AreaSeeder::class,
            BannerSeeder::class,
            EventSeeder::class,
            NewsSeeder::class,
            GallerySeeder::class,
            ActivitySeeder::class,
            TeacherSeeder::class,
        ]);
    }
}
