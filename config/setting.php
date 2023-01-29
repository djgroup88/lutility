<?php

return [
    'list' => [
        'general' => [
            'site_name' => ['string', env('APP_NAME', 'Laravel')],
            'site_logo' => ['image', null],
            'favicon' => ['image', asset('favicon.ico')],
        ]
    ]
];
