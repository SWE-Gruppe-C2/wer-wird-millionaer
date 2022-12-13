
<x-base-layout :title="'Email Verifikation'">
    @section('navigation')
        <nav>
            <h1>Email Verifikation</h1>
        </nav>
    @endsection
    <div id="hub">
        <div id="logo"></div>
    </div>

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

</x-base-layout>

