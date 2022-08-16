<div class="form-check form-check-{{$cls}}">
    <label class="form-check-label">
        <input type="checkbox" {{ $attributes }} class="form-check-input" @checked($checked)> {{ $title }} <i class="input-helper"></i>
    </label>
</div>