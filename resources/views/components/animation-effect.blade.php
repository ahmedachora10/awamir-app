<div class="wrap">
    {{ $slot }}
</div>

@pushOnce('styles')
    <style>
        .wrap {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wrap>a {
            position: relative;
        }

        .wrap>a button {
            position: relative;
            z-index: 1;
        }

        .wrap>a::before {
            content: '';
            border-radius: 1000px;
            min-width: calc(300px + 12px);
            min-height: calc(60px + 12px);
            border: 6px solid #00FFCB;
            box-shadow: 0 0 60px rgba(0, 255, 203, .64);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: all .3s ease-in-out 0s;
        }

        /* .wrap>a:hover,
                                            .wrap>a:focus {
                                                color: #313133;
                                                transform: translateY(-6px);
                                            }

                                            .wrap>a:hover::before,
                                            .wrap>a:focus::before {
                                                opacity: 1;
                                            } */

        .wrap>a:hover,
        .wrap>a:focus,
        .wrap>a button:hover,
        .wrap>a button:focus {
            color: #313133 !important;
        }

        .wrap>a::after {
            content: '';
            width: 30px;
            height: 30px;
            border-radius: 100%;
            border: 6px solid #00FFCB;
            position: absolute;
            z-index: 0;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: ring 1.5s infinite;
        }

        .wrap>a:hover::after,
        .wrap>a:focus::after {
            animation: none;
            display: none;
        }

        @keyframes ring {
            0% {
                width: 30px;
                height: 30px;
                opacity: 1;
            }

            100% {
                width: 210px;
                height: 210px;
                opacity: 0;
            }
        }
    </style>
@endPushOnce
