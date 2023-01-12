<x-base-layout :title="'Registrieren'">
    <nav>
        <x-forms.back location="/login"/>
        <h1>Registrieren</h1>
    </nav>
    <main>
        <div id="hub">
            <div id="logo"></div>
        </div>

        @if($errors->first()=="Benutzernamefeld muss ausgefüllt werden."||$errors->first()=="Passwortfeld muss ausgefüllt werden."||$errors->first()=="E-mailfeld muss ausgefüllt werden.")
            <p>Bitte füllen Sie alle Eingabefelder aus</p>
        @elseif($errors->first()=="Benutzername bereits vergeben.")
            <p>Benutzername schon vorhanden</p>
        @elseif(($errors->first()=="E-mail bereits vorhanden."))
            <p>E-Mail schon verwendet</p>

        @else
            {{$errors->first()}}
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Username -->
			<input type="text" id="name" name="name" placeholder="Benutzername" value="{{ old('name') }}"  autofocus>

            <!-- Email -->
			<input type="email" id="email" name="email" placeholder="E-Mail" value="{{ old('email') }}" >

            <!-- Passwort -->
			<input type="password" id="password" name="password" placeholder="Passwort" >

            <!-- Passwort bestätigen-->
			<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Passwort erneut eingeben" >

            <input type="submit" value="Registrieren" name="registrieren">
        </form>
    </main>
</x-base-layout>
