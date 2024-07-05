<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;

class EncryptionService
{
    public static function encrypt(string $value): string
    {
        // Example: You can use a custom encryption method here
        // Replace with your encryption logic
        return base64_encode($value);
    }

    public static function decrypt(string $encryptedValue): string
    {
        // Example: You can use a custom decryption method here
        // Replace with your decryption logic
        return base64_decode($encryptedValue);
    }
}
