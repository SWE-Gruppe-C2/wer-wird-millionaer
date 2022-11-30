<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="img/wwm_logo.png">
        <title>Registrieren</title>
    </head>
    <body>
        <div>
            {{ __('Danke fürs registrieren, bitte bestätigen sie den Link in der Email, welche wir soeben verschickt haben.') }}
        </div>
            @if(session('status') == 'verfication-link-sent')
                <div>
                    {{ __('Ein neuer Bestätigungslink wurde verschickt') }}
                </div>
            @endif
        <div>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <input type="button" value="{{ __('Link neu senden') }}">
                </div>
            </form>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">{{ __('Logout') }}</button>
        </form>
    </body>
</html>

