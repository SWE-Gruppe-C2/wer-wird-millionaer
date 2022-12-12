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
            <a href="{{route('question.destroy', $question)}}">Löschen</a>
            <a href="">Abbrechen</a>
        </div>
    </main>

</x-base-layout>


