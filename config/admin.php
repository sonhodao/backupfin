<?php

return [
   /*
    |--------------------------------------------------------------------------
    | User operation log setting
    |--------------------------------------------------------------------------
    |
    | By setting this option to open or close operation log in laravel-admin.
    |
    */
   'operation_log' => [

      'enable' => true,

      /*
         * Only logging allowed methods in the list
         */
      'allowed_methods' => ['POST', 'PUT', 'DELETE', 'CONNECT', 'OPTIONS', 'TRACE', 'PATCH'],

      /*
         * Routes that will not log to database.
         *
         * All method to path like: admin/auth/logs
         * or specific method to path like: get:admin/auth/logs.
         */
      'except' => [
         'admin/settings*',
      ],
   ],

   /*
    |--------------------------------------------------------------------------
    | Indicates whether to check route permission.
    |--------------------------------------------------------------------------
    */
   'check_route_permission' => true,

   /*
    |--------------------------------------------------------------------------
    | Indicates whether to check menu roles.
    |--------------------------------------------------------------------------
    */
   'check_menu_roles'       => true,

   /*
    |--------------------------------------------------------------------------
    | Define copy right for dev.
    |--------------------------------------------------------------------------
    */
   'copy_right' => ['url' => 'https://finvn.vn', 'name' => 'Copyright Fin Việt Nam | Finvn.vn'],


   /*
    |--------------------------------------------------------------------------
    | Format Date
    |--------------------------------------------------------------------------
    */

   'format_date' => 'd/m/Y',
   'format_date_time' => 'd/m/Y H:i:s',


   /**
     * Define Editor
     */
   'editor' => 1,

   'og_image_url' => env('OG_IMAGE_URL', 'theme/assets/images/logo_main.png'),
   'image_not_found' => env('IMAGE_NOT_FOUND', 'preview-icon-345x345.png'),

   /**
     * Nếu true thì chạy pjax
     */
   'pjax_show' => env('PJAX_SHOW', false),


   'navigations_group' => [
      'company' => 'Company',
      'customer' => 'Customer',
   ],

   'navigation_display' => [
      'footer' => 'Footer',
   ],


   'textlink_type' => [
      1=>'Thương hiệu',
      2=>'Loại sản phẩm',
   ],

   'seo_model' => [
     'App\\Models\\Category',
     'App\\Models\\Post',
     'App\\Models\\Page',
   ],

   'target' => [
      '_blank',
      '_self',
      '_parent',
      '_top',
      'framename',
    ],

    'robots_meta' => [
      'index' => 'Index',
      'follow' => 'Follow',
      'noindex' => 'No Index',
      'nofollow' => 'No Follow',
      'noimageindex' => 'No Image Index',
      'noarchive' => 'No Archive',
      'nosnippet' => 'No Snippet', 
   ],
   'avgRatings' => env('AVG_RATE', 0),
   'rateCount' => env('RATE_COUNT', 0),


   'captcha-key' => env('CAPTCHA_KEY', '6LdTfx8cAAAAAHSchN4yiz1vpmVMGleeibg72SfS'),
   'captcha-secret' => env('CAPTCHA_SECRET', '6LdTfx8cAAAAAOJCFtDD4fG792Diufu6NgGwxpgE'),

];
