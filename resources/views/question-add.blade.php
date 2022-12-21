<x-base-layout :title="'Frage hinzufügen'">
    <nav>
        <x-forms.back/>
        <h1>Frage hinzufügen</h1>
		<x-forms.logout/>
    </nav>
    <main class="center-content">
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
			<textarea name="question" rows="3" placeholder="Frage eingeben" required></textarea>
			<input type="text" id="answer_a" name="antwort_a" placeholder="A: Antwort eingeben" required/>
			<input type="text" id="answer_b" name="antwort_b" placeholder="B: Antwort eingeben" required/>
			<input type="text" id="answer_c" name="antwort_c" placeholder="C: Antwort eingeben" required/>
			<input type="text" id="answer_d" name="antwort_d" placeholder="D: Antwort eingeben" required/>

			<select name="right_answer" id="right_answer" required>
				<option value="a">Antwort A</option>
				<option value="b">Antwort B</option>
				<option value="c">Antwort C</option>
				<option value="d">Antwort D</option>
			</select>

			<select name="difficulty" id="difficulty" required>
				@for($i = 1; $i <= 15; $i++)
					<option value="{{ $i }}">Stufe {{ $i }}</option>
				@endfor
			</select>

			<select name="category_id" id="category_id" required>
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