<x-base-layout :title="'Frage Hinzufügen'">

    <nav>
        <x-forms.back/>
        <h1>Frage Hinzufügen</h1>
    </nav>

    <main class="center-content">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($questionAdded)
            <p>Frage erfolgreich hinzugefügt</p>
        @endif

        <div class="">
            <form action="{{ route('question.store') }}" method="POST">
                @csrf
                <input type="text" id="question" name="question" placeholder="Frage Eingeben" required>
                <input type="text" id="antwort_a" name="antwort_a" placeholder="A: Antwort eingeben" required>
                <input type="text" id="antwort_b" name="antwort_b" placeholder="B: Antwort eingeben" required>
                <input type="text" id="antwort_c" name="antwort_c" placeholder="C: Antwort eingeben" required>
                <input type="text" id="antwort_d" name="antwort_d" placeholder="D: Antwort eingeben" required>

                <select name="korrekte_antwort" id="korrekte_antwort" required>
                    <option value="a">Antwort A</option>
                    <option value="b">Antwort B</option>
                    <option value="c">Antwort C</option>
                    <option value="d">Antwort D</option>
                </select>

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

                <input type="submit" value="Frage hinzufügen">
            </form>


    </main>

</x-base-layout>
