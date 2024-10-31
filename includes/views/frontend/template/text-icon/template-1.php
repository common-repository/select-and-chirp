
<button id="twt-js" class="twt-icon-js twt-text-template-1 tooltip">
    <span class="twt-text-icon icon">
        <?php
        if ($logo == 'twt-old-logo.png') { ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none" class="twt-old-logo">
                <rect width="26" height="26" rx="13" fill="white" />
                <g filter="url(#filter0_d_64_14)">
                    <path d="M21.7823 8.14767C21.1564 8.42924 20.4834 8.61696 19.7733 8.7059C20.4951 8.27063 21.0507 7.57631 21.3114 6.75576C20.6359 7.15784 19.8875 7.45335 19.0914 7.6091C18.4555 6.92462 17.5484 6.5 16.5437 6.5C14.6138 6.5 13.0491 8.07512 13.0491 10.0175C13.0491 10.2925 13.0809 10.5601 13.1402 10.82C10.2367 10.672 7.6612 9.26988 5.93829 7.14185C5.63567 7.66197 5.46539 8.27063 5.46539 8.9133C5.46539 10.1343 6.08072 11.2094 7.01925 11.8426C6.44629 11.825 5.90722 11.6631 5.43513 11.4032C5.43513 11.4139 5.43513 11.4295 5.43513 11.4446C5.43513 13.1509 6.63996 14.5719 8.23699 14.8953C7.94526 14.9765 7.63659 15.0215 7.31864 15.0215C7.09309 15.0215 6.87318 14.9957 6.66014 14.9568C7.10479 16.3512 8.39476 17.3705 9.92319 17.4008C8.72723 18.3427 7.22099 18.9067 5.58321 18.9067C5.30036 18.9067 5.02357 18.8903 4.75 18.8567C6.2982 19.8522 8.13531 20.4355 10.1076 20.4355C16.534 20.4355 20.0501 15.0748 20.0501 10.4241C20.0501 10.2716 20.0452 10.1199 20.0384 9.96994C20.7243 9.47768 21.3154 8.85715 21.7823 8.14767Z" fill="url(#paint0_linear_64_14)" />
                </g>
                <defs>
                    <filter id="filter0_d_64_14" x="0.75" y="3.5" width="25.0322" height="21.9354" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                        <feOffset dy="1" />
                        <feGaussianBlur stdDeviation="2" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_64_14" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_64_14" result="shape" />
                    </filter>
                    <linearGradient id="paint0_linear_64_14" x1="7.35172" y1="7.03775" x2="19.8335" y2="19.3254" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2AA4F4" />
                        <stop offset="1" stop-color="#007AD9" />
                    </linearGradient>
                </defs>
            </svg>
        <?php } else { ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 22 21" fill="none" class="twt-new-logo">
                <rect x="1" width="20.1739" height="20" rx="10" fill="white" />
                <g filter="url(#filter0_d_1412_44)">
                    <path d="M4.0338 3L9.39645 10.1702L4 16H5.21462L9.93931 10.8958L13.7566 16H17.8897L12.2252 8.42651L17.2482 3H16.0336L11.6826 7.70068L8.16691 3H4.0338ZM5.81995 3.89459H7.71868L16.1033 15.1054H14.2046L5.81995 3.89459Z" fill="#118BE4" />
                </g>
                <defs>
                    <filter id="filter0_d_1412_44" x="0" y="0" width="21.8897" height="21" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                        <feOffset dy="1" />
                        <feGaussianBlur stdDeviation="2" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1412_44" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1412_44" result="shape" />
                    </filter>
                </defs>
            </svg>
        <?php } ?>

    </span><span>
        <?php echo (!empty($tdt_settings['layout']['front_text'])) ? esc_html($tdt_settings['layout']['front_text']) : 'Select and Tweet'; ?>
    </span></button>
