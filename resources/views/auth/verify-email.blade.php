<x-base-layout :title="'Email Verifikation'">

        <nav>
            <x-forms.back/>
            <h1>Email Verifikation</h1>
        </nav>


    <main class="center-content">

        <div id="hub">
            <div id="logo"></div>
        </div>

        <!-- Ist eigentlich unnötig, aber sicher ist sicher -->
        <x-input-error :messages="$errors->all()"/>

        <div>
            {{ __('Danke fürs registrieren, bitte bestätigen sie den Link in der Email, welche wir soeben verschickt haben.') }}
        </div>

        <form class="center-content" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div>
                <input type="submit" value="{{ __('Link neu senden') }}">
            </div>
        </form>

        <form class="center-content" method="POST" action="{{ route('logout') }}">
            @csrf
            <div>
                <input type="submit" value="{{__('Logout')}}"/>
            </div>
        </form>

    </main>
</x-base-layout>

