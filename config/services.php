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
    'client_id' => '905596912533-vmf0m2plp76bsc2f4f6auunmeqqrtkqh.apps.googleusercontent.com',
    'client_secret' => 'KFWiwD1md_yGc_U0NaqcMaGm',
    'redirect' => 'http://demo.tortn1.az/login/google/callback',
],

    'facebook' => [
    'client_id' => '710242743039326',
    'client_secret' => 'c8da2922bf228c13ee1977b55b101fbf',
    'redirect' => 'https://demo.tortn1.az/login/facebook/callback',
],

];
