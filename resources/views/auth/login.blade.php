<x-base-layout :title="'Login'">
    @section('navigation')
        <nav>
            <x-forms.back/>
            <h1>Login</h1>
        </nav>
    @endsection
    <div id="hub">
        <div id="logo"></div>
    </div>

        <form method="POST" action="{{ route('login') }}" >
            @csrf
            <!-- Fehlermeldungen -->
            <x-input-error :messages="$errors->all()"/>

            <!-- Benutzername -->
            <div>
                <label for="name"></label>
                <input type="text" name="name" id="name" placeholder="Ihr Benutzername" />
            </div>

            <!-- Passwort -->
            <div>
                <label for="password"></label>
                <input type="password" name="password" id="password" placeholder="Ihr Passwort" />
            </div>

            <!-- Einloggen -->
            <div>
                <input type="submit" id="login" value="{{ __('Einloggen') }}"/>
            </div>

        </form>

        <!-- Passwort vergessen -->
        <div>
            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}">{{ __('Passwort vergessen?') }}</a>
            @endif
        </div>

        <!-- Registrieren -->
        <div>
            @if(Route::has('register'))
                <label>{{ __('Noch nicht registriert?') }}</label><br>
                <a href="{{ route('register') }}">{{ __('Registrieren') }}</a><br>
            @endif
        </div>

</x-base-layout>
