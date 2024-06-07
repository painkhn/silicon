<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>

<body>
    @include('components.header')
    @include('components.navigation')
    <main class="max-w-6xl w-full my-0 mx-auto mb-24 h-main">
        @yield('content')
    </main>
    @include('components.footer')
</body>

</html>
