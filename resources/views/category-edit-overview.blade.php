

<x-base-layout :title="'Kategorie Start Page'">

    <nav>
        <x-forms.back/>
        <h1>Kategorie Bearbeiten</h1>
    </nav>

    <main class="center-content">

        @foreach($categories as $category)
            <p>{{$category->name}}   | <a href="{{route('category.edit', $category)}}"><u>EDIT</u></a></p>
        @endforeach

    </main>


</x-base-layout>
