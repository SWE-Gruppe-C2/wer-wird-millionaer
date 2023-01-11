

<x-base-layout :title="'Fragen Filtern'">
    <nav>
        <x-forms.back location="/system-control"/>
        <h1>Fragenkatalog Filter</h1>
    </nav>

    <main class="center-content">

        <a href="{{route('question-filter')}}?reset=true"> RESET </a>
        <div>
            <form action="{{ route('question-filter') }}" method="POST">
                @csrf
                <select name="schwierigkeit" id="schwierigkeit" required>
                    <option value="1">Level 1</option>
                    <option value="2">Level 2</option>
                    <option value="3">Level 3</option>
                    <option value="4">Level 4</option>
                    <option value="5">Level 5</option>
                    <option value="6">Level 6</option>
                    <option value="7">Level 7</option>
                    <option value="8">Level 8</option>
                    <option value="9">Level 9</option>
                    <option value="10">Level 10</option>
                    <option value="11">Level 11</option>
                    <option value="12">Level 12</option>
                    <option value="13">Level 13</option>
                    <option value="14">Level 14</option>
                    <option value="15">Level 15</option>
                </select>

                <select name="kategorie_id" id="kategorie_id" required>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <input type="submit" value="Frage filtern">
            </form>
        </div>

        @foreach($questions as $question)
            <p>{{$question->text}}  |   <a href="{{route('question.edit', $question)}}"><u>EDIT</u></a>   |    <a href="{{route('question-delete', $question)}}"><u>DELETE</u></a></p>
        @endforeach


    </main>

</x-base-layout>
