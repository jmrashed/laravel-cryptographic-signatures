<?php

namespace Jmrashed\LaravelCryptographicSignatures\Tests;

use CryptoSignature;
use Tests\TestCase;

class CryptoSignatureTest extends TestCase
{
    public function testGenerateAndVerifySignature()
    {
        $data = 'Test Data for Cryptographic Signature';
        $signature = CryptoSignature::generateSignature($data);
        $this->assertTrue(CryptoSignature::verifySignature($data, $signature));
    }
}
