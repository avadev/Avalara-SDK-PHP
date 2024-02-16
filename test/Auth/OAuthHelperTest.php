<?php

namespace Avalara\SDK\Test\Auth;
// Include the AvaTaxClient library
// require_once(__DIR__ . '/vendor/autoload.php');
use \Avalara\SDK\Test;
use \Avalara\SDK\Configuration;
use \Avalara\SDK\ApiClient;
use \Avalara\SDK\Auth;
use \Avalara\SDK\API\IAMDS\UserApi;
use \Avalara\SDK\Model\IAMDS\User;
use PHPUnit\Framework\TestCase;
use \GuzzleHttp\Promise\queue;
use Dotenv\Dotenv;

class OAuthHelperTest extends TestCase
{
    private static $config;

    public static function setUpBeforeClass(): void
    {
        $dotenv = Dotenv::createUnsafeImmutable(getcwd());
        $dotenv->load();
        $config = new \Avalara\SDK\Configuration();
        $config->setClientId(getenv('CLIENT_ID'));
        $config->setClientSecret(getenv('CLIENT_SECRET'));
        $config->appName='testApplication';
        $config->appVersion='2.1.2';
        $config->machineName='localhost';
        $config->environment='sandbox';  

        self::$config =  $config;
    }

    // public function testDeviceCodeFlow()
    // {
    //     $result = \Avalara\SDK\Auth\OAuthHelper::initiateDeviceAuthorizationFlow('avatax_api', self::$config);
    //     $this->assertEquals($result->verificationUrl, 'https://ai-sbx.avlr.sh/device');
    //     $tokenResult = \Avalara\SDK\Auth\OAuthHelper::getAccessTokenForDeviceFlow($result->deviceCode, self::$config);
    //     $this->assertEquals($tokenResult->errorMessage, 'authorization_pending');
    //     $this->assertEquals($tokenResult->httpStatusCode, 400);
    // }
}