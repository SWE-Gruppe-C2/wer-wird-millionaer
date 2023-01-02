<x-base-layout :title="'Passwort vergessen'">

	<main class="center-content">

        <nav>
            <x-forms.back/>
            <h1>Passwort vergessen</h1>
        </nav>

        <div class="horizontal_bar"/>

		<x-input-error :messages="$errors->all()"/>

		<form method="POST" action="{{ route('password.email') }}">
			@csrf
			<!-- Email -->
			<input type="email" id="email" name="email" placeholder="E-Mail" value="{{ old('email') }}" required>

			<input type="submit" value="E-Mail bestätigen" name="bestätigen">
		</form>
	</main>
</x-base-layout>
