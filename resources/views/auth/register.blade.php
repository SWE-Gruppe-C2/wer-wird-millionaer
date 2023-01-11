<x-base-layout :title="'Registrieren'">
    <nav>
        <x-forms.back location="/login"/>
        <h1>Registrieren</h1>
    </nav>
    <main>
        <div id="hub">
            <div id="logo"></div>
        </div>
        <x-input-error :messages="$errors->all()"/>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Username -->
			<input type="text" id="name" name="name" placeholder="Benutzername" value="{{ old('name') }}" required autofocus>

            <!-- Email -->
			<input type="email" id="email" name="email" placeholder="E-Mail" value="{{ old('email') }}" required>

            <!-- Passwort -->
			<input type="password" id="password" name="password" placeholder="Passwort" required>

            <!-- Passwort bestätigen-->
			<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Passwort erneut eingeben" required>

            <input type="submit" value="Registrieren" name="registrieren">
        </form>
    </main>
</x-base-layout>
