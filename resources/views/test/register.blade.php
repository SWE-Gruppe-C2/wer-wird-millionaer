<x-base-layout :$title>
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
</x-base-layout>
