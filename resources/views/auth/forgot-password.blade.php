<x-base-layout :title="'Passwort vergessen'">
	<nav>
		<x-forms.back/>
		<h1>Passwort vergessen</h1>
	</nav>
	<main>
		<div id="hub">
			<div id="logo"></div>
		</div>
		<x-input-error :messages="$errors->all()"/>
		<form method="POST" action="{{ route('register') }}">
			@csrf
			<!-- Email -->
			<input type="text" id="email" name="email" placeholder="E-Mail" value="{{ old('email') }}">

			<input type="submit" value="E-Mail bestätigen" name="registrieren">
		</form>
	</main>
</x-base-layout>