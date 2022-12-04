<x-base-layout :$title>
    <div class="horizontal_bar">
        <h1>Login</h1>
    </div>

    <div id="hub"></div>

    <form action="" method="post">
        <input type="text" id="username" name="username" placeholder="Benutzername">
        <input type="password" id="password" name="password" placeholder="Passwort">
        <input type="submit" value="Einloggen">
    </form>

    <a href="{{ route('password.reset') }}">Passwort vergessen?</a>

    <p>
        oder<br>
        Noch nicht registriert?
    </p>

    <a href="/test/register">Registrieren</a>
</x-base-layout>
