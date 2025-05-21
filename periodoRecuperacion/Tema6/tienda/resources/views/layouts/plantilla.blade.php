<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950">
    @include('layouts.partials.nav')
    <div class="container ml-8">
        @yield('contenido')
    </div>
    @include('layouts.partials.footer')
</body>
</html>
