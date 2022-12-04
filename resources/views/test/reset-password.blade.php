<x-base-layout :$title>
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
</x-base-layout>
