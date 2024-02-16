<?php
/**
 * PHP version 7.3
 *
 * @category Class
 */

namespace Avalara\SDK\Auth;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;
use Avalara\SDK\ApiException;
/**
 * OAuthHelper Class Doc Comment
 *
 * @category Class
 * @package  Avalara\SDK\Auth
 */
class OAuthHelper
{
    public static function initiateDeviceAuthorizationFlow($scopes, $configuration) {
        $configuration->setOAuthEndpoints();
        try {
            $httpBody = 'client_id=' . $configuration->getClientId() . '&scope=' . $scopes;
            $headers = [];
            $headers['Content-Type'] = 'application/x-www-form-urlencoded';
            $headers['Accept'] = 'application/json';
            $request = new Request('POST', $configuration->getDeviceAuthorizationUrl(), $headers, $httpBody);
            $response = $configuration->getClient()->send($request, []);
            $content = (string) $response->getBody();
            $json = json_decode($content);
            return new DeviceAuthorizationResponse($json->device_code, $json->user_code, $json->verification_uri, $json->verification_uri_complete, $json->expires_in, $json->interval);
        } catch (Exception $e) {
            echo 'OAuth2 Device Authorization retrieval failed. Error: ',  $e->getMessage(), "\n";
            throw new ApiException('OAuth2 Device Authorization retrieval failed. Error: '.  $e->getMessage());
        }
    }

    public static function getAccessTokenForDeviceFlow($deviceAuthorizationCode, $configuration) {
        try {
            $httpBody = 'grant_type=urn:ietf:params:oauth:grant-type:device_code&client_id=' . $configuration->getClientId() . '&device_code=' . $deviceAuthorizationCode;
            $headers = [];
            $headers['Content-Type'] = 'application/x-www-form-urlencoded';
            $headers['Accept'] = 'application/json';
            $request = new Request('POST', $configuration->getTokenUrl(), $headers, $httpBody);
            $response = $configuration->getClient()->send($request, []);
            $content = (string) $response->getBody();
            $json = json_decode($content);
            $statusCode = $response->getStatusCode();
            if ($statusCode > 199 && $statusCode < 300) {
                $refreshToken = isset($json->refresh_token) ? $json->refresh_token : null;
                return new TokenResponse($json->token_type, $refreshToken, $json->access_token, $statusCode, $json->expires_in, null);
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {    
            $errObj = json_decode($e->getResponse()->getBody());
            return new TokenResponse(null, null, null, $e->getCode(), null, $errObj->error);
        } catch (\Exception $e) {
            throw new ApiException('GetAccessTokenForDeviceFlow API call failed to retrieve the token. Error: ' . $e->getMessage());
        }
    }
}
?>