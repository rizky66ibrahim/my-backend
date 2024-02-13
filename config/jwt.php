<?php

return [
    // ! JWT Authentication Secret
    'secret' => env('JWT_SECRET'),

    // ! JWT Authentication Keys
    'keys' => [
        // * Public Key
        'public' => env('JWT_PUBLIC_KEY'),

        // * Private Key
        'private' => env('JWT_PRIVATE_KEY'),

        // * Passphrase
        'passphrase' => env('JWT_PASSPHRASE'),
    ],

    // ! JWT Authentication TTL (Time To Live)
    'ttl' => env('JWT_TTL', 60),

    // ! JWT Authentication Refresh TTL (Time To Live)
    'refresh_ttl' => env('JWT_REFRESH_TTL', 20160),

    // ! JWT Hashing Algorithm
    'algo' => env('JWT_ALGO', 'HS256'),

    // ! Required Claims
    'required_claims' => [
        'iss',
        'iat',
        'exp',
        'nbf',
        'sub',
        'jti',
    ],

    // ! Persistent Claims
    'persistent_claims' => [
        // 'foo',
        // 'bar',
    ],

    // ! Lock Subject
    'lock_subject' => true,

    // ! Leeway
    'leeway' => env('JWT_LEEWAY', 0),

    // ! Blacklist Enabled
    'blacklist_enabled' => env('JWT_BLACKLIST_ENABLED', true),

    // ! Blacklist Grace Period
    'blacklist_grace_period' => env('JWT_BLACKLIST_GRACE_PERIOD', 0),
    
    // ! Show blacklisted token option
    'show_black_list_exception' => env('JWT_SHOW_BLACKLIST_EXCEPTION', true),

    // ! Cookies encryption
    'decrypt_cookies' => false,

    // ! Providers
    'providers' => [
        // * JWT Provider
        'jwt' => PHPOpenSourceSaver\JWTAuth\Providers\JWT\Lcobucci::class,

        // * Authentication Provider
        'auth' => PHPOpenSourceSaver\JWTAuth\Providers\Auth\Illuminate::class,
        // * Storage Provider
        'storage' => PHPOpenSourceSaver\JWTAuth\Providers\Storage\Illuminate::class,
    ],
];
