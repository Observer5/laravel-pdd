<?php

return [

    'defaults' => [
        'log' => [
            'level' => env('PDD_LOG_LEVEL', 'debug'),
            'file'  => env('PDD_LOG_FILE', storage_path('logs/pdd.log')),
        ],
    ],
    'application' => [
        'default' => [
            'client_id'     => env('PDD_APPLICATION_DEFAULT_CLIENT_ID', 'your-client_id'),         // ClientID
            'client_secret' => env('PDD_APPLICATION_DEFAULT_CLIENT_SECRET', 'your-client_secret'),    // ClientSecret

            'oauth' => [
                'callback'    => env('PDD_APPLICATION_DEFAULT_OAUTH_CALLBACK', '/examples/oauth_callback.php'),
                'member_type' => env('PDD_APPLICATION_DEFAULT_OAUTH_MEMBER_TYPE', ''),
            ]
        ]
    ]
];