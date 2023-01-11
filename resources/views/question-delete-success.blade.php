<x-base-layout :title="'Frage Löschen'">
    <nav>
        <x-forms.back location="/question"/>
        <h1>Frage Löschen</h1>
		<x-forms.logout/>
    </nav>
    <main class="center-content">
        <p>Frage wurde gelöscht</p>
        <div class="button_wrapper">
            <a href="/question" class="button">Zurück zur Übersicht</a>
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
