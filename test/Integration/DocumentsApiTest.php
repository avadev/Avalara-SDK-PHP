<?php

namespace Avalara\SDK\Test\Integration;
// Include the AvaTaxClient library
// require_once(__DIR__ . '/vendor/autoload.php');
use \Avalara\SDK\Test;
use \Avalara\SDK\Configuration;
use \Avalara\SDK\ApiClient;
use \Avalara\SDK\API\IAMDS\UserApi;
use \Avalara\SDK\Model\IAMDS\User;
use PHPUnit\Framework\TestCase;
use \GuzzleHttp\Promise\queue;
use Dotenv\Dotenv;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class DocumentsApiTest extends TestCase
{
    private static $client;

    public static function setUpBeforeClass(): void
    {
        $dotenv = Dotenv::createUnsafeImmutable(getcwd());
        $dotenv->load();
        $config = new \Avalara\SDK\Configuration();
        // Configure logger
        $logger = new Logger('DocumentsLogger');
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../../app.log', Logger::DEBUG));
        // Setup log options
        $logOptions = new \Avalara\SDK\Utils\LogOptions(true, $logger);
        $config->setBearerToken(getenv('BEARER_TOKEN'));
        $config->appName='testApplication';
        $config->appVersion='2.1.2';
        $config->machineName='localhost';
        $config->environment='sandbox';  
        $config->setLogOptions($logOptions);

        self::$client =  new \Avalara\SDK\ApiClient($config);
    }

    public function testGetDocumentsList()
    {
        $apiInstance = new \Avalara\SDK\API\EInvoicing\V1\DocumentsApi(self::$client);


        $request_options = new \Avalara\SDK\API\EInvoicing\V1\GetDocumentListRequest();

        try {
            $result=$apiInstance->getDocumentListAsync($request_options);
            $result->then(
                function($response) {
                    $this->assertNotNull($response);
                    print_r($response);
                },
                function(\Exception $e){
                    echo $e;
                    echo 'Exception : ', $e->getMessage(), PHP_EOL;
                    echo 'Exception Response Body: ', $e->getResponseBody(), PHP_EOL;
                }
            );
            //  Tick the promise queue to trigger the callback
            $result->wait();
            \GuzzleHttp\Promise\queue();
        }
        catch (Exception $e) {
            echo $e;
            echo 'Exception : ', $e->getMessage(), PHP_EOL;
        }
    }
}