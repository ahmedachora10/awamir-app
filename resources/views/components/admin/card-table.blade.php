<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" {{ $attributes }}>
                @csrf
                {{ $slot }}
            </form>
        </div>
    </div>
</div>
