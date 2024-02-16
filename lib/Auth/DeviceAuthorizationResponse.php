<?php
/**
 * PHP version 7.3
 *
 * @category Class
 */

namespace Avalara\SDK\Auth;

/**
 * DeviceAuthorizationResponse Class Doc Comment
 *
 * @category Class
 * @package  Avalara\SDK\Auth
 */
class DeviceAuthorizationResponse
{
    /**
     * The device verification code.
     */
    public $deviceCode;
    /**
     * The end-user verification code.
     */
    public $userCode;
    /**
     * The end-user verification URI on the authorization server. The URI
     * should be and easy to remember as end-users will be asked to
     * manually type it into their user-agent.
     */
    public $verificationUrl;
    /**
     * Optional. A verification URI that includes the "user_code" (or other
     * information with the same function as the "user_code"), designed for
     * non-textual transmission.
     */
    public $verificationUrlComplete;
    /**
     * The lifetime in seconds of the "device_code" and "user_code".
     */
    public $expiry;
    /**
     * Optional. The minimum amount of time in seconds that the client
     * SHOULD wait between polling requests to the token endpoint. If no
     * value is provided, clients MUST use 5 as the default.
     */
    public $interval;

    function __construct($deviceCode, $userCode, $verificationUrl, $verificationUrlComplete, $expiry, $interval) {
        $this->deviceCode = $deviceCode;
        $this->userCode = $userCode;
        $this->verificationUrl = $verificationUrl;
        $this->verificationUrlComplete = $verificationUrlComplete;
        $this->interval = $interval;
        $this->expiry = $expiry;
    }
}
?>