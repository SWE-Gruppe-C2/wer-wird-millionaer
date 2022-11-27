<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Game Page</title>
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
            <span><!--SQL Abfrage an Datenbank? --></span>
        </div>
        <div id="answer_a" class="answer button">
            <span><!--SQL Abfrage an Datenbank? --></span>
        </div>
        <div id="answer_b" class="answer button">
            <span><!--SQL Abfrage an Datenbank? --></span>
        </div>
        <div id="answer_c" class="answer button">
            <span><!--SQL Abfrage an Datenbank? --></span>
        </div>
        <div id="answer_d" class="answer button">
            <span><!--SQL Abfrage an Datenbank? --></span>
        </div>
    </div>
</main>
</body>
