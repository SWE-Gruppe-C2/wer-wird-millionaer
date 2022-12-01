<html lang="de">
    <head>
        <meta charset="UTF-8"/>
        <title>Login</title>
    </head>
    <body>
        <main>
            <div>
                <form method="POST" action="{{ route('login') }}" >
                    @csrf
                    <!-- Fehlermeldungen -->
                    @if(false)
                        <div>
                            <label>{{ __('Fehlermeldung') }}</label>
                        </div>
                    @endif

                    <!-- Benutzername -->
                    <div>
                        <label for="name"></label>
                        <input type="text" name="name" id="name" placeholder="Ihr Benutzername" required />
                    </div>

                    <!-- Passwort -->
                    <div>
                        <label for="password"></label>
                        <input type="password" name="password" id="password" placeholder="Ihr Passwort" required />
                    </div>

                    <!-- Einloggen -->
                    <div>
                        <input type="submit" id="login" value="{{ __('Einloggen') }}"/>
                    </div>

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
                </form>
            </div>
        </main>
    </body>
</html>
