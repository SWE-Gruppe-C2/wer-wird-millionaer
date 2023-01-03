<x-base-layout :title="'Kategorie bearbeiten'">
    <nav>
        <x-forms.back/>
        <h1>Kategorie bearbeiten</h1>
		<x-forms.logout/>
    </nav>
    <main class="center-content">
        <!-- TODO: Wo kommt das "new name" in der error message her? -->
        <x-input-error :messages="$errors->all()"/>
        <form action="{{ route('category.update', $category) }}" method="POST">
            @csrf
            @method('patch')
			<label for="category">Kategorie</label>
            <input type="text" id="category" name="category" value="{{ $category->name }}" placeholder="Neuen Kategorienamen eingeben"/>
            <input type="submit" value="Kategorie speichern"/>
        </form>
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