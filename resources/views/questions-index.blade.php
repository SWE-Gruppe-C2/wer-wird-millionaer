<x-base-layout :title="'Fragenkatalog'">
    <nav>
        <x-forms.back/>
        <h1>Fragenkatalog</h1>
		<x-forms.logout/>
    </nav>
    <main id="question_list" class="scrollable-content">
        @foreach($questions as $question)
			<div class="round-box">
				<span>{{ $question->text }}</span>
				<div class="horizontal_bar">
					<a href="{{ route('question.index', $question) }}">Anzeigen</a>
					<a href="{{ route('question.edit', $question) }}">Bearbeiten</a>
					<a href="{{ route('question.delete', $question) }}">Löschen</a>
				</div>
			</div>
        @endforeach
    </main>
	<div id="filters">
		<form method="POST">
			@csrf
			<label for="difficulty">Schwierigkeitsgrad</label>
			<select id="difficulty" name="difficulty">
				<option value="all">Alle</option>
				@for($i = 1; $i <= 15; $i++)
					<option value="{{ $i }}">Stufe {{ $i }}</option>
				@endfor
			</select>
			<label for="category">Kategorie</label>
			<select id="category" name="category">
				<option value="all">Alle</option>
				{{--
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{  $category->name }}</option>
                @endforeach
				--}}
				<option>Musik</option>
				<option>Sport</option>
				<option>Informatik</option>
			</select>
			<input type="submit" value="Filtern">
		</form>
	</div>
	<div id="bottom_bar">
		<a href="{{ route('question.add') }}" id="add_question">
			<img src="{{ asset('assets/img/add.png') }}" alt="Hinzufügen">
		</a>
		<img src="{{ asset('assets/img/filter.png') }}" id="filter_questions" alt="Filtern" onclick="openFilters()">
	</div>
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
	<script>
        let filters = document.getElementById('filters')
        let filterButton = document.getElementById('filter_questions')

        function openFilters() {
            filterButton.setAttribute('onclick', 'closeFilters()')
            filterButton.src = '{{ asset('assets/img/close.png') }}'
            filterButton.alt = 'Schließen'
            filters.style.bottom = '200px'
        }

        function closeFilters() {
            filterButton.setAttribute('onclick', 'openFilters()')
            filterButton.src = '{{ asset('assets/img/filter.png') }}'
            filterButton.alt = 'Filter'
            filters.style.bottom = "0"
        }
	</script>
</x-base-layout>
