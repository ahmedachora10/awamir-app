<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn mb-2']) }}>
    {{ $slot }}
</button>
