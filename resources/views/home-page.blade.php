<x-base-layout :title="'Home-Page'">
    <main class="center-content">
        <div id="hub">
            <div id="logo"></div>
        </div>
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
    </main>
</x-base-layout>