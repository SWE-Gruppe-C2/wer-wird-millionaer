<x-base-layout :$title>
    <div class="horizontal_bar">
        <img src="{{ asset('assets/img/mute.png') }}" id="toggle_sound" alt="Musik einschalten">
        <a href="/test/login">
            <img src="{{ asset('assets/img/logout.png') }}" id="logout" alt="Abmelden">
        </a>
    </div>
    <div id="hub"></div>
    <div class="button_wrapper">
        <a href="/test" class="button">
            <span>Spiel starten</span>
        </a>
        <div class="button">
            <span>Bestenliste</span>
        </div>
    </div>
</x-base-layout>
