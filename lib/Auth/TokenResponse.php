<?php
/**
 * PHP version 7.3
 *
 * @category Class
 */

namespace Avalara\SDK\Auth;

/**
 * TokenResponse Class Doc Comment
 *
 * @category Class
 * @package  Avalara\SDK\Auth
 */
class TokenResponse
{
    /**
     * The TokenType for the token returned in the response.
     */
    public $tokenType;
    /**
     * The IdToken for the user.
     */
    public $idToken;
    /**
     * The refresh token used in the OAuth2 refresh 
     * flow to retrieve an updated access token.
     */
    public $refreshToken;
    /**
     * The access token used to make requests to the Avatax APIs.
     */
    public $accessToken;
    /**
     * Http Status code for the response.
     */
    public $httpStatusCode;
    /**
     * The expiry time for the access token.
     */
    public $expiryTime;
    /**
     * The expiry datetime for the access token with the date it was created added to the ExpiryTime.
     */
    public $expiryDateTime;
    /**
     * The error message returned from the auth service in the
     * event of an exception or failure scenarios. This can include values such
     * as "authorization_pending" or "slow_down" for different device code scenarios.
     */
    public $errorMessage;

    function __construct($tokenType, $refreshToken, $accessToken, $httpStatusCode, $expiryTime, $errorMessage) {
        $this->tokenType = $tokenType;
        $this->refreshToken = $refreshToken;
        $this->accessToken = $accessToken;
        $this->httpStatusCode = $httpStatusCode;
        $this->expiryTime = $expiryTime;
        $this->errorMessage = $errorMessage;
    }
}
?>