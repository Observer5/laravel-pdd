<?php

return [

    'log' => [
        'level' => env('PDD_LOG_LEVEL', 'debug'),
        'file'  => env('PDD_LOG_FILE', storage_path('logs/pdd.log')),
    ],

    'client_id'     => env('PDD_CLIENT_ID', 'your-client_id'),         // ClientID
    'client_secret' => env('PDD_CLIENT_SECRET', 'your-client_secret'),    // ClientSecret

    'oauth' => [
        'callback'    => env('PDD_OFFICIAL_ACCOUNT_OAUTH_CALLBACK', '/examples/oauth_callback.php'),
        'member_type' => 'MERCHANT',
    ]
];
