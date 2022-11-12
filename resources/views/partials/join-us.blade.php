<div class="position-relative w-100" id="join-us">
    <div class="position-relative w-100 bg-primary join-imge" style="background-size: cover;">
        <a href="{{ settings('whatsapp_group') }}" class="text-decoration-none">
            <img width="100%" height="100%" src="{{ asset('images/web/join-us.jpg') }}" alt="" srcset="">
        </a>
        <div class="position-absolute" id="join-us-btn">
            <x-animation-effect>
                <a href="{{ settings('whatsapp_group') }}" target='_blank'>
                    <button class="btn_job py-4"
                        style="background-color:{{ settings('register_through_awamir_bg') }} ;">
                        <i class="bi bi-whatsapp ms-2"></i>
                        اضغط هنا للانظمام
                    </button>
                </a>
            </x-animation-effect>
        </div>
    </div>

    {{-- <div class="py-5"></div> --}}
</div>

@push('styles')
    <style>
        #join-us-btn {
            bottom: -1px;
            right: 50%;
            transform: translateX(50%)
        }

        #join-us-btn button {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
            width: 350px;
            border-radius: 120px;
        }

        @media (max-width: 648px) {
            #join-us-btn {
                bottom: -7pxpx;
                transform: translateX(50%)
            }

            #join-us-btn button {
                padding-top: 10px !important;
                padding-bottom: 10px !important;
                width: 204px;
            }
        }
    </style>
@endpush

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
            applyChanges();
        } else {
            applyChanges();
        }
    </script>
@endpush
