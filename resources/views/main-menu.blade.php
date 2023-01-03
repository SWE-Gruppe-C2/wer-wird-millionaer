<x-base-layout :title="'Hauptmenü'">
    <nav>
        <x-forms.mute/>
        <x-forms.logout/>
    </nav>
	<main>
	   <div id="hub">
		   <div id="logo"/>
	   </div>
		<div class="button_wrapper">
			<a href="{{ route('game') }}" class="button">
				<span>Spiel starten</span>
			</a>
			<a href="{{ route('leaderboard') }}" class="button">
				<span>Bestenliste</span>
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
</x-base-layout>
