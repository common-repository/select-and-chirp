
<button id="twt-js" class="twt-icon-js twt-text-template-2 tooltip"><span class="icon">
        <?php
        if ($logo == 'twt-old-logo.png') { ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 26 24" fill="none"
            class="twt-old-logo">
            <rect x="1" width="24" height="24" rx="6" fill="#FFFFFF" />
            <g filter="url(#filter0_d_11_127)">
                <path
                    d="M21.7823 6.14767C21.1564 6.42924 20.4834 6.61696 19.7733 6.7059C20.4951 6.27063 21.0507 5.57631 21.3114 4.75576C20.6359 5.15784 19.8875 5.45335 19.0914 5.6091C18.4555 4.92462 17.5484 4.5 16.5437 4.5C14.6138 4.5 13.0491 6.07512 13.0491 8.01748C13.0491 8.2925 13.0809 8.56014 13.1402 8.82C10.2367 8.67204 7.6612 7.26988 5.93829 5.14185C5.63567 5.66197 5.46539 6.27063 5.46539 6.9133C5.46539 8.13429 6.08072 9.20937 7.01925 9.84262C6.44629 9.82499 5.90722 9.6631 5.43513 9.40324C5.43513 9.4139 5.43513 9.42947 5.43513 9.44464C5.43513 11.1509 6.63996 12.5719 8.23699 12.8953C7.94526 12.9765 7.63659 13.0215 7.31864 13.0215C7.09309 13.0215 6.87318 12.9957 6.66014 12.9568C7.10479 14.3512 8.39476 15.3705 9.92319 15.4008C8.72723 16.3427 7.22099 16.9067 5.58321 16.9067C5.30036 16.9067 5.02357 16.8903 4.75 16.8567C6.2982 17.8522 8.13531 18.4355 10.1076 18.4355C16.534 18.4355 20.0501 13.0748 20.0501 8.42407C20.0501 8.2716 20.0452 8.11995 20.0384 7.96994C20.7243 7.47768 21.3154 6.85715 21.7823 6.14767Z"
                    fill="url(#paint0_linear_11_127)" />
            </g>
            <defs>
                <filter id="filter0_d_11_127" x="0.75" y="1.5" width="25.0322" height="21.9354"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset dy="1" />
                    <feGaussianBlur stdDeviation="2" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_11_127" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_11_127" result="shape" />
                </filter>
                <linearGradient id="paint0_linear_11_127" x1="7.35172" y1="5.03775" x2="19.8335" y2="17.3254"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#2AA4F4" />
                    <stop offset="1" stop-color="#007AD9" />
                </linearGradient>
            </defs>
        </svg>
        <?php } else { ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25" fill="none"
            class="twt-new-logo">
            <rect x="1" width="24" height="24" rx="6" fill="white" />
            <g filter="url(#filter0_d_1411_31)">
                <path
                    d="M4.0416 4L10.6418 12.8249L4 20H5.49492L11.3099 13.718L16.0081 20H21.095L14.1233 10.6788L20.3055 4H18.8106L13.4555 9.78545L9.1285 4H4.0416ZM6.23994 5.10103H8.57684L18.8964 18.899H16.5595L6.23994 5.10103Z"
                    fill="#118BE4" />
            </g>
            <defs>
                <filter id="filter0_d_1411_31" x="0" y="1" width="25.095" height="24" filterUnits="userSpaceOnUse"
                    color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset dy="1" />
                    <feGaussianBlur stdDeviation="2" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1411_31" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1411_31" result="shape" />
                </filter>
            </defs>
        </svg>
        <?php } ?>

    </span><span>
        <?php echo (!empty($tdt_settings['layout']['front_text'])) ? esc_html($tdt_settings['layout']['front_text']) : 'Select and Tweet'; ?>
    </span></button>
