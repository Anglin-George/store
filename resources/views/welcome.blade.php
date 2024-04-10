<!DOCTYPE html>
<html   
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
            />

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <meta name="description" content="" />
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
        />
        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="{{ asset('admin/vendor/fonts/boxicons.css') }}" />
        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('admin/vendor/css/core.css') }}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('admin/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('admin/css/demo.css') }}" />
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Helpers -->
        <script src="{{ asset('admin/vendor/js/helpers.js') }}"></script>
        <script src="{{ asset('admin/js/config.js') }}"></script>

    </head>
    <body>
        
        <div id="app"></div>

        <script src="{{ asset('admin/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('admin/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('admin/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    
        <script src="{{ asset('admin/vendor/js/menu.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  

        <script src="{{ asset('admin/js/main.js') }}"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
