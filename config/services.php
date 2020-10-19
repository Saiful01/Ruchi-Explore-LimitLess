<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google' => [
        'client_id' => '458906490633-iqhkajaumbdt1d44tbs03kb8ofecr31c.apps.googleusercontent.com',
        'client_secret' => 'FX7DltzjyP7lbUsKyE_FVedr',
        'redirect' => 'https://ruchiexplorelimitless.com/login/google/callback',
    ],
    'facebook' => [

        'client_id' => '1056012094817815',
        'client_secret' => 'b310f4c4450c902ec08df4d9185984bd',
        'redirect' => 'https://ruchiexplorelimitless.com/login/facebook/callback',
    ],

];
