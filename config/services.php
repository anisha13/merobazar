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
    'facebook'=>[
        'client_id' => '248554136663485',
        'client_secret' => 'db6ed465029b6dfd30b8d2a843a19824',
        'redirect' => 'https://nepalolx.tilathi.info/login/facebook/callback',
    ],
 
     'google' => [
         'client_id'  => '462739728349-kdhsaiubdvcjvq8bjjemktb057om4k0f.apps.googleusercontent.com',
          'client_secret' => 'OkGIoZoRbUQhIr_flc8t2zS7',
           'redirect'      =>'http://nepalolx.tilathi.info/login/google/callback',
 
   ],

];
