<!-- TODO: Muss als POST geschickt werden, Layout muss angepasst werden -->
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" id="logout" onclick="event.preventDefault();
                                                this.closest('form').submit();">
        <img src="{{ asset('assets/img/logout.png') }}" alt="Abmelden">
    </a>
</form>
