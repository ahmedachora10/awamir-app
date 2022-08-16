<a 
    href="{{ $route }}" 
    style="font-size: 1.2rem" 
    class="me-2 d-flex text-decoration-none align-items-center"
    {{  $attributes }}
    >
    <small style="font-weight: 500;color: #0d6efdbf; font-size: 0.830em !important;">
        <small>{{ $slot }}</small>
    </small>
    <i class="text-primary mdi mdi-database-plus"></i>
</a> <!-- End Create Button -->