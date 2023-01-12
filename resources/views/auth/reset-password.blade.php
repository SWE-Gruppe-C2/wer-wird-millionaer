<x-base-layout :title="'Passwort ändern'">
	<nav>
		<x-forms.back location="/login"/>
		<h1>Passwort ändern</h1>
	</nav>
    <main>
		<div id="hub">
			<div id="logo"></div>
		</div>

        <x-input-error :messages="$errors->all()"/>
        @if($errors->first()=="Passwortfeld muss ausgefüllt werden.")
            <p>Bitte füllen Sie beide Eingabefelder aus.</p>
        @else
            {{$errors->first()}}
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <input type="email" id="email" name="email" placeholder="Email des Accounts" value="{{ old('email') }}" >

            <!-- Neues Passwort -->
            <input type="password" id="password" name="password" placeholder="Neues Passwort" >

            <!-- Passwort bestätigen -->
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Passwort wiederholen">

            <input type="submit" value="Passwort ändern" name="bestätigen">
        </form>
    </main>
</x-base-layout>

