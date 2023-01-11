<x-base-layout :title="'Kategorie bearbeiten'">
    <nav>
        <x-forms.back location="/system-control"/>
        <h1>Kategorie bearbeiten</h1>
		<x-forms.logout/>
    </nav>
    <main class="scrollable-content">
        @foreach($categories as $category)
			<div class="round-box">
				<span>{{ $category->name }}</span>
				<div class="horizontal_bar">
					<a href="{{route('category.edit', $category)}}">Bearbeiten</a>
				</div>
			</div>
        @endforeach
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
