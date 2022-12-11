<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/wwm_logo.png">
    <title>Registrieren</title>
</head>
<body>
<main>
    <div class="horizontal_bar">
        <a href="{{ route('login') }}">
            <img src="img/back.png" id="back" alt="Zurück/Login">
        </a>
        <h1>Registrieren</h1>
    </div>
    <div id="hub"></div>
    <!-- TODO: Fehlermeldungen werden pot. über eigenen Component "gespeichert" -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Username -->
        <div>
            <input type="text" id="name" name="name" placeholder="Benutzername" required autofocus>
        </div>

        <!-- Email -->
        <div>
            <input type="email" id="email" name="email" placeholder="E-Mail" required>
        </div>

        <!-- Passwort -->
        <div>
            <input type="password" id="password" name="password" placeholder="Neues Passwort eingeben" required>
        </div>

        <!-- Passwort bestätigen-->
        <div>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Passwort wiederholen" required>
        </div>

        <input type="submit" value="Registrieren">
    </form>
</main>
</body>
</html>


 /* switch to component layout

<x-base-layout :tile="'Register'">
    @section(navigation)
    <nav>
        <h1>Registrieren</h1>
    </nav>
    @endsection
    <div id="hub">
        <div id="logo"></div>
    </div>

        <form method="POST" action="{{ route('register') }}">

            @csrf
            <!-- Username -->
            <div>
                <input type="text" id="name" name="name" placeholder="Benutzername" required autofocus>
            </div>

            <!-- Email -->
            <div>
                <input type="email" id="email" name="email" placeholder="E-Mail" required>
            </div>

            <!-- Passwort -->
            <div>
                <input type="password" id="password" name="password" placeholder="Neues Passwort eingeben" required>
            </div>

            <!-- Passwort bestätigen-->
            <div>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Passwort wiederholen" required>
            </div>

            <input type="submit" value="Registrieren" name="registrieren">

        </form>


</x-base-layout>
