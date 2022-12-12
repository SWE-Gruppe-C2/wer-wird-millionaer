<x-base-layout :title="'Kategorie hinzufügen'">
    <nav>
        <x-forms.back/>
        <x-forms.logout/>
        <h1>Kategorie hinzufügen</h1>
    </nav>
    <main>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="">
            <form action="{{url('category-add')}}" method="POST">
                @csrf
                <input type="text" id="category" name="category" placeholder="Category">
                <input type="submit" value="Kategorie hinzufügen">
            </form>
        </div>
    </main>
</x-base-layout>

