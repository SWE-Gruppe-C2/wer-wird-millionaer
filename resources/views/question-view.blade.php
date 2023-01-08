<x-base-layout :title="'Frage anzeigen'">
	<nav>
		<x-forms.back/>
		<h1>Frage anzeigen</h1>
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
		<form>
			@csrf
			@method('patch')
			<label for="question">Frage</label>
			<textarea id="question" name="question" rows="3" disabled>{{ $question->text }}</textarea>

			@foreach(range('a', 'd') as $index => $alph)
				<label for="answer_{{ $alph }}">Antwort {{ strtoupper($alph) }}</label>
				<input type="text" id="answer_{{ $alph }}" name="answer_{{ $alph }}" value="{{ $question->answers[$index] }}" disabled/>
			@endforeach

			<label for="correct_answer">Korrekte Antwort</label>
			<select name="correct_answer" id="correct_answer" disabled>
				@foreach(range('a', 'd') as $index => $alph)
					@if($question->correct_answer === $index + 1)
						<option value="{{ $alph }}" selected>Antwort {{ strtoupper($alph) }}</option>
					@else
						<option value="{{ $alph }}">Antwort {{ strtoupper($alph) }}</option>
					@endif
				@endforeach
			</select>

			<label for="difficulty">Schwierigkeitsgrad</label>
			<select name="difficulty" id="difficulty" disabled>
				@for($i = 1; $i < 16; $i++)
					@if($question->difficulty == $i)
						<option value="{{ $i }}" selected>Stufe {{ $i }}</option>
					@else
						<option value="{{ $i }}">Stufe {{ $i }}</option>
					@endif
				@endfor
			</select>

			<label for="category">Kategorie</label>
			<select name="category" id="category" disabled>
				@foreach($categories as $category)

					{{-- SELECTS DEFAULT FOR QUESTION CATEGORY WHEN DISPLAYING --}}
					@if($question->category_id == $category->id)
						<option value="{{$category->id}}" selected>{{$category->name}}</option>
					@else
						<option value="{{$category->id}}" >{{$category->name}}</option>
					@endif

				@endforeach
			</select>
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