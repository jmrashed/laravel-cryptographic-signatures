<?php

namespace Jmrashed\LaravelCryptographicSignatures\Facades;

use Illuminate\Support\Facades\Facade;

class CryptoSignature extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cryptosignature';
    }
}
