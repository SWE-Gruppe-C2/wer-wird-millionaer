<x-base-layout :title="'Leaderboard'">
    <div class="horizontal_bar">
        <nav>
            <x-forms.back/>
            <x-forms.mute/>
            <x-forms.logout/>
        </nav>
    </div>

    <main class="center-content">

        <h1>TOP 10</h1>

        <!--TODO: Layout entspricht noch nicht dem im Lastenheft -->
        <table >
            <thead>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            @foreach($games as $game)
                <tr>
                    <td> {{$loop->iteration.'.'. $game->user->name }} </td>
                    <td> {{ number_format($game->stage?->price,0,'.','.').'€' }} </td>
                    <td> {{ $game->timeTaken() . ' min' }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </main>

</x-base-layout>
