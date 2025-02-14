<?php

namespace Jmrashed\LaravelCryptographicSignatures\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string generateSignature(string $data)
 * @method static bool verifySignature(string $data, string $signature)
 */
class CryptoSignature extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cryptosignature';
    }
}
