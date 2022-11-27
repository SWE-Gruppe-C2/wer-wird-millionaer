    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <div class="horizontal_bar">
        <img src="img/mute.png" id="toggle_sound" alt="Musik einschalten">
        <a href="login.html">
            <img src="img/logout.png" id="logout" alt="Abmelden">
        </a>
    </div>
    <div class="leaderboard-table">
        @php $games = App\Http\Controllers\GameController::index(); @endphp
        <table>
            <tr>
                <th>User</th>
                <th>Gewinnsumme</th>
                <th>Zeit</th>
                @foreach($games['games'] as $game)
                    <tr>
                        <th>Platzhalter</th>
                        <th>{{$game->gewinnsumme}}</th>
                        <th>{{$game->zeit}}</th>
                    </tr>
                @endforeach
            </tr>
        </table>
    </div>

