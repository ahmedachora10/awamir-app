@if (session()->has('success'))
    <h5 class="me-2 mb-2 py-3 alert alert-success btn-fw text-end" id="notify-message">{{ session()->get('success') }}</h5>
    <script>
        setTimeout(() => {
            $('#notify-message').slideUp();
        }, 1800);
    </script>
@endif
