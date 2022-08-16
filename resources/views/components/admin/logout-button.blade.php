<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a {{ $attributes }} href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
        {{ $slot }}
    </a>
</form>