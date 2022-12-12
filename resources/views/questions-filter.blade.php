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

    <h3>Fragenkatalog Filter</h3>
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
        <p>{{$question->text}}   </p>
    @endforeach

</main>
</body>
</html>
