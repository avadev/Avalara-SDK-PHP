<?php

namespace Avalara\SDK\Test\Integration;

use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Avalara\SDK\Configuration;
use Avalara\SDK\ApiClient;
use Avalara\SDK\Utils\LogOptions;
use Avalara\SDK\API\A1099\V2\Issuers1099Api;
use Avalara\SDK\API\A1099\V2\CompaniesW9Api;
use Avalara\SDK\API\A1099\V2\Forms1099Api;
use Avalara\SDK\API\A1099\V2\GetIssuersRequestSdk;
use Avalara\SDK\API\A1099\V2\GetCompaniesRequestSdk;
use Avalara\SDK\API\A1099\V2\List1099FormsRequestSdk;

class A1099Test extends TestCase
{
    private static $client;

    public static function setUpBeforeClass(): void
    {
        $dotenv = Dotenv::createUnsafeImmutable(getcwd());
        $dotenv->load();

        $config = new Configuration();

        $logger = new Logger('A1099Logger');
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../../app.log', Logger::DEBUG));
        $logOptions = new LogOptions(true, $logger);
        echo getenv('BEARER_TOKEN_A1099');
        $config->setBearerToken(getenv('BEARER_TOKEN_A1099'));
        $config->appName = 'testApplication';
        $config->appVersion = '1.0';
        $config->machineName = 'localhost';
        $config->environment = 'sandbox';
        $config->setLogOptions($logOptions);

        self::$client = new ApiClient($config);
    }

    public function testGetIssuers()
    {
        $apiInstance = new Issuers1099Api(self::$client);
        $request = new GetIssuersRequestSdk();
        $request->setAvalaraVersion('2.0');
        $request->setXCorrelationId("2bbbed41-2466-4cf6-9cca-a3258bdc8eba");
        $request->setTop(10);
        $request->setSkip(0);

        try {
            $promise = $apiInstance->getIssuersAsync($request);
            $promise->then(
                function($response) {
                    $this->assertNotNull($response);
                    $this->assertNotNull($response->getValue());
                },
                function(\Exception $e) {
                    $this->fail($e->getMessage());
                }
            );
            $promise->wait();
            \GuzzleHttp\Promise\queue();
        } catch (\Exception $e) {
            // If it’s an ApiException, we can drill into the HTTP details
            if ($e instanceof \Avalara\SDK\ApiException) {
                // HTTP status code (e.g. 400)
                $statusCode = $e->getCode();
                // The raw response body (usually JSON)
                $body       = $e->getResponseBody();
                // Any response headers you care about
                $headers    = $e->getResponseHeaders();

                // Log or echo for debugging
                $this->fail(
                    "API Exception:\n" .
                    "Status code: {$statusCode}\n" .
                    "Headers: " . json_encode($headers) . "\n" .
                    "Body: {$body}"
                );
            }

            // Fallback for truly unexpected exceptions
            $this->fail($e->getMessage());
        }
    }

    public function testGetCompanies()
    {
        $apiInstance = new CompaniesW9Api(self::$client);
        $request = new GetCompaniesRequestSdk();
        $request->setAvalaraVersion('2.0');
        $request->setXCorrelationId("2bbbed41-2466-4cf6-9cca-a3258bdc8eba");
        $request->setTop(10);
        $request->setSkip(0);

        try {
            $promise = $apiInstance->getCompaniesAsync($request);
            $promise->then(
                function($response) {
                    $this->assertNotNull($response);
                    $this->assertNotNull($response->getValue());
                },
                function(\Exception $e) {
                    $this->fail($e->getMessage());
                }
            );
            $promise->wait();
            \GuzzleHttp\Promise\queue();
        } catch (\Exception $e) {
            // If it’s an ApiException, we can drill into the HTTP details
            if ($e instanceof \Avalara\SDK\ApiException) {
                // HTTP status code (e.g. 400)
                $statusCode = $e->getCode();
                // The raw response body (usually JSON)
                $body       = $e->getResponseBody();
                // Any response headers you care about
                $headers    = $e->getResponseHeaders();

                // Log or echo for debugging
                $this->fail(
                    "API Exception:\n" .
                    "Status code: {$statusCode}\n" .
                    "Headers: " . json_encode($headers) . "\n" .
                    "Body: {$body}"
                );
            }

            // Fallback for truly unexpected exceptions
            $this->fail($e->getMessage());
        }
    }

    public function testList1099Forms()
    {
        $apiInstance = new Forms1099Api(self::$client);
        $request = new List1099FormsRequestSdk();
        $request->setAvalaraVersion('2.0');
        $request->setXCorrelationId("2bbbed41-2466-4cf6-9cca-a3258bdc8eba");
        $request->setTop(10);
        $request->setSkip(0);
        
        try {
            $promise = $apiInstance->list1099FormsAsync($request);
            $promise->then(
                function($response) {
                    $this->assertNotNull($response);
                    $this->assertNotNull($response->getData());
                },
                function(\Exception $e) {
                    $this->fail($e->getMessage());
                }
            );
            $promise->wait();
            \GuzzleHttp\Promise\queue();
        } catch (\Exception $e) {
            // If it’s an ApiException, we can drill into the HTTP details
            if ($e instanceof \Avalara\SDK\ApiException) {
                // HTTP status code (e.g. 400)
                $statusCode = $e->getCode();
                // The raw response body (usually JSON)
                $body       = $e->getResponseBody();
                // Any response headers you care about
                $headers    = $e->getResponseHeaders();

                // Log or echo for debugging
                $this->fail(
                    "API Exception:\n" .
                    "Status code: {$statusCode}\n" .
                    "Headers: " . json_encode($headers) . "\n" .
                    "Body: {$body}"
                );
            }

            // Fallback for truly unexpected exceptions
            $this->fail($e->getMessage());
        }
    }
}
