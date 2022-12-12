


<x-base-layout :title="'Fragen Übersicht'">

    <nav>
        <x-forms.back/>
        <h1>Fragen Übersicht</h1>
    </nav>

    <main class="center-content">

        {{--//TODO Korrekter Link zu Question Add Page--}}
        <p><a href="{{route('question-add')}}">Frage hinzufügen</a></p>
        <p><a href="{{route('question-filter')}}">Frage filtern</a></p>

        <h3>Fragenkatalog</h3>
        @foreach($questions as $question)
            <p>{{$question->text}}   |   <a href="{{route('question.edit', $question)}}"><u>EDIT</u></a>   |    <a href="{{route('question-delete', $question)}}"><u>DELETE</u></a></p>
        @endforeach

        {{--//TODO Fragenkatalog anzeige funktioniert nicht --}}


    </main>

</x-base-layout>
