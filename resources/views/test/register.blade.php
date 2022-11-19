<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/wwm_logo.png') }}">
    <title>Registrieren</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<main>
    <div class="horizontal_bar">
        <a href="/test/login">
            <img src="{{ asset('assets/img/back.png') }}" id="back" alt="Zurück">
        </a>
        <h1>Registrieren</h1>
    </div>
    <div id="hub"></div>
    <form>
        <input type="text" id="username" name="username" placeholder="Benutzername">
        <input type="email" id="email" name="email" placeholder="E-Mail">
        <input type="password" id="password" name="password" placeholder="Neues Passwort eingeben">
        <input type="password" id="repeat_password" name="repeat_password" placeholder="Passwort wiederholen">
        <input type="submit" value="Registrieren">
    </form>
</main>
</body>
</html>
