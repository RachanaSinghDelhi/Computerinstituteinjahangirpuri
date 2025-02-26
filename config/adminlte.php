<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

   'logo' => '<div style=" display: flex; flex-direction: column; margin-left:10px;">
                <b>Nice Web</b>
                <span style="font-size: 14px; margin-top: -5px;">Technologies</span>
           </div>',

    'logo_img' => 'assets/images/logo1_3D_half.png',
    'logo_img_class' => 'brand-image img-circle elevation-4',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Nice Web Technologies',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'assets/images/logo1_3D_half.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration. Currently, two
    | modes are supported: 'fullscreen' for a fullscreen preloader animation
    | and 'cwrapper' to attach the preloader animation into the content-wrapper
    | element and avoid overlapping it with the sidebars and the top navbar.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => true,
        'mode' => 'fullscreen',
        'img' => [
            'path' => 'assets/images/logo1_3D_half.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,
    'disable_darkmode_routes' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Asset Bundling
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Asset Bundling option for the admin panel.
    | Currently, the next modes are supported: 'mix', 'vite' and 'vite_js_only'.
    | When using 'vite_js_only', it's expected that your CSS is imported using
    | JavaScript. Typically, in your application's 'resources/js/app.js' file.
    | If you are not using any of these, leave it as 'false'.
    |
    | For detailed instructions you can look the asset bundling section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'laravel_asset_bundling' => false,
    'laravel_css_path' => 'css/app.css',
    'laravel_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

'menu' => [
    [
        'text' => 'Dashboard',
        'route' => 'dashboard.index',
        'icon'  => 'fas fa-tachometer-alt',
        'can'   => ['super_admin', 'admin', 'teacher'], 
    ],
    [
        'text' => 'Courses',
        'icon' => 'fas fa-book',
        'can'  => ['super_admin'],
        'submenu' => [
            [
                'text'  => 'Add Course',
                'route' => 'course.create',
                'icon'  => 'fas fa-plus-circle',
                'can'  => ['super_admin'],
            ],
            [
                'text'  => 'Course List',
                'route' => 'course.index',
                'icon'  => 'fas fa-list',
                'can'  => ['super_admin'],
            ],
        ],
    ],
    [
        'text' => 'Posts',
        'icon' => 'fas fa-edit',
        'can'  => ['super_admin'],
        'submenu' => [
            [
                'text'  => 'Add Post',
                'route' => 'posts.create_post',
                'icon'  => 'fas fa-plus-circle',
               
            ],
            [
                'text'  => 'Post List',
                'route' => 'posts.new_posts',
                'icon'  => 'fas fa-list',
               
            ],
        ],
    ],

    [
        'text' => 'Posts',
        'icon' => 'fas fa-edit',
        'can'  => ['admin'],
        'submenu' => [
            [
                'text'  => 'Add Post',
                'route' => 'admin.posts.create_post',
                'icon'  => 'fas fa-plus-circle',
              
            ],
            [
                'text'  => 'Post List',
                'route' => 'admin.posts.new_posts',
                'icon'  => 'fas fa-list',
             
            ],
        ],
    ],
    [
        'text' => 'Students',
        'icon' => 'fas fa-user-graduate',
        'can'   => ['super_admin'],
        'submenu' => [
            [
                'text'  => 'Add Student',
                'route' => 'students.create',
                'icon'  => 'fas fa-plus-circle',
              
            ],
            [
                'text'  => 'Ajax Student',
                'route' => 'student.index',
                'icon'  => 'fas fa-list',
             
            ],
            [
                'text'  => 'Student List',
                'route' => 'students.index',
                'icon'  => 'fas fa-list',
             
            ],
            [
                'text'  => 'ID Cards',
                'route' => 'students.id-cards',
                'icon'  => 'fas fa-id-card',
             
            ],
        ],
    ],

    [
        'text' => 'Students',
        'icon' => 'fas fa-user-graduate',
        'can'   => ['admin'],
        'submenu' => [
            [
                'text'  => 'Add Student',
                'route' => 'admin.students.add',
                'icon'  => 'fas fa-plus-circle',
             
            ],
        
            [
                'text'  => 'Student List',
                'route' => 'admin.students.index',
                'icon'  => 'fas fa-list',
                'can'   => ['admin'],
            ],
            [
                'text'  => 'ID Cards',
                'route' => 'admin.students.id-cards',
                'icon'  => 'fas fa-id-card',
                'can'   => ['admin'],
            ],
        ],
    ],
    [
        'text' => 'Fees',
        'icon' => 'fas fa-money-check-alt',
        'can'   => ['super_admin'],
        'submenu' => [
            [
                'text'  => 'Fees',
                'route' => 'fees.index',
                'icon'  => 'fas fa-list',
            ],
            [
                'text'  => 'Receipts',
                'route' => 'receipts.index',
                'icon'  => 'fas fa-list',
            ],
            [
                'text'  => 'Fees received',
                'route' => 'fees.received',
                'icon'  => 'fas fa-list',
            ],
            [
                'text'  => 'Fees Pending',
                'route' => 'fees.pending',
                'icon'  => 'fas fa-list',
            ],
        ],
    ],
    [
        'text' => 'Fees',
        'icon' => 'fas fa-money-check-alt',
        'can'   => ['admin'],
        'submenu' => [
            [
                'text'  => 'Fees',
                'route' => 'admin.fees.index',
                'icon'  => 'fas fa-list',
            ],
           
            [
                'text'  => 'Fees received',
                'route' => 'admin.fees.received',
                'icon'  => 'fas fa-list',
            ],
            [
                'text'  => 'Fees Pending',
                'route' => 'admin.fees.pending',
                'icon'  => 'fas fa-list',
            ],
        ],
    ],

    
    [
        'text' => 'Certificates',
        'icon' => 'fas fa-certificate',
        'can'   => ['super_admin'],
        'submenu' => [
            [
                'text'  => 'Certificates',
                'route' => 'certificates.index',
                'icon'  => 'fas fa-list',
            ],
            [
                'text'  => 'Select Certificates',
                'route' => 'certificates.select',
                'icon'  => 'fas fa-list',
            ],
        ],
    ],
    [
        'text' => 'Certificates',
        'icon' => 'fas fa-certificate',
        'can'   => ['admin'],
        'submenu' => [
            [
                'text'  => 'Certificates',
                'route' => 'admin.certificates.index',
                'icon'  => 'fas fa-list',
            ],
            [
                'text'  => 'Select Certificates',
                'route' => 'admin.certificates.select',
                'icon'  => 'fas fa-list',
            ],
        ],
    ],
    [
        'text' => 'Expenses',
        'icon' => 'fas fa-calculator',
        'can'   => ['super_admin','admin'],
        'submenu' => [
            [
                'text'  => 'Expenses',
                'route' => 'expenses.index',
                'icon'  => 'fas fa-list',
            ],
            [
                'text'  => 'Add Expenses',
                'route' => 'expenses.create',
                'icon'  => 'fas fa-plus-circle',
            ],
        ],
    ],
    [
        'text' => 'Expenses',
        'icon' => 'fas fa-calculator',
        'can'   => ['super_admin','admin'],
        'submenu' => [
            [
                'text'  => 'Expenses',
                'route' => 'expenses.index',
                'icon'  => 'fas fa-list',
            ],
            [
                'text'  => 'Add Expenses',
                'route' => 'expenses.create',
                'icon'  => 'fas fa-plus-circle',
            ],
        ],
    ],
    [
        'text' => 'Users',
        'icon' => 'fas fa-user-cog',
        'can'  => ['super_admin'],
        'submenu' => [
            [
                'text'  => 'User List',
                'route' => 'users.index',
                'icon'  => 'fas fa-list',
            ],
            [
                'text'  => 'Create User',
                'route' => 'users.create',
                'icon'  => 'fas fa-plus-circle',
            ],
        ],
    ],
    [
        'text' => 'Logout',
        'route' => 'logout',
        'icon'  => 'fas fa-sign-out-alt',
    ],
],


    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
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
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
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
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
