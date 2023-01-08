<x-base-layout :title="'Login'">
    <nav>
        <h1>Login</h1>
    </nav>
    <main>
        <div id="hub">
            <div id="logo"></div>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Fehlermeldungen -->
            <x-input-error :messages="$errors->all()"/>

            <!-- Benutzername -->
			<input type="text" name="name" id="name" placeholder="Ihr Benutzername" required/>

            <!-- Passwort -->
			<input type="password" name="password" id="password" placeholder="Ihr Passwort" required/>

            <!-- Einloggen -->
			<input type="submit" id="login" value="{{ __('Einloggen') }}"/>
        </form>
        <!-- Passwort vergessen -->
		@if(Route::has('password.request'))
			<a href="{{ route('password.request') }}">{{ __('Passwort vergessen?') }}</a>
		@endif
        <!-- Registrieren -->
		@if(Route::has('register'))
            <div id="registerLogin">
			    <p>Noch nicht registriert?</p>
			    <a href="{{ route('register') }}">{{ __('Registrieren') }}</a>
            </div>
		@endif
    </main>
</x-base-layout>
