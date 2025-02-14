# Laravel Cryptographic Signatures

A Laravel package for generating and verifying cryptographic signatures using RSA keys. This package provides easy-to-use methods for securing your data through signatures, ensuring authenticity and integrity.

## Installation

You can install the package via Composer by running the following command in your Laravel project:

```bash
composer require jmrashed/laravel-cryptographic-signatures
```

### Publishing Configuration

Publish the package's configuration file to customize your keys:

```bash
php artisan vendor:publish --provider="Jmrashed\LaravelCryptographicSignatures\Providers\CryptoSignaturesServiceProvider" --tag="config"
```

This will create a `cryptosignature.php` file in the `config/` directory, where you can specify the paths to your private and public keys.

### Configuration

In your `.env` file, set the paths to your private and public keys:

```env
CRYPTO_PRIVATE_KEY=/path/to/private.key
CRYPTO_PUBLIC_KEY=/path/to/public.key
```

Make sure your keys are stored securely in the specified paths.

## Usage

Once the package is installed and configured, you can easily generate and verify cryptographic signatures.

### Generating a Signature

Use the `CryptoSignature` facade to generate a signature for your data.

```php
use Jmrashed\LaravelCryptographicSignatures\Facades\CryptoSignature;

$data = 'Sensitive data to be signed';
$signature = CryptoSignature::generateSignature($data);

echo "Generated Signature: " . $signature;
```

### Verifying a Signature

You can also verify a signature to ensure the integrity and authenticity of the data.

```php
use Jmrashed\LaravelCryptographicSignatures\Facades\CryptoSignature;

$data = 'Sensitive data to be verified';
$signature = 'previouslyGeneratedSignature';

$isVerified = CryptoSignature::verifySignature($data, $signature);

if ($isVerified) {
    echo "The signature is valid!";
} else {
    echo "The signature is invalid!";
}
```

## Features

- **Generate cryptographic signatures**: Safely sign your data with a private key.
- **Verify signatures**: Ensure the authenticity and integrity of data with a public key.
- **Flexible configuration**: Easily set custom key paths through Laravel’s config system.

## Example

Here’s a complete example that demonstrates generating and verifying a signature:

```php
use Jmrashed\LaravelCryptographicSignatures\Facades\CryptoSignature;

$data = 'Sensitive data to be signed';

// Generate the signature
$signature = CryptoSignature::generateSignature($data);

// Verify the signature
$isVerified = CryptoSignature::verifySignature($data, $signature);

if ($isVerified) {
    echo "The data is verified!";
} else {
    echo "Signature verification failed!";
}
```

## Testing

To run tests for the package, use the following command:

```bash
php artisan test
```

Make sure your keys are properly configured in the `.env` file before running the tests.

## License

The package is open-sourced software licensed under the [MIT license](LICENSE).

## Contributing

Contributions are welcome! Please feel free to fork the repository, submit issues, and send pull requests.

- Fork the repo and clone it to your local machine
- Create a new branch for your changes
- Write tests for new features or bug fixes
- Submit a pull request with a description of your changes

## Support

If you encounter any issues or have questions, feel free to open an issue in the GitHub repository.

## Acknowledgments

- Thanks to Laravel for its amazing framework that makes building packages so easy!
- OpenSSL for providing secure cryptographic tools that power this package.
 