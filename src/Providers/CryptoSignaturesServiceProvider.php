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
        // Publish config/cryptosignature.php
        $this->publishes([
            __DIR__ . '/../config/cryptosignature.php' => config_path('cryptosignature.php'),
        ], 'config');

        // Publish keys to storage/keys
        $this->publishes([
            __DIR__ . '/../storage/keys' => storage_path('keys'),
        ], 'keys');
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
    }
}
