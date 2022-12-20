<x-base-layout :title="'Kategorie hinzufügen'">
	<nav>
		<x-forms.back/>
		<h1>Kategorie hinzufügen</h1>
		<x-forms.logout/>
	</nav>
	<main class="center-content">
		<div id="hub">
			<div id="logo"></div>
		</div>
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form action="{{ route('category.store') }}" method="POST">
			@csrf
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