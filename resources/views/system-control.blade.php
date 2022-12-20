<x-base-layout :title="'Systemverwaltung'">
    <nav>
		<h1>Systemverwaltung</h1>
        <x-forms.logout/>
    </nav>
    <main>
		<div id="hub">
			<div id="logo"></div>
		</div>
        <div class="button_wrapper">
            <a href="{{ route('question.index') }}" class="button">Fragenkatalog</a>
            <a href="{{ route('category.add') }}" class="button">Kategorie hinzufügen</a>
            <a href="{{ route('category.index') }}" class="button">Kategorie bearbeiten</a>
        </div>
    </main>
	<div id="bg">
		<div id="popup" class="round-box">
			<span>Möchten Sie sich wirklich abmelden?</span>
			<div class="horizontal_bar">
				<div onclick="cancelLogout()">Abbrechen</div>
				<form action="{{ route('login') }}" method="POST">
					<button id="confirm" type="submit">Abmelden</button>
				</form>
			</div>
		</div>
	</div>
</x-base-layout>