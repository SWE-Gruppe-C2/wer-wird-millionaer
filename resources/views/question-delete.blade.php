<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category add</title>

</head>
<body>
<main>
    <div class="horizontal_bar">
        <form action="{{--{{ route('back') }} --}}" method="POST">
            @csrf
            <button type="submit">
                <img src="{{ asset('assets/img/back.png') }}" id="back" alt="Back">
            </button>
        </form>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">
                <img src="{{ asset('assets/img/logout.png') }}" id="logout" alt="Logout">
            </button>
        </form>
    </div>
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
</body>
</html>


