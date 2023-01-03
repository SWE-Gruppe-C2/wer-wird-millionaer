<x-base-layout :title="'Frage löschen'">
    <nav>
        <x-forms.back/>
        <h1>Frage löschen</h1>
		<x-forms.logout/>
    </nav>
    <main class="center-content">
		<p>{{ $question->text }}</p>
		<p>
			@foreach(range('A', 'D') as $index => $alph)
				<span>{{ $alph . ': ' . $question->answers[$index] }}</span><br>
			@endforeach
		</p>
		<form method="POST" action="{{ route('question.destroy', $question) }}">
			@csrf
			@method('delete')
			<input type="submit" value="Frage löschen">
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