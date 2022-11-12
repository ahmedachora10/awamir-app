<div class="share" id="join-us">
    <a href="{{ settings('whatsapp_group') }}" class="text-decoration-none">
        <div class="w-100 bg-primary join-img" style="background-size: cover;">
            <img width="100%" height="100%" src="{{ asset('images/web/join-us.jpg') }}" alt="" srcset="">
        </div>
    </a>
</div>

@push('scripts')
    <script>
        const joinUsContainer = $('#join-us > div');

        const joinUsImages = {
            mobile: {
                image: "{{ asset('images/web/join-us-mobile.jpg') }}",
                height: '290px'
            },
            desktop: {
                image: "{{ asset('images/web/join-us.jpg') }}",
                height: '390px'
            },
        };

        const screenWidth = $(window).width();

        const applyChanges = (size = 'desktop') => {
            // joinUsContainer.css({
            //     'background-image': `url(${joinUsImages[size].image})`,
            //     // 'height': joinUsImages[size].height,
            // });

            joinUsContainer.find('img').attr('src', joinUsImages[size].image);
        }

        if (screenWidth < 779) {
            applyChanges('mobile');
        } else {
            applyChanges();
        }
    </script>
@endpush
