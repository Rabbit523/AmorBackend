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
        'client_id' => '1020277066614-be4fl7sc33n45g9ljbuiscraqtin2fm2.apps.googleusercontent.com',
        'client_secret' => 'AYcneJ5uad2CiNMU1sYQh22r',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback'
    ],

    // 'firebase' => [
    //     'api_key' => 'AIzaSyD2hINdhGGU_giBOSVBmImE_Vk4Iqvy2mc', // Only used for JS integration
    //     'auth_domain' => 'chatapp-d158b.firebaseapp.com', // Only used for JS integration
    //     'database_url' => 'https://chatapp-d158b.firebaseio.com',
    //     'secret' => 'secret',
    //     'storage_bucket' => 'chatapp-d158b.appspot.com', // Only used for JS integration
    // ]
];
