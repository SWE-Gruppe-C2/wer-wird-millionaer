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
<button onclick="currentMusic.mute">Mute</button>
</body>
