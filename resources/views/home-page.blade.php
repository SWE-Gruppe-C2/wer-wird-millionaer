<x-base-layout :title="'Home-Page'">
    <main>
        <div id="hub">
            <div id="logo"></div>
        </div>
        <div class="button_wrapper">
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('system') }}" class="button">
                        <span>Starten</span>
                    </a>
                @else
                    <a href="{{ route('main.menu') }}" class="button">
                        <span>Starten</span>
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}" class="button">
                    <span>Starten</span>
                </a>
            @endauth
        </div>
    </main>
</x-base-layout>

