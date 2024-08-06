<?php
include_once 'vendor/autoload.php';

use FrosyaLabs\Utils\Codec\Base64Uuid\Base64UUIDCodec;

$uuid = '0ca50e59-bcf4-4627-9054-ab8e4917e71b';
echo 'Standard Base64 = '.base64_encode($uuid)."\n";
$shortBase64Uuid = FrosyaLabs\Utils\Codec\Base64Uuid\Base64UUIDCodec::encode($uuid);
echo 'Shortened Base64 = '.$shortBase64Uuid."\n";
$reverted = Base64UUIDCodec::decode($shortBase64Uuid);
echo $reverted."\n";

// Run: php test.php