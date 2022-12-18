<x-base-layout :title="'Registrierung'">
    @section('navigation')
    <nav>
        <x-forms.back/>
        <h1>Registrieren</h1>
    </nav>
    @endsection
    <div id="hub">
        <div id="logo"></div>
    </div>

        <x-input-error :messages="$errors->all()"/>
        <form class="center-content" method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Username -->
            <div>
                <input type="text" id="name" name="name" placeholder="Benutzername" value="{{ old('name') }}" autofocus>
            </div>

            <!-- Email -->
            <div>
                <input type="text" id="email" name="email" placeholder="E-Mail" value="{{ old('email') }}">
            </div>

            <!-- Passwort -->
            <div>
                <input type="password" id="password" name="password" placeholder="Passwort">
            </div>

            <!-- Passwort bestätigen-->
            <div>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Passwort erneut eingeben">
            </div>

            <input type="submit" value="Registrieren" name="registrieren">

        </form>

</x-base-layout>
