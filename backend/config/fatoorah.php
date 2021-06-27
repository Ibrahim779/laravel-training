<?php

return [

    'apiUrl' =>  env('FATOORAH_API_URL'),

    'apiKey' => env('FATOORAH_API_KEY'),

    'ExecutePayment' => env('FATOORAH_API_URL').'/v2/ExecutePayment',

    'InitiatePayment' => env('FATOORAH_API_URL').'/v2/InitiatePayment',

];
