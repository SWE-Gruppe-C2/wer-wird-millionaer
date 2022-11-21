<x-app-layout>

    <div>
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

</x-app-layout>
