<?php
/**
 * PHP version 7.3
 *
 * @category Class
 */

namespace Avalara\SDK;

/**
 * TokenMetadata Class Doc Comment
 *
 * @category Class
 * @package  Avalara\SDK
 */
class TokenMetadata
{
    public $accessToken;
    public $expiry;
    function __construct($token, $expireTime) {
        $this->accessToken = $token;
        $this->expiry = $expireTime;

    }
}
?>