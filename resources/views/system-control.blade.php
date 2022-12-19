<x-base-layout :title="'System Controll'">

    <nav>
        <x-forms.back/>
        <h1>System Controll</h1>
    </nav>

    <main class="center-content">

        <!--TODO(Link hinzufügen)-->
        <a href="{{ route('logout') }}"></a>

        <a href="{{route('question.index')}}">Fragenkatalog</a>
        <a href="{{route('category-add')}}">Kategorie hinzufügen</a>
        <a href="{{route('category.index')}}">Kategorie bearbeiten</a>

    </main>

</x-base-layout>
