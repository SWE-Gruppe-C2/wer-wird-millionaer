<x-base-layout :title="'Passwort vergessen'">

    <nav>
        <x-forms.back location="/login"/>
        <h1>Passwort vergessen</h1>
    </nav>

    <main>
		<div id="hub">
			<div id="logo"></div>
		</div>

        @if($errors->first()=="E-Mailfeld muss ausgefüllt werden.")
            <p>Bitte füllen Sie das E-Mailfeld aus</p>
        @else
            {{$errors->first()}}
        @endif

        <form method="POST" action="{{ route('password.email') }}">
			@csrf
			<!-- Email -->
			<input type="email" id="email" name="email" placeholder="E-Mail" value="{{ old('email') }}">

			<input type="submit" value="E-Mail bestätigen" name="bestätigen">
		</form>
	</main>
</x-base-layout>
