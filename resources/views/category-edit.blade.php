<x-base-layout :title="'Kategorie Bearbeiten'">
    <nav>
        <x-forms.back/>
        <h1>Kategorie Bearbeiten</h1>
    </nav>

    <main class="center-content">

        <div>
            <p>{{  $category->name }}</p>
        </div>
        <!-- TODO: Wo kommt das "new name" in der error message her? -->
        <x-input-error :messages="$errors->all()"/>

        <form action="{{ route('category.update', $category) }}" method="POST">
            @csrf
            @method('patch')
            <input type="text" name="newName" placeholder="Neuen Kategorienamen eingeben">
            <button type="submit">Kategorie speichern</button>
        </form>

    </main>

</x-base-layout>
