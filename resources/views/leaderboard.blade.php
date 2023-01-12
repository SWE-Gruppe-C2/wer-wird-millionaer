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
			@php $i = 1 @endphp
            @foreach($games as $game)
                <tr>
                    <td>{{ $i++.'. '. $game->user->name }}</td>
                    <td>{{ number_format($game->stage?->price, 0, '.', '.').'€' }}</td>
                    <td>{{ sprintf('%02d:%02d:%02d', ...explode(':', $game->time_needed)) . ' min' }}</td>
                </tr>
            @endforeach
			@while($i <= 10)
				<tr>
					<td>{{ $i++ }}.</td>
					<td></td>
					<td></td>
				</tr>
			@endwhile
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
	<script>
        window.addEventListener('DOMContentLoaded', () => {
            initMusic(0);
            openingMusic();
            muteCheck();
        })
	</script>
</x-base-layout>
