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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

      'facebook' => [
    'client_id' => '353043105036635',
    'client_secret' => '31fa6f311dbfbd371d103b108329bb2b',
    'redirect' => 'http://localhost:8000/auth/facebook/callback',
],
'twitter' => [
    'client_id' => 'N6SulYnfNWSqkE9WGUCJvT2fz',
    'client_secret' => 'NSlf43w4EG8qNMQiUNcgV9nVH7gP3BrZsEmhhqdjEkldC87xRR',
    'redirect' => 'http://localhost:8000/auth/twitter/callback',
],
'google' => [
    'client_id' => '197042642144-nufu9b2rqa6sbtrjp1g52thj928cqth7.apps.googleusercontent.com',
    'client_secret' => 'qQzh2wwfDYXJdNfrw5IzzYo0',
    'redirect' => 'http://localhost:8000/auth/google/callback',
],

];
