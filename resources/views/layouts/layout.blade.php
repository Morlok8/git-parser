<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <link rel="stylesheet" type="text/css" href="{{url('/assets/css/bootstrap.min.css')}}"/> 
        <!--Пользовательские стили для страницы-->
        <link href="/build/assets/css/main.css" rel="stylesheet">
        <!--Scripts-->
        <script src="{{url('/assets/js/components/bootstrap.js')}}"></script>
    </head>
    <body>
    <!--Navbar-->
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand pl-3" href="/">Поиск в Github</a>
    <!-- Navbar content -->
    </nav>
    <!--Navbar end-->  
    
    <!--Main content-->
        @yield('content')
    <!--Main content end-->

    <!--Footer-->
        <footer class="bg-dark text-light text-center text-md-left fixed-bottom">
            <div class="container">
                <p class="text-center text-secondary border-top border-secondary py-4">
                    Copyright © 2024
                </p>
            </div>
        </footer>
    <!--Footer end-->
    </body>
    
</html>