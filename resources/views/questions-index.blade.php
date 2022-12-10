<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<main>
    <div class="horizontal_bar">
        <form action="{{-- route('back') --}}" method="POST">
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

    {{--//TODO Korrekter Link zu Question Add Page--}}
    <p><a href="/questions-add"></a></p>

    <h3>Fragen Übersicht</h3>
    @foreach($questions as $question)
        <p>{{$question->text}}   |   <a href="{{route('question-edit', $question)}}"><u>EDIT</u></a>   |   <a href="{{route('question-delete', $question)}}"><u>DELETE</u></a></p>
    @endforeach

</main>
</body>
</html>
