<?php

namespace Jmrashed\LaravelCryptographicSignatures\Providers;

use Illuminate\Support\ServiceProvider;

class CryptoSignaturesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Any package assets like config, routes, or views would be registered here
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('cryptosignature', function ($app) {
            return new \Jmrashed\LaravelCryptographicSignatures\Services\CryptoSignatureService;
        });
        $this->app->alias(CryptoSignature::class, 'cryptosignature');

    }
}
