<form method="POST" action="{{ $route }}">
    @csrf
    @method('DELETE')
    <a {{ $attributes }} href="{{ $route }}" onclick="if(confirm('هل تود حذف هذا العنصر؟')) { event.preventDefault();
    this.closest('form').submit();} else { return false }" style="font-size: 1.2rem">
        {{ $slot }}
    </a>
</form>