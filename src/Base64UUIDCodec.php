<?php
namespace FrosyaLabs\Utils\Codec\Base64Uuid;

/**
 * UUID to (shortened) Base64 Encoder and Decoder
 */
class Base64UUIDCodec
{
    /**
     * Shorten version of base64-encoded UUID string
     * 
     * @param string $uuid Standard UUID text representation
     * @return string
     */
    public static function encode(string $uuid): string
    {
        if ( ! self::isValidUuid($uuid)) {
            throw new InvalidUUIDFormatException();
        }

        // Return Base64 URL-safe text
        return Base64URLSafeText::make(
            base64_encode(self::uuidToBytes($uuid))
        );
    }

    /**
     * Shorten version of base64-encoded UUID string
     * 
     * @param string $uuid Standard UUID text representation
     * @return string
     */
    public static function decode(string $encodedUuid): string
    {
        $base64 = Base64URLSafeText::revert($encodedUuid);

        // Add padding if necessary
        $remainder = strlen($base64) % 4;
        if ($remainder) {
            $base64 .= str_repeat('=', 4 - $remainder);
        }

        // Format the hex string as a UUID
        return self::hexToUuidString(
            bin2hex(base64_decode($base64))
        );
    }

    /**
     * Pack UUID as binary string
     * 
     * @param string $uuid
     * @return string
     */
    private static function uuidToBytes(string $uuid): string
    {
        return pack(
            'H*',
            str_replace('-', '', $uuid)
        );
    }

    /**
     * Format the hex string as a UUID
     * 
     * @param string $hex
     * @return string
     */
    private static function hexToUuidString(string $hex): string
    {
        return sprintf(
            '%08s-%04s-%04s-%04s-%012s',
            substr($hex, 0, 8),
            substr($hex, 8, 4),
            substr($hex, 12, 4),
            substr($hex, 16, 4),
            substr($hex, 20)
        );
    }

    private static function isValidUuid(string $uuid): bool
    {
        $hex = "[0-9a-fA-F]";

        return preg_match(
            "/^$hex{8}-$hex{4}-$hex{4}-$hex{4}-$hex{12}$/",
            $uuid
        );
    }
}
