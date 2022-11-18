<x-app-layout>

    <div>
        @php $games = App\Http\Controllers\GameController::index(); @endphp
        <table>
            <tr>
                <th>User</th>
                <th>Gewinnsumme</th>
                <th>Zeit</th>
                @foreach($games as $game)
                    <tr>
                        <th>{{$game->get('users.name')}}</th>
                        <th>{{$game->get('games.gewinnsumme')}}</th>
                        <th>{{$game->get('games.zeit')}}</th>
                    </tr>
                @endforeach
            </tr>
        </table>
    </div>

</x-app-layout>
