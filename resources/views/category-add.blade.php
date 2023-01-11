<x-base-layout :title="'Kategorie hinzufügen'">
	<nav>
		<x-forms.back location="/system-control"/>
		<h1>Kategorie hinzufügen</h1>
		<x-forms.logout/>
	</nav>
	<main class="center-content">
		@if ($errors->any())
			<div class="alert alert-danger">

					@foreach ($errors->all() as $error)
						<p>{{ $error }}</p>
					@endforeach

			</div>
		@endif
		<form action="{{ route('category.store') }}" method="POST">
			@csrf
			<label for="category">Kategorie</label>
			<input type="text" id="category" name="category" placeholder="Kategorie">
			<input type="submit" value="Kategorie hinzufügen">
		</form>
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
