<x-base-layout :title="'Frage bearbeiten'">
    <nav>
        <x-forms.back/>
        <h1>Frage bearbeiten</h1>
		<x-forms.logout/>
    </nav>
    <main>
        <p>Frage: {{ $oldQuestion->text }}</p>
        @if ($errors->any())
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
        @endif
        <form action="{{ route('question.update', $oldQuestion) }}" method="POST">
            @csrf
            @method('patch')

			<textarea name="question" rows="3" placeholder="Frage eingeben" required>{{ $oldQuestion->text }}</textarea>

			@foreach(range('a', 'd') as $index => $alph)
            	<input type="text" id="answer_{{ $alph }}" name="answer_{{ $alph }}" placeholder="{{ strtoupper($alph) }}: Antwort eingeben" value="{{ $oldQuestion->answers[$index] }}" required/>
			@endforeach

            <select name="correct_answer" id="correct_answer" required>
				@foreach(range('a', 'd') as $index => $alph)
					@if($oldQuestion->correct_answer === $index + 1)
						<option value="{{ $alph }}" selected>Antwort {{ strtoupper($alph) }}</option>
					@else
						<option value="{{ $alph }}">Antwort {{ strtoupper($alph) }}</option>
					@endif
				@endforeach
            </select>
            <select name="difficulty" id="difficulty" required>
                @for($i = 1; $i < 16; $i++)
					@if($oldQuestion->difficulty == $i)
						<option value="{{ $i }}" selected>Stufe {{ $i }}</option>
					@else
						<option value="{{ $i }}">Stufe {{ $i }}</option>
					@endif
                @endfor
            </select>
            <select name="kategorie_id" id="kategorie_id" required>
                @foreach($categories as $category)

                    {{-- SELECTS DEFAULT FOR QUESTION CATEGORY WHEN DISPLAYING --}}
                    @if($oldQuestion->category_id == $category->id)
                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
					@else
						<option value="{{$category->id}}" >{{$category->name}}</option>
                    @endif

                @endforeach
            </select>
            <input type="submit" value="Frage speichern ">
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