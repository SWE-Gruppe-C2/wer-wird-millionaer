<x-base-layout :title="'Frage Löschen'">

    <nav>
        <x-forms.back/>
        <h1>Frage Löschen</h1>
    </nav>

    <main class="center-content">
        <div>
            <h1>Frage löschen</h1>
            <p>{{$question->text}}</p>
            <p>{{$question->answers[0]}}</p>
            <p>{{$question->answers[0]}}</p>
            <p>{{$question->answers[0]}}</p>
            <p>{{$question->answers[0]}}</p>

            <form method="POST" action="{{ route('question.destroy', $question) }}">
            @csrf
            @method('delete')
            <input type="submit" value="Frage löschen">
        </form>
            <a href="">Abbrechen</a>
        </div>
    </main>

</x-base-layout>



