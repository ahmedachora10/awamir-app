<div class="form-check form-check-{{ $cls }}">
    <label class="form-check-label">
        <input type="radio" {{ $attributes->merge(['class' => 'form-check-input']) }} @if($checked) checked="checked" @endif> {{ __(ucfirst($title)) }} <i class="input-helper"></i></label>
</div>