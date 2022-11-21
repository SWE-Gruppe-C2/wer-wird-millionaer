<x-app-layout>
    <form method="POST" action="{{ route('storeGame') }}">
        @csrf
        <input type="text" name="gewinnsumme">
        <input type="text" name="zeit">
        <x-primary-button>{{ __('Games') }}</x-primary-button>
    </form>
</x-app-layout>>
