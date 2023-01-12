<x-base-layout :title="'Frage bearbeiten'">
    <nav>
        <!-- TODO: In der Session speichern, welcher filter vorher gesetzt wurde? -->
        <x-forms.back location="{{ url()->previous() }}"/>
        <h1>Frage bearbeiten</h1>
		<x-forms.logout/>
    </nav>
    <main class="scrollable-content">
        @if (isset($customError))
            <ul>
                <li>{{$customError}}</li>
            </ul>
        @endif
            @if ($errors)

                @if($errors->first() == "Fragefeld muss ausgefüllt werden."||$errors->first() == "answer afeld muss ausgefüllt werden."||$errors->first() == "answer bfeld muss ausgefüllt werden."||$errors->first() == "answer cfeld muss ausgefüllt werden."||$errors->first() == "answer dfeld muss ausgefüllt werden.")
                    <p>Es müssen alle Eingabefelder ausgefüllt werden</p>
                @else
                    {{ $errors->first() }}
                @endif

            @endif
        <form action="{{ route('question.update', $oldQuestion) }}" method="POST">
            @csrf
            @method('patch')
			<label for="question">Frage</label>
			<textarea id="question" name="question" rows="3" placeholder="Frage eingeben" >{{ $oldQuestion->text }}</textarea>

			@foreach(range('a', 'd') as $index => $alph)
				<label for="answer_{{ $alph }}">Antwort {{ strtoupper($alph) }}</label>
            	<input type="text" id="answer_{{ $alph }}" name="answer_{{ $alph }}" placeholder="{{ strtoupper($alph) }}: Antwort eingeben" value="{{ $oldQuestion->answers[$index] }}" />
			@endforeach

			<label for="correct_answer">Korrekte Antwort</label>
            <select name="correct_answer" id="correct_answer" >
				@foreach(range('a', 'd') as $index => $alph)
					@if($oldQuestion->correct_answer === $index + 1)
						<option value="{{ $alph }}" selected>Antwort {{ strtoupper($alph) }}</option>
					@else
						<option value="{{ $alph }}">Antwort {{ strtoupper($alph) }}</option>
					@endif
				@endforeach
            </select>

			<label for="difficulty">Schwierigkeitsgrad</label>
            <select name="difficulty" id="difficulty" >
                @for($i = 1; $i < 16; $i++)
					@if($oldQuestion->difficulty == $i)
						<option value="{{ $i }}" selected>Stufe {{ $i }}</option>
					@else
						<option value="{{ $i }}">Stufe {{ $i }}</option>
					@endif
                @endfor
            </select>

			<label for="category">Kategorie</label>
            <select name="category" id="category" >
                @foreach($categories as $category)

                    {{-- SELECTS DEFAULT FOR QUESTION CATEGORY WHEN DISPLAYING --}}
                    @if($oldQuestion->category_id == $category->id)
                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
					@else
						<option value="{{$category->id}}" >{{$category->name}}</option>
                    @endif

                @endforeach
            </select>
            <input type="submit" value="Frage speichern">
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
