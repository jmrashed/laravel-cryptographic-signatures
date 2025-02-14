<?php

return [
    'private_key' => env('CRYPTO_PRIVATE_KEY', storage_path('keys/private.key')),
    'public_key'  => env('CRYPTO_PUBLIC_KEY', storage_path('keys/public.key')),
];
