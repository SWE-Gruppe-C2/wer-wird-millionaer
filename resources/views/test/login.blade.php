<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/wwm_logo.png') }}">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<main>
    <div class="horizontal_bar">
        <h1>Login</h1>
    </div>
    <div id="hub"></div>
    <form action="#" method="post">
        <input type="text" id="username" name="username" placeholder="Benutzername">
        <input type="password" id="password" name="password" placeholder="Passwort">
        <input type="submit" value="Einloggen">
    </form>
    <a href="{{ route('test.reset-password') }}">Passwort vergessen?</a>
    <p>
        oder<br>
        Noch nicht registriert?
    </p>
    <a href="{{ route('test.register') }}">Registrieren</a>
</main>
</body>
</html>
