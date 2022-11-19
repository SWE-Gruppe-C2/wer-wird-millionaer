<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/wwm_logo.png') }}">
    <title>Hauptmenü</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<main>
    <div class="horizontal_bar">
        <img src="{{ asset('assets/img/mute.png') }}" id="toggle_sound" alt="Musik einschalten">
        <a href="{{ route('/test/login') }}">
            <img src="{{ asset('assets/img/logout.png') }}" id="logout" alt="Abmelden">
        </a>
    </div>
    <div id="hub"></div>
    <div class="button_wrapper">
        <a href="{{ route('/test') }}" class="button">
            <span>Spiel starten</span>
        </a>
        <div class="button">
            <span>Bestenliste</span>
        </div>
    </div>
</main>
</body>
</html>
