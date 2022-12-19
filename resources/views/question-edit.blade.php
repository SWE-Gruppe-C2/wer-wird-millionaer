<x-base-layout :title="'Frage Bearbeiten'">

    <nav>
        <x-forms.back/>
        <h1>Frage Bearbeiten</h1>
    </nav>

    <main class="center-content">
        <div>
            <p>Frage: {{($oldQuestion->text)}}</p>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('question.update', $oldQuestion) }}" method="POST">
            @csrf
            @method('patch')
            <input type="text" id="question" name="question" placeholder="Frage Eingeben" value="{{$oldQuestion->text}}"required>
            <input type="text" id="antwort_a" name="antwort_a" placeholder="A: Antwort eingeben" value="{{$oldQuestion->answers[0]}}" required>
            <input type="text" id="antwort_b" name="antwort_b" placeholder="B: Antwort eingeben" value="{{$oldQuestion->answers[1]}}" required>
            <input type="text" id="antwort_c" name="antwort_c" placeholder="C: Antwort eingeben" value="{{$oldQuestion->answers[2]}}" required>
            <input type="text" id="antwort_d" name="antwort_d" placeholder="D: Antwort eingeben" value="{{$oldQuestion->answers[3]}}" required>

            <select name="korrekte_antwort" id="korrekte_antwort" required>
                <option value="a" @if($oldQuestion->correct_answer === 'a') selected @endif>Antwort A</option>
                <option value="b" @if($oldQuestion->correct_answer === 'b') selected @endif>Antwort B</option>
                <option value="c" @if($oldQuestion->correct_answer === 'c') selected @endif>Antwort C</option>
                <option value="d" @if($oldQuestion->correct_answer === 'd') selected @endif>Antwort D</option>
            </select>

            <select name="schwierigkeit" id="schwierigkeit" onselect="" required>

                @for($i = 1; $i < 16; $i++)

                    @if($oldQuestion->difficulty == $i)
                        <option value="{{ $i }}" selected style="color: green"> Level {{ $i }}</option>
                    @endif
                        <option value="{{ $i }}">Level {{ $i }}</option>

                @endfor
            </select>

            <select name="kategorie_id" id="kategorie_id" required>
                @foreach($categories as $category)

                    {{-- SELECTS DEFAULT FOR QUESTION CATEGORY WHEN DISPLAYING --}}
                    @if($oldQuestion->category_id == $category->id)
                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                    @endif

                    <option value="{{$category->id}}" >{{$category->name}}</option>

                @endforeach
            </select>

            <input type="submit" value="Frage speichern ">
        </form>
    </main>


</x-base-layout>
