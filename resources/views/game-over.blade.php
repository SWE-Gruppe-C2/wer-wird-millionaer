<x-base-layout :title="'Game Over'">
    <main class="spread-content">
        <nav>
            <x-forms.logout/>
            <div onclick="mute()"><x-forms.mute/></div>
        </nav>
        <div class="horizontal_bar">
        </div>
        <div id="hub">
            <div id="logo"></div>
        </div>
        <p>
            Gewinnsumme: € {{ number_format($game->stage?->price, 0, ',', '.') ?? 0 }}
        </p>
        <div class="button_wrapper">
            <a href="{{ route('game') }}" class="button">
                <span>Erneut Spielen</span>
            </a>
            <a href="{{-- route('highscores') --}}" class="button">
                <span>Bestenliste</span>
            </a>
            <a href="{{ route('main.menu') }}" class="button">
                <span>Hauptmenü</span>
            </a>
        </div>
    </main>
	<div id="bg">
		<div id="popup" class="round-box">
			<span>Möchten Sie sich wirklich abmelden?</span>
			<div class="horizontal_bar">
				<div onclick="cancelLogout()">Abbrechen</div>
				<form action="{{ route('logout') }}" method="POST">
					@csrf
					<button id="confirm" type="submit">Abmelden</button>
				</form>
			</div>
		</div>
	</div>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            initMusic(0);
            closingMusic();
        });
    </script>
</x-base-layout>
