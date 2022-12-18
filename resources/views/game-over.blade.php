<x-base-layout :title="'Game Over'">
    <main class="spread-content">
        <nav>
            <x-forms.logout/>
            <x-forms.mute/>
        </nav>
        <div class="horizontal_bar">
        </div>
        <div id="hub">
            <div id="logo"></div>
        </div>
        <div>
            Gewinnsumme: <br>
            <!-- TODO: Gewinnsumme ausgeben /  --> €
        </div>
        <div class="button_wrapper">
            <a href="{{ route('game') }}" class="button">
                <span>Erneut Spielen</span>
            </a>
            <a href="{{ route('highscores') }}" class="button">
                <span>Bestenliste</span>
            </a>
            <a href="{{ route('menu') }}" class="button">
                <span>Hauptmenü</span>
            </a>
        </div>
    </main>
</x-base-layout>
