<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/assets/img/wwm_logo.png') }}">
    <title>Passwort vergessen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<main>
    <div class="horizontal_bar">
        <a href="/test/login">
            <img src="{{ asset('assets/img/back.png') }}" id="back" alt="Zurück">
        </a>
        <h1>Passwort vergessen</h1>
    </div>
    <div id="hub"></div>
    <form>
        <input type="email" id="email" name="email" placeholder="E-Mail">
        <input type="submit" value="E-Mail bestätigen">
    </form>
</main>
</body>
</html>
