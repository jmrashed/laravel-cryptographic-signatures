<?php

namespace Jmrashed\LaravelCryptographicSignatures\Services;

use Exception;

class CryptoSignatureService
{
    private $privateKey;
    private $publicKey;

    public function __construct($privateKeyPath = null, $publicKeyPath = null)
    {
        $this->privateKey = $privateKeyPath ?: config('cryptosignature.private_key');
        $this->publicKey = $publicKeyPath ?: config('cryptosignature.public_key');
    }

    public function generateSignature(string $data): string
    {
        try {
            openssl_sign($data, $signature, file_get_contents($this->privateKey), OPENSSL_ALGO_SHA256);
            return base64_encode($signature);
        } catch (Exception $e) {
            throw new Exception('Signature generation failed: ' . $e->getMessage());
        }
    }

    public function verifySignature(string $data, string $signature): bool
    {
        try {
            $isValid = openssl_verify($data, base64_decode($signature), file_get_contents($this->publicKey), OPENSSL_ALGO_SHA256);
            return $isValid === 1;
        } catch (Exception $e) {
            throw new Exception('Signature verification failed: ' . $e->getMessage());
        }
    }
}
