<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '9474195396-kfg0fa6daoj8j6c4t10e6pfv0oo4rj72.apps.googleusercontent.com', //USE FROM Google DEVELOPER ACCOUNT
        'client_secret' => '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', //USE FROM Google DEVELOPER ACCOUNT
        'redirect' => 'http://localhost:8000/callback/google'
    ],
    'facebook' => [
        'client_id' => '768663937841856',
        'client_secret' => 'e9d33c40fd0a601544c3721d92d10a12',
        'redirect' => 'http://localhost:8000/callback/facebook',
    ],
    'twitter' => [
        'client_id' => 'eUJSZGxUNElwLXc1blBqU1d4TmM6MTpjaQ',
        'client_secret' => 'ogx2LG1GzOhuc7vnvKz0nGvk7NlKIxkWaKkbL0_oBPbFxpBrAd',
        'redirect' => '',

    ],

];
