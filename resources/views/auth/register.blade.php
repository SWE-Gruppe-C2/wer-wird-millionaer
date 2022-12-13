<x-base-layout :title="'Register'">
    @section('navigation')
    <nav>
        <h1>Registrieren</h1>
    </nav>
    @endsection
    <div id="hub">
        <div id="logo"></div>
    </div>

        <form method="POST" action="{{ route('register') }}">

            @csrf
            <!-- Username -->
            <div>
                <input type="text" id="name" name="name" placeholder="Benutzername" required autofocus>
            </div>

            <!-- Email -->
            <div>
                <input type="email" id="email" name="email" placeholder="E-Mail" required>
            </div>

            <!-- Passwort -->
            <div>
                <input type="password" id="password" name="password" placeholder="Neues Passwort eingeben" required>
            </div>

            <!-- Passwort bestätigen-->
            <div>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Passwort wiederholen" required>
            </div>

            <input type="submit" value="Registrieren" name="registrieren">

        </form>

</x-base-layout>
