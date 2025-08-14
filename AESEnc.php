<?php

// Encrypt function with static IV
function encrypt($plaintext, $password)
{
    $method = "AES-256-CBC";  // Encryption method
    $key = hash('sha256', $password, true);  // Derive a key using SHA-256 from the password
    $ivLength = openssl_cipher_iv_length($method);  // Get the correct IV length for AES-256-CBC

    // Define a static IV (This should be the same across encrypt and decrypt functions)
    $iv = str_repeat('0', $ivLength);  // Example static IV (all zeros). You can replace this with another static value.

    // Encrypt the plaintext
    $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);

    // Generate a HMAC for integrity verification
    $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);

    // Return the IV, HMAC, and ciphertext concatenated and base64 encoded
    return base64_encode($iv . $hash . $ciphertext);  // Base64 encode to make the result safe for storage/transmission
}

// Decrypt function
function decrypt($ivHashCiphertextBase64, $password)
{
    $method = "AES-256-CBC";  // Decryption method
    $ivHashCiphertext = base64_decode($ivHashCiphertextBase64);  // Decode the base64 encoded string

    $ivLength = openssl_cipher_iv_length($method);  // Get IV length for AES-256-CBC
    if (strlen($ivHashCiphertext) < $ivLength + 32) {  // Ensure there's enough data for IV + HMAC
        return null;  // Invalid input data
    }

    // Extract the IV, HMAC, and ciphertext
    $iv = substr($ivHashCiphertext, 0, $ivLength);  // IV is the first part of the string
    $hash = substr($ivHashCiphertext, $ivLength, 32);  // HMAC is 32 bytes long (SHA-256)
    $ciphertext = substr($ivHashCiphertext, $ivLength + 32);  // The remaining part is the ciphertext

    // Derive the key using the password
    $key = hash('sha256', $password, true);  // Same key derivation as in encryption

    // Verify the HMAC to ensure data integrity
    $calculatedHash = hash_hmac('sha256', $ciphertext . $iv, $key, true);
    if (!hash_equals($calculatedHash, $hash)) {
        return null;  // HMAC verification failed, data is corrupted or tampered with
    }

    // Decrypt the ciphertext
    $decryptedText = openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);

    return $decryptedText;
}

// Example usage
$AESKEY = "TESTTEST";  // Password used to derive the key
