<?php
namespace FrosyaLabs\Utils\Codec\Base64Uuid;

use Exception;

/**
 * Exception for invalid UUID format
 */
class InvalidUUIDFormatException extends Exception
{
    public function __construct()
    {
        parent::__construct(
            'Invalid UUID Format. Please make sure your UUID is correct!'
        );
    }
}
