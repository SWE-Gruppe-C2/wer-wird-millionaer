<x-base-layout :title="'Kategorie Hinzufügen'">

        <nav>
            <x-forms.back/>
            <h1>Kategorie Hinzufügen</h1>
        </nav>

        <main class="center-content">

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
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <input type="text" id="category" name="category" placeholder="Category">
                        <input type="submit" value="Kategorie hinzufügen">
                    </form>
                </div>

        </main>

</x-base-layout>
