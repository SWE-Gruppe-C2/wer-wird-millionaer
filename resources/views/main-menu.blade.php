<x-base-layout :title="'Main Menü'">
    <nav>
        <x-forms.mute/>
        <x-forms.logout/>
    </nav>
        <main class="center-content">

           <div id="hub">
               <div id="logo"/>
           </div>

            <div class="button_wrapper">
                <a href="{{ route('game') }}" class="button">
                    <span>Spiel starten</span>
                </a>
                <a href="{{ route('leaderboard') }}" class="button">
                    <span>Bestenliste</span>
                </a>
            </div>

        </main>


</x-base-layout>
