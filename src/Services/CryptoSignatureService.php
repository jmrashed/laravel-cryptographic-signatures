<?php

namespace Jmrashed\LaravelCryptographicSignatures\Services;

use Exception;

class CryptoSignatureService
{
    protected $privateKey;
    protected $publicKey;

    public function __construct()
    {
        // Load your private and public keys
        $this->privateKey = config('cryptosignature.private_key');
        $this->publicKey = config('cryptosignature.public_key');
    }

    /**
     * Generate a cryptographic signature for the provided data.
     *
     * @param  string $data
     * @return string
     * @throws Exception
     */
    public function generateSignature(string $data): string
    {
        $privateKey = openssl_pkey_get_private(file_get_contents($this->privateKey));
        
        if (!$privateKey) {
            throw new Exception('Unable to load private key');
        }

        openssl_sign($data, $signature, $privateKey, OPENSSL_ALGO_SHA256);
        openssl_free_key($privateKey);

        return base64_encode($signature);
    }

    /**
     * Verify a cryptographic signature for the provided data.
     *
     * @param  string $data
     * @param  string $signature
     * @return bool
     */
    public function verifySignature(string $data, string $signature): bool
    {
        $publicKey = openssl_pkey_get_public(file_get_contents($this->publicKey));

        if (!$publicKey) {
            return false;
        }

        return openssl_verify($data, base64_decode($signature), $publicKey, OPENSSL_ALGO_SHA256) === 1;
    }
}
