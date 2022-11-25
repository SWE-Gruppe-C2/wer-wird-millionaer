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

        <div class="">

        </div>

        <div class="">
            <form action="" method="post">
                <input type="text" id="question" name="question" placeholder="Question">
                <input type="text" id="antwort_a" name="antwort_a" placeholder="A: Antwort eingeben">
                <input type="text" id="antwort_b" name="antwort_b" placeholder="B: Antwort eingeben">
                <input type="text" id="antwort_c" name="antwort_c" placeholder="C: Antwort eingeben">
                <input type="text" id="antwort_d" name="antwort_d" placeholder="D: Antwort eingeben">

                <select name="korrekte_antwort" id="korrekte_antwort">
                    <option value="a">Antwort A</option>
                    <option value="b">Antwort B</option>
                    <option value="c">Antwort C</option>
                    <option value="d">Antwort D</option>
                </select>

                <select name="schwierigkeit" id="schwierigkeit">
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

                <select name="kategorie" id="kategorie">
                    <option value="test">Test Kategorie</option>
                </select>

                <input type="submit" value="Frage hinzufügen">

            </form>

        </div>


    </div>





    <div class="horizontal_bar">
        <h1>Login</h1>
    </div>
    <div id="hub"></div>
    <form action="#" method="post">
        <input type="text" id="username" name="username" placeholder="Benutzername">
        <input type="password" id="password" name="password" placeholder="Passwort">
        <input type="submit" value="Einloggen">
    </form>
    <a href="reset_password.html">Passwort vergessen?</a>
    <p>
        oder<br>
        Noch nicht registriert?
    </p>
    <a href="register.html">Registrieren</a>
</main>
</body>
</html>
