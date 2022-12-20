<x-base-layout :title="'Registrieren'">
    <nav>
        <x-forms.back/>
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
			<input type="text" id="name" name="name" placeholder="Benutzername" value="{{ old('name') }}" autofocus>

            <!-- Email -->
			<input type="text" id="email" name="email" placeholder="E-Mail" value="{{ old('email') }}">

            <!-- Passwort -->
			<input type="password" id="password" name="password" placeholder="Passwort">

            <!-- Passwort bestätigen-->
			<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Passwort erneut eingeben">

            <input type="submit" value="Registrieren" name="registrieren">
        </form>
    </main>
</x-base-layout>