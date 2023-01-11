<x-base-layout :title="'E-Mail-Verifikation'">
	<nav>
		<x-forms.back location="/"/>
		<h1>E-Mail-Verifikation</h1>
        <x-forms.logout/>
	</nav>
    <main class="center-content">
        <div id="hub">
            <div id="logo"></div>
        </div>
        <!-- Ist eigentlich unnötig, aber sicher ist sicher -->
        <x-input-error :messages="$errors->all()"/>
        <p>Danke fürs registrieren. Bitte bestätigen Sie den Link in der E-Mail, die wir Ihnen geschickt haben.</p>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
			<input type="submit" value="Link erneut senden"/>
        </form>
    </main>
    <div id="bg">
        <div id="popup" class="round-box">
            <span>Möchten Sie sich wirklich abmelden?</span>
            <div class="horizontal_bar">
                <div onclick="cancelLogout()">Abbrechen</div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button id="confirm" type="submit">Abmelden</button>
                </form>
            </div>
        </div>
    </div>
</x-base-layout>
