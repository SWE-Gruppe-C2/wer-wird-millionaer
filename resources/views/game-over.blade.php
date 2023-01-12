<x-base-layout :title="'Game Over'">
	<nav>
		<x-forms.logout/>
		<x-forms.mute/>
	</nav>
    <main>
        <div class="horizontal_bar">
        </div>
        <div id="hub">
            <div id="logo"></div>
        </div>
        <p>
			@if($game->stage?->price == 1000000)
				Herzlichen Glückwunsch - Sie sind virtueller Millionär!
			@elseif($game->stage?->price >= 16000)
				Schade, bis zur Million war es nicht mehr weit.
			@else
				Beim nächsten Mal klappt es besser!
			@endif
			<br>
            Gewinnsumme: € {{ number_format($game->stage?->price, 0, ',', '.') ?? 0 }}
        </p>
        <div class="button_wrapper">
            <a href="{{ route('game') }}" class="button">
                <span>Erneut Spielen</span>
            </a>
            <a href="{{ route('leaderboard') }}" class="button">
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
            muteCheck();
        });
    </script>
</x-base-layout>
