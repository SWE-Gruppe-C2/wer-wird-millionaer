<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Hauptmenü</title>
</head>
<body>
<main id="spread">
    <div class="horizontal_bar">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">
                <img src="{{ asset('assets/img/logout.png') }}" id="logout" alt="Logout">
            </button>
        </form>
        <img src="{{ asset('assets/img/mute.png') }}" id="toggle_sound" alt="Musik einschalten">
    </div>
    <div id="hub"></div>
    <div class="button_wrapper">
        <a href="{{ route('play') }}" class="button">
            <span>Erneut Spielen</span>
        </a>
        <a href="{{ route('highscores') }}" class="button">
            <span>Bestenliste</span>
        </a>
    </div>
</main>
</body>
