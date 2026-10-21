<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    */
    'title'         => 'Admin',
    'title_prefix'  => '',
    'title_postfix' => ' | Variara Admin',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    */
    'use_ico_only'  => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    */
    'logo'       => '<b>Variara</b> Admin',
    'logo_img'   => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class'  => 'brand-image elevation-3',
    'logo_img_xl'     => null,
    'logo_img_xl_class'   => 'brand-image-xl',
    'logo_img_alt'    => 'Logo Variara',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    */
    'usermenu_enabled'  => true,
    'usermenu_header'   => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image'    => false,
    'usermenu_desc'     => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    */
    'layout_topnav'    => null,
    'layout_boxed'     => null,
    'layout_fixed_sidebar'   => null,
    'layout_fixed_navbar'    => null,
    'layout_fixed_footer'    => null,
    'layout_dark_sidebar'    => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views
    |--------------------------------------------------------------------------
    */
    'auth_header_class' => 'text-center',
    'auth_logo_enabled' => true,
    'auth_logo_img'     => null,
    'auth_logo_img_alt' => 'Logo',
    'auth_logo_img_class' => 'animation__shake',
    'auth_logo_large'   => '<b>Variara</b>',
    'auth_logo_mini'    => '<b>V</b>',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    */
    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    */
    'sidebar_mini'         => 'lg',
    'sidebar_collapse'     => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme'  => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion'  => true,
    'sidebar_nav_animation_speed' => 300,
    'sidebar_nav_pills'  => true,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    */
    'right_sidebar'       => false,
    'right_sidebar_icon'  => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push'  => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    */
    'use_route_url' => false,
    'dashboard_url' => 'admin.dashboard',
    'logout_url'    => 'logout',
    'login_url'     => 'login',
    'register_url'  => false,
    'password_reset_url' => false,
    'password_email_url' => false,
    'profile_url'   => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    */
    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path'  => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    */
    'menu' => [
        // DASHBOARD
        [
            'text'        => 'Dashboard',
            'url'         => 'admin/dashboard',
            'icon'        => 'fas fa-tachometer-alt',
            'icon_color'  => 'blue',
        ],

        // INSTITUCIÓN
        ['header' => 'INSTITUCIÓN'],
        [
            'text' => 'Información',
            'icon' => 'fas fa-school',
            'submenu' => [
                [
                    'text' => 'Info Institucional',
                    'url'  => 'admin/institucion',
                    'icon' => 'fas fa-info-circle',
                ],
                [
                    'text' => 'Historia',
                    'url'  => 'admin/historia',
                    'icon' => 'fas fa-book-open',
                ],
                [
                    'text' => 'Misión y Visión',
                    'url'  => 'admin/mision-vision',
                    'icon' => 'fas fa-bullseye',
                ],
            ],
        ],

        // CONTENIDO
        ['header' => 'CONTENIDO'],
        [
            'text' => 'Noticias',
            'url'  => 'admin/noticias',
            'icon' => 'fas fa-newspaper',
        ],
        [
            'text' => 'Eventos',
            'url'  => 'admin/eventos',
            'icon' => 'fas fa-calendar-alt',
        ],
        [
            'text' => 'Galería',
            'icon' => 'fas fa-images',
            'submenu' => [
                [
                    'text' => 'Fotografías',
                    'url'  => 'admin/galeria',
                    'icon' => 'fas fa-photo-video',
                ],
                [
                    'text' => 'Categorías',
                    'url'  => 'admin/categorias',
                    'icon' => 'fas fa-tags',
                ],
            ],
        ],
        [
            'text' => 'Banners',
            'url'  => 'admin/banners',
            'icon' => 'fas fa-image',
        ],

        // ACADÉMICO
        ['header' => 'ACADÉMICO'],
        [
            'text' => 'Áreas Educativas',
            'url'  => 'admin/areas',
            'icon' => 'fas fa-graduation-cap',
        ],
        [
            'text' => 'Actividades',
            'icon' => 'fas fa-running',
            'submenu' => [
                [
                    'text' => 'Académicas',
                    'url'  => 'admin/actividades?type=academica',
                    'icon' => 'fas fa-chalkboard-teacher',
                ],
                [
                    'text' => 'Deportivas',
                    'url'  => 'admin/actividades?type=deportiva',
                    'icon' => 'fas fa-futbol',
                ],
                [
                    'text' => 'Culturales',
                    'url'  => 'admin/actividades?type=cultural',
                    'icon' => 'fas fa-music',
                ],
            ],
        ],

        // INSTITUCIONAL
        ['header' => 'INSTITUCIONAL'],
        [
            'text' => 'Personal Docente',
            'url'  => 'admin/docentes',
            'icon' => 'fas fa-users',
        ],

        // CONFIGURACIÓN
        ['header' => 'CONFIGURACIÓN'],
        [
            'text' => 'Datos del Colegio',
            'url'  => 'admin/configuracion',
            'icon' => 'fas fa-cog',
        ],
        [
            'text' => 'Usuarios',
            'url'  => 'admin/usuarios',
            'icon' => 'fas fa-user-cog',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    */
    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins
    |--------------------------------------------------------------------------
    */
    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files'  => [
                [
                    'type'  => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js',
                ],
                [
                    'type'  => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js',
                ],
                [
                    'type'  => 'css',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files'  => [
                [
                    'type'  => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                ],
                [
                    'type'  => 'css',
                    'asset' => false,
                    'location' => 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                ],
                [
                    'type'  => 'css',
                    'asset' => false,
                    'location' => 'https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files'  => [
                [
                    'type'  => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js',
                ],
                [
                    'type'  => 'css',
                    'asset' => false,
                    'location' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    */
    'iframe' => [
        'default_tab' => [
            'url'   => null,
            'title' => null,
        ],
        'buttons' => [
            'close'       => true,
            'close_all'   => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen'  => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    */
    'livewire' => false,
];
