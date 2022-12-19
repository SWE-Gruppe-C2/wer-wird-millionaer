<x-base-layout :title="'System Control'">

    <nav>
        <x-forms.logout/>
        <h1>System Control</h1>
    </nav>

    <main class="center-content">
        <div class="button_wrapper">
            <a href="{{route('question.index')}}" class="button">Fragenkatalog</a>
            <a href="{{route('category-add')}}" class="button">Kategorie hinzufügen</a>
            <a href="{{route('category.index')}}" class="button">Kategorie bearbeiten</a>
        </div>

    </main>

</x-base-layout>
