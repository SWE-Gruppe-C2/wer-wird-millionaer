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
    <div>
        <h1>Kategorie bearbeiten</h1>
    </div>

    /*an dieser Stelle muessen die Kategorien stehen*/

    @foreach($categories as $category)
        <p>{{$category->name}}   | <a href="{{route('category-edit', $category)}}"><u>EDIT</u></a></p>
    @endforeach

    <form action="{{ route('category-edit') }}" method="POST">
        @csrf
        <button type="submit">Kategorie bearbeiten</button>
    </form>

</main>
</body>
</html>
