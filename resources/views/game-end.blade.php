    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <div class="horizontal_bar">
        <img src="img/mute.png" id="toggle_sound" alt="Musik einschalten">
        <a href="login.html">
            <img src="img/logout.png" id="logout" alt="Abmelden">
        </a>
    </div>
    <h2>Temporary Form to push Data to DB - that method should be relocated to game-loose game-win</h2>
    <form method="POST" action="{{ route('storeGame') }}">
        @csrf
        <input type="text" name="gewinnsumme">
        <input type="text" name="zeit">
        <x-primary-button>{{ __('Games') }}</x-primary-button>
    </form>

    <div>
        <h6>
            Gewinnsumme
        </h6>
        <p>lorem impsum € Gewinnsumme</p>
    </div>

    <div id="hub"></div>
    <div class="button_wrapper">
        <a href="play.html" class="button">
            <span>Erneut spielen</span>
        </a>
        <a href="/leaderboard" class="button">
            <span>Bestenliste</span>
        </a>
        <a href="/menu" class="button">
            <span>Hauptmenü</span>
        </a>
    </div>
