# Base64UUIDCodec

Encode your UUID to a Base64-encoded string but in a shortened version.

## Example

UUID = 0ca50e59-bcf4-4627-9054-ab8e4917e71b

Standard Base64-encoded string (48 char):  
```MGNhNTBlNTktYmNmNC00NjI3LTkwNTQtYWI4ZTQ5MTdlNzFi```

Shortened Base64-encoded string (22 char):  
```DKUOWbz0RieQVKuOSRfnGw```

## Usage
```
$uuid = '0ca50e59-bcf4-4627-9054-ab8e4917e71b';

echo  FrosyaLabs\Utils\Codec\Base64Uuid\Base64UUIDCodec::encode($uuid);
```