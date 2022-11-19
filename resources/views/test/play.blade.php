<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/wwm_logo.png') }}">
    <title>Wer wird Millionär?</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<main id="spread">
    <div class="horizontal_bar">
        <a href="#" id="end_game">ENDE</a>
        <img src="{{ asset('assets/img/mute.png') }}" id="toggle_sound" alt="Musik einschalten">
        <img src="{{ asset('assets/img/list.png') }}" id="toggle_money_tree" alt="Spielfortschritt">
    </div>
    <div id="hub"></div>
    <div id="joker" class="horizontal_bar">
        <span id="fifty_fifty">50:50</span>
        <img src="{{ asset('assets/img/audience.png') }}" id="ask_audience" alt="Publikumsjoker">
        <img src="{{ asset('assets/img/call.png') }}" id="call_friend" alt="Telefonjoker">
    </div>
    <div class="button_wrapper">
        <div id="question" class="button">
            <span>Wer kann vielleicht schwimmen, aber nicht fliegen?</span>
        </div>
        <div id="answer_a" class="answer button">
            <span>Stockenten</span>
        </div>
        <div id="answer_b" class="answer button">
            <span>Pfeifenten</span>
        </div>
        <div id="answer_c" class="answer button">
            <span>Krickenten</span>
        </div>
        <div id="answer_d" class="answer button">
            <span>Studenten</span>
        </div>
    </div>
</main>
</body>
</html>
