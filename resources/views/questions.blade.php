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
    <h1>Why is this page showing?</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</main>
</body>
</html>
