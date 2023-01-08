<x-base-layout :title="'Kategorie bearbeitet'">
    <nav>
        <x-forms.back/>
		<h1>Frage bearbeitet</h1>
        <x-forms.logout/>
    </nav>
    <main class="center-content">
        <p>Kategorie wurde bearbeitet</p>
        <a href="/category" class="button">Zurück zur Übersicht</a>
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