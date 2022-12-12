

<x-base-layout :title="'Kategorie Bearbeiten'">
    <nav>
        <x-forms.back/>
        <h1>Kategorie Bearbeiten</h1>
    </nav>

    <main class="center-content">

        <div>
            <p>{{$category->name}}</p>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('category.update', $category) }}" method="POST">
            @csrf
            @method('patch')
            <input type="text" name="newName" placeholder="Neuen Kategorienamen eingeben">
            <button type="submit">Kategorie speichern</button>
        </form>

    </main>

</x-base-layout>
