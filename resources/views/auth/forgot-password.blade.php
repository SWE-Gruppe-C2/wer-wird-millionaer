<x-base-layout :title="'Passwort vergessen'">

    <nav>
        <x-forms.back location="/login"/>
        <h1>Passwort vergessen</h1>
    </nav>

    <main class="center-content">

        <x-input-error :messages="$errors->all()"/>

        <form method="POST" action="{{ route('password.email') }}">
			@csrf
			<!-- Email -->
			<input type="email" id="email" name="email" placeholder="E-Mail" value="{{ old('email') }}" required>

			<input type="submit" value="E-Mail bestätigen" name="bestätigen">
		</form>
	</main>
</x-base-layout>
