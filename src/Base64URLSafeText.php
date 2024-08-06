<?php
namespace FrosyaLabs\Utils\Codec\Base64Uuid;

class Base64URLSafeText
{
    /**
     * Make the Base64 URL-safe
     * 
     * @param string $text
     * @return string
     */
    public static function make(string $text): string
    {
        return str_replace(
            ['+', '/', '='],
            ['-', '_', ''],
            $text
        );
    }

    /**
     * Revert the Base64 URL-safe text to the standard Base64
     * 
     * @param string $text
     * @return string
     */
    public static function revert(string $text): string
    {
        return str_replace(
            ['-', '_'],
            ['+', '/'],
            $text
        );
    }
}
