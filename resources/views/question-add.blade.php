<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/wwm_logo.png">
    <title>add question</title>

    <style>

        * {
            overflow: hidden;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            position: relative;
            z-index: -999;
            width: 100%;
            height: 100vh;
            user-select: none;
            font: 16px sans-serif;
            color: white;
            background-color: #181852;
        }

        main {
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: flex-start;
            height: 100%;
            padding: 10px 0;
            row-gap: 10px;
        }

    </style>

</head>
<body>
<main>

    <div class="">
        <h1>Frage Hinzufügen</h1>
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
            <form action="{{ route('questions.store') }}" method="POST">
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

        </div>

    </div>
</main>
</body>
</html>
