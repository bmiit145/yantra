<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;

class EncryptionService
{
    public static function encrypt(string $value): string
    {
        return base64_encode($value);
    }

    public static function decrypt(string $encryptedValue): string
    {

        return base64_decode($encryptedValue);
    }

    // function to encrypt whole request
    public static function encryptRequest($request)
    {
        $data = $request->all();
        foreach ($data as $key => $value) {
            $data[$key] = self::encrypt($value);
        }
        return $data;
    }

    // function to decrypt whole request
    public static function decryptRequest($request)
    {
        $data = $request->all();
        foreach ($data as $key => $value) {
            $data[$key] = self::decrypt($value);
        }
        return $data;
    }
}
