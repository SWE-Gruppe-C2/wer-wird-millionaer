<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js'])
    <title>Music Test</title>
</head>
<body>
<button onclick="startMusic()">Start Game</button>
<button onclick="win()">Win</button>
<button onclick="lose()">Lose</button>
<button onclick="mute()">Mute</button>
<button onclick="nextStage()">Next Stage</button>
<br>
<button onclick="joker5050()">50:50</button>
<button onclick="audienceJoker()">Publikumsjoker</button>
<button onclick="phoneJoker()">Telefonjoker</button>
<button onclick="openingMusic()">Titelmusik</button>
<button onclick="closingMusic()">Endmusik</button>
</body>
<!--audio
    onload="play()"
    controls
    autoplay
    id="myAudio"
    src="{{asset('/music/MainTheme.mp3')}}">
    Your browser does not support the <code>audio</code> element
</audio>
