<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>@yield('title')</title>
        
    </head>
    <body>
        <header>
            @include('components.navbar')
        </header>
        <main>
            @yield('content')
        </main>
        <footer></footer>
    </body>
</html>
