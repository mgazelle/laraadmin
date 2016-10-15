<?php
/**
 * Config genrated using LaraAdmin
 * Help: http://laraadmin.com
 **/

return [
    'sitedesc' => "LaraAdmin is a better and smoother way to manage Projects, Clients, Revenue and all the other aspects of Small & Medium Businesses.",
    'adminRoute' => 'admin',
    'modelsPath' => '__app_directory__',
    /*
    |--------------------------------------------------------------------------
    | Uploads Configuration
    |--------------------------------------------------------------------------
    |
    | private_uploads: Show that uploaded file remains private and can be seen by respective owners only
    | default_uploads_security: public / private
    |
    */
    'uploads' => [
        'private_uploads' => false,
        'default_public' => false,
        'allow_filename_change' => true
    ],
    'skins' => [
        'White Skin' => 'skin-white',
        'Blue Skin' => 'skin-blue',
        'Black Skin' => 'skin-black',
        'Purple Skin' => 'skin-purple',
        'Yellow Sking' => 'skin-yellow',
        'Red Skin' => 'skin-red',
        'Green Skin' => 'skin-green'
    ],
    'layouts' => [
        'Fixed Layout' => 'fixed',
        'Boxed Layout' => 'layout-boxed',
        'Top Navigation Layout' => 'layout-top-nav',
        'Sidebar Collapse Layout' => 'sidebar-collapse',
        'Mini Sidebar Layout' => 'sidebar-mini'
    ],
];