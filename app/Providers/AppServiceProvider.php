<?php

namespace App\Providers;

use App\Models\SchoolSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Compartir configuración del colegio con todas las vistas
        View::composer('*', function ($view) {
            try {
                if (Schema::hasTable('school_settings')) {
                    $settings = SchoolSetting::getCurrent();
                    $view->with('globalSettings', $settings);
                }
            } catch (\Exception $e) {
                // Silencioso si la DB no está lista aún
            }
        });
    }
}
