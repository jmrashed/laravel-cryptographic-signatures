<?php

namespace Jmrashed\LaravelCryptographicSignatures\Providers;

use Illuminate\Support\ServiceProvider;
use Jmrashed\LaravelCryptographicSignatures\Facades\CryptoSignature;
use Jmrashed\LaravelCryptographicSignatures\Services\CryptoSignatureService;

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
            return new CryptoSignatureService();
        });
        $this->app->alias(CryptoSignature::class, 'cryptosignature');

        // publish config/cryptosignature.php
        $this->publishes([
            __DIR__ . '/../config/cryptosignature.php' => config_path('cryptosignature.php'),
        ], 'config');

        // publish keys
        $this->publishes([
            __DIR__ . '/../storage/keys' => storage_path('keys'),
        ], 'keys');
    }
}
