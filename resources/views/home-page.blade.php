<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Home Page</title>
</head>
<body>
<main>
    <div id="hub"></div>
    <div class="button_wrapper">
        @auth
            <a href="{{ route('menu') }}" class="button">
                <span>Starten</span>
            </a>
        @else
            <a href="{{ route('login') }}" class="button">
                <span>Starten</span>
            </a>
        @endauth
    </div>
</main>
</body>
