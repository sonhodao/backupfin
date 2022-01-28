<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    {!! meta()->toHtml() !!}


    <link href="{{ asset('theme/assets/css/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/k2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/animate.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/sppagebuilder.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/sppagecontainer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/sj-basic-news.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/styles.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/css3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/style-extra.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/css3-extra.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/animate-extra.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/sj-listing-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/fonts/font.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/legacy.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/template.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/presets/preset1.css') }}" rel="stylesheet" type="text/css" class="preset" />
    <link href="{{ asset('theme/assets/css/pagebuilder.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/frontend-edit.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/styles-system.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/module_default.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/chosen.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/finder.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/template-languages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/default_mod_datetime.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/shortcodes.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/sj-instagram-gallery.css') }}" rel="stylesheet" type="text/css" type="text/css"/>
    <link href="{{ asset('theme/plugins/select2/css/select2.min.css') }}"  rel="stylesheet" >
    <link href="{{ asset('theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/assets/css/magnific-popup/magnific-popup.min.css') }}">
    <link href="{{ asset('theme/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

    @stack('styles')

</head>

<body class="site com-sppagebuilder view-page no-layout no-task itemid-168 en-gb ltr  sticky-header layout-fluid off-canvas-menu-init">

    <div class="body-wrapper">
        <div class="body-innerwrapper">    
            @yield('content')
        </div> <!-- /.body-innerwrapper -->
    </div> <!-- /.body-innerwrapper -->

    <script type="text/javascript">
    window.print();
    </script>
   
</body>

</html>
