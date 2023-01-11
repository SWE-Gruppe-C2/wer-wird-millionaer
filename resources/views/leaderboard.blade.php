<x-base-layout :title="'Leaderboard'">
    <main>
        <nav>
            <x-forms.back location="{{ url()->previous() }}"/>
            <x-forms.logout/>
            <x-forms.mute/>
        </nav>
        <h1>TOP 10</h1>
        <table id="highscores">
            <tbody>
            @foreach($games as $game)
                <tr>
                    <td> {{$loop->iteration.'.'. $game->user->name }} </td>
                    <td> {{ number_format($game->stage?->price,0,'.','.').'€' }} </td>
                    <td> {{ $game->time_needed . ' min' }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </main>
    <div id="bg">
        <div id="popup" class="round-box">
            <span>Möchten Sie sich wirklich abmelden?</span>
            <div class="horizontal_bar">
                <div onclick="cancelLogout()">Abbrechen</div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button id="confirm" type="submit">Abmelden</button>
                </form>
            </div>
        </div>
    </div>

</x-base-layout>
