<x-base-layout :title="'Frage hinzufügen'">
    <nav>
        <x-forms.back/>
        <h1>Frage hinzufügen</h1>
		<x-forms.logout/>
    </nav>
    <main class="scrollable-content">
        @if ($errors->any())
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
        @endif

        @if($questionAdded)
            <p>Frage erfolgreich hinzugefügt</p>
        @endif

		<form action="{{ route('question.store') }}" method="POST">
			@csrf
			<label for="question">Frage</label>
			<textarea name="question" rows="3" placeholder="Frage eingeben" required></textarea>
			<label for="answer_a">Antwort A</label>
			<input type="text" id="answer_a" name="answer_a" placeholder="A: Antwort eingeben" required/>
			<label for="answer_b">Antwort B</label>
			<input type="text" id="answer_b" name="answer_b" placeholder="B: Antwort eingeben" required/>
			<label for="answer_c">Antwort C</label>
			<input type="text" id="answer_c" name="answer_c" placeholder="C: Antwort eingeben" required/>
			<label for="answer_d">Antwort D</label>
			<input type="text" id="answer_d" name="answer_d" placeholder="D: Antwort eingeben" required/>
			<label for="correct_answer">Korrekte Antwort</label>
			<select name="correct_answer" id="correct_answer" required>
				<option value="a">Antwort A</option>
				<option value="b">Antwort B</option>
				<option value="c">Antwort C</option>
				<option value="d">Antwort D</option>
			</select>
			<label for="difficulty">Schwierigkeitsgrad</label>
			<select name="difficulty" id="difficulty" required>
				@for($i = 1; $i <= 15; $i++)
					<option value="{{ $i }}">Stufe {{ $i }}</option>
				@endfor
			</select>
			<label for="category">Kategorie</label>
			<select name="category" id="category" required>
				@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
				@endforeach
			</select>
			<input type="submit" value="Frage hinzufügen">
		</form>
    </main>
	<div id="bg">
		<div id="popup" class="round-box">
			<span>Möchten Sie sich wirklich abmelden?</span>
			<div class="horizontal_bar">
				<div onclick="cancelLogout()">Abbrechen</div>
				<form action="{{ route('logout') }}" method="POST">
					<button id="confirm" type="submit">Abmelden</button>
				</form>
			</div>
		</div>
	</div>
</x-base-layout>
