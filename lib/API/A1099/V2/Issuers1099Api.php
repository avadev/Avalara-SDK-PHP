<?php
/**
 * Issuers1099Api
 * PHP version 7.3
 *
 * @category Class
 */

/*
 * AvaTax Software Development Kit for PHP
 *
 * (c) 2004-2025 Avalara, Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Avalara 1099 & W-9 API Definition
 *
 * ## 🔐 Authentication  Generate a **license key** from: *[Avalara Portal](https://www.avalara.com/us/en/signin.html) → Settings → License and API Keys*.  [More on authentication methods](https://developer.avalara.com/avatax-dm-combined-erp/common-setup/authentication/authentication-methods/)  [Test your credentials](https://developer.avalara.com/avatax/test-credentials/)  ## 📘 API & SDK Documentation  [Avalara SDK (.NET) on GitHub](https://github.com/avadev/Avalara-SDK-DotNet#avalarasdk--the-unified-c-library-for-next-gen-avalara-services)  [Code Examples – 1099 API](https://github.com/avadev/Avalara-SDK-DotNet/blob/main/docs/A1099/V2/Class1099IssuersApi.md#call1099issuersget)
 *
 * @category   Avalara client libraries
 * @package    Avalara\SDK\API\A1099\V2
 * @author     Sachin Baijal <sachin.baijal@avalara.com>
 * @author     Jonathan Wenger <jonathan.wenger@avalara.com>
 * @copyright  2004-2025 Avalara, Inc.
 * @license    https://www.apache.org/licenses/LICENSE-2.0
 * @link       https://github.com/avadev/AvaTax-REST-V3-PHP-SDK

 */



namespace Avalara\SDK\API\A1099\V2;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Avalara\SDK\ApiClient;
use Avalara\SDK\ApiException;
use Avalara\SDK\Configuration;
use Avalara\SDK\HeaderSelector;
use Avalara\SDK\ObjectSerializer;
use Avalara\SDK\Utils\LogObject;

class Issuers1099Api
{
    /**
     * @var ApiClient
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ApiClient $client
     */
    public function __construct(ApiClient $client  )
	{
        $this->setConfiguration($client); 
    }
	
	/**
     * Set APIClient Configuration
     *
     * @param APIClient $client 
     */
    private function setConfiguration($client): void
    {
        $this->verifyAPIClient($client);
        $client->setSdkVersion("25.8.1");
        $this->headerSelector = new HeaderSelector(); 
        $this->client = $client;
    }
	
	/**
     * Verify APIClient object
     *
     * @param int $client 
     */
    private function verifyAPIClient($client): void
    {
        if (is_null($client)){
            throw new ApiException("APIClient not defined");
        }
    }
	
	
    /**
     * Set the HeaderSelector
     *
     * @param HeaderSelector $selector   (required)
     */
    public function setHeaderSelector($selector): void
    {
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->client->config;
    }

    /**
     * Operation createIssuer
     *
     * Create an issuer
     *
     * @param CreateIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\A1099\V2\IssuerResponse|\Avalara\SDK\Model\A1099\V2\ErrorResponse|string
     */
    public function createIssuer($request_parameters)
    {
        list($response) = $this->createIssuerWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation createIssuerWithHttpInfo
     *
     * Create an issuer
     *
     * @param CreateIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\A1099\V2\IssuerResponse|\Avalara\SDK\Model\A1099\V2\ErrorResponse|string, HTTP status code, HTTP response headers (array of strings)
     */
    public function createIssuerWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->createIssuerRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->createIssuerWithHttpInfo($request_parameters, true);
                    return $response;
                }
                $logObject->populateErrorInfo($e->getResponse());
                $this->client->logger->error(json_encode($logObject));
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                $logObject->populateErrorMessage($e->getCode(), $e->getMessage());
                $this->client->logger->error(json_encode($logObject));
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }         
            
            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 201:
                    if ('\Avalara\SDK\Model\A1099\V2\IssuerResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\A1099\V2\IssuerResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Avalara\SDK\Model\A1099\V2\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\A1099\V2\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('string' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, 'string', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\A1099\V2\IssuerResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }
            $logObject->populateResponseInfo($content, $response);
            $this->client->logger->info(json_encode($logObject));
            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\A1099\V2\IssuerResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\A1099\V2\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createIssuerAsync
     *
     * Create an issuer
     *
     * @param CreateIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createIssuerAsync($request_parameters)
    {
        return $this->createIssuerAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createIssuerAsyncWithHttpInfo
     *
     * Create an issuer
     *
     * @param CreateIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createIssuerAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\A1099\V2\IssuerResponse';
        $request = $this->createIssuerRequest($request_parameters);
        $logObject->populateRequestInfo($request);
        return $this->client
            ->send_async($request, [])
            ->then(
                function ($response) use ($returnType, $logObject) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) use ($request_parameters, $isRetry, $request, $logObject) {
                    //OAuth2 Scopes
                    $requiredScopes = "";
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                        $this->client->refreshAuthToken($request->getHeaders(), $requiredScopes);
                        return $this->createIssuerAsyncWithHttpInfo($request_parameters, true)
                            ->then(
                                function ($response) {
                                    return $response[0];
                                }
                            );
                    }
                    $logObject->populateErrorInfo($response);
                    $this->client->logger->error(json_encode($logObject));
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createIssuer'
     *
     * @param CreateIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createIssuerRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $x_correlation_id = $request_parameters->getXCorrelationId();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $issuer_command = $request_parameters->getIssuerCommand();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling createIssuer'
            );
        }

        $resourcePath = '/1099/issuers';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($avalara_version !== null) {
            $headerParams['avalara-version'] = ObjectSerializer::toHeaderValue($avalara_version);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-Id'] = ObjectSerializer::toHeaderValue($x_correlation_id);
        }
        // header params
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json', 'text/json', 'application/*+json']
            );
        }
        $clientId="{$this->client->config->getAppName()}; {$this->client->config->getAppVersion()}; PhpRestClient; 25.8.1; {$this->client->config->getMachineName()}";

        $headers['X-Avalara-Client']=$clientId;

        // for model (json/xml)
        if (isset($issuer_command)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($issuer_command));
            } else {
                $httpBody = $issuer_command;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        $headers = $this->client->applyAuthToRequest($headers, $requiredScopes);

        $defaultHeaders = [];
        
        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        $baseUrl = $this->client->config->getBasePath('A1099');
        return new Request(
            'POST',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteIssuer
     *
     * Delete an issuer
     *
     * @param DeleteIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteIssuer($request_parameters)
    {
        $this->deleteIssuerWithHttpInfo($request_parameters);
    }

    /**
     * Operation deleteIssuerWithHttpInfo
     *
     * Delete an issuer
     *
     * @param DeleteIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteIssuerWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->deleteIssuerRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    $this->deleteIssuerWithHttpInfo($request_parameters, true);
                }
                $logObject->populateErrorInfo($e->getResponse());
                $this->client->logger->error(json_encode($logObject));
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                $logObject->populateErrorMessage($e->getCode(), $e->getMessage());
                $this->client->logger->error(json_encode($logObject));
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }         
            
            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\A1099\V2\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteIssuerAsync
     *
     * Delete an issuer
     *
     * @param DeleteIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteIssuerAsync($request_parameters)
    {
        return $this->deleteIssuerAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteIssuerAsyncWithHttpInfo
     *
     * Delete an issuer
     *
     * @param DeleteIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteIssuerAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '';
        $request = $this->deleteIssuerRequest($request_parameters);
        $logObject->populateRequestInfo($request);
        return $this->client
            ->send_async($request, [])
            ->then(
                function ($response) use ($returnType, $logObject) {
                    $this->client->logger->info(json_encode($logObject));
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) use ($request_parameters, $isRetry, $request, $logObject) {
                    //OAuth2 Scopes
                    $requiredScopes = "";
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                        $this->client->refreshAuthToken($request->getHeaders(), $requiredScopes);
                        return $this->deleteIssuerAsyncWithHttpInfo($request_parameters, true)
                            ->then(
                                function ($response) {
                                    return $response[0];
                                }
                            );
                    }
                    $logObject->populateErrorInfo($response);
                    $this->client->logger->error(json_encode($logObject));
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'deleteIssuer'
     *
     * @param DeleteIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteIssuerRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $id = $request_parameters->getId();
        $avalara_version = $request_parameters->getAvalaraVersion();
        $x_correlation_id = $request_parameters->getXCorrelationId();
        $x_avalara_client = $request_parameters->getXAvalaraClient();

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling deleteIssuer'
            );
        }
        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling deleteIssuer'
            );
        }

        $resourcePath = '/1099/issuers/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($avalara_version !== null) {
            $headerParams['avalara-version'] = ObjectSerializer::toHeaderValue($avalara_version);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-Id'] = ObjectSerializer::toHeaderValue($x_correlation_id);
        }
        // header params
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }
        $clientId="{$this->client->config->getAppName()}; {$this->client->config->getAppVersion()}; PhpRestClient; 25.8.1; {$this->client->config->getMachineName()}";

        $headers['X-Avalara-Client']=$clientId;

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        $headers = $this->client->applyAuthToRequest($headers, $requiredScopes);

        $defaultHeaders = [];
        
        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        $baseUrl = $this->client->config->getBasePath('A1099');
        return new Request(
            'DELETE',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getIssuer
     *
     * Retrieve an issuer
     *
     * @param GetIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\A1099\V2\IssuerResponse|\Avalara\SDK\Model\A1099\V2\ErrorResponse|string
     */
    public function getIssuer($request_parameters)
    {
        list($response) = $this->getIssuerWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation getIssuerWithHttpInfo
     *
     * Retrieve an issuer
     *
     * @param GetIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\A1099\V2\IssuerResponse|\Avalara\SDK\Model\A1099\V2\ErrorResponse|string, HTTP status code, HTTP response headers (array of strings)
     */
    public function getIssuerWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->getIssuerRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->getIssuerWithHttpInfo($request_parameters, true);
                    return $response;
                }
                $logObject->populateErrorInfo($e->getResponse());
                $this->client->logger->error(json_encode($logObject));
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                $logObject->populateErrorMessage($e->getCode(), $e->getMessage());
                $this->client->logger->error(json_encode($logObject));
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }         
            
            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Avalara\SDK\Model\A1099\V2\IssuerResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\A1099\V2\IssuerResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Avalara\SDK\Model\A1099\V2\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\A1099\V2\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('string' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, 'string', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\A1099\V2\IssuerResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }
            $logObject->populateResponseInfo($content, $response);
            $this->client->logger->info(json_encode($logObject));
            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\A1099\V2\IssuerResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\A1099\V2\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getIssuerAsync
     *
     * Retrieve an issuer
     *
     * @param GetIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getIssuerAsync($request_parameters)
    {
        return $this->getIssuerAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getIssuerAsyncWithHttpInfo
     *
     * Retrieve an issuer
     *
     * @param GetIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getIssuerAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\A1099\V2\IssuerResponse';
        $request = $this->getIssuerRequest($request_parameters);
        $logObject->populateRequestInfo($request);
        return $this->client
            ->send_async($request, [])
            ->then(
                function ($response) use ($returnType, $logObject) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) use ($request_parameters, $isRetry, $request, $logObject) {
                    //OAuth2 Scopes
                    $requiredScopes = "";
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                        $this->client->refreshAuthToken($request->getHeaders(), $requiredScopes);
                        return $this->getIssuerAsyncWithHttpInfo($request_parameters, true)
                            ->then(
                                function ($response) {
                                    return $response[0];
                                }
                            );
                    }
                    $logObject->populateErrorInfo($response);
                    $this->client->logger->error(json_encode($logObject));
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getIssuer'
     *
     * @param GetIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getIssuerRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $id = $request_parameters->getId();
        $avalara_version = $request_parameters->getAvalaraVersion();
        $x_correlation_id = $request_parameters->getXCorrelationId();
        $x_avalara_client = $request_parameters->getXAvalaraClient();

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getIssuer'
            );
        }
        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling getIssuer'
            );
        }

        $resourcePath = '/1099/issuers/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($avalara_version !== null) {
            $headerParams['avalara-version'] = ObjectSerializer::toHeaderValue($avalara_version);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-Id'] = ObjectSerializer::toHeaderValue($x_correlation_id);
        }
        // header params
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }
        $clientId="{$this->client->config->getAppName()}; {$this->client->config->getAppVersion()}; PhpRestClient; 25.8.1; {$this->client->config->getMachineName()}";

        $headers['X-Avalara-Client']=$clientId;

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        $headers = $this->client->applyAuthToRequest($headers, $requiredScopes);

        $defaultHeaders = [];
        
        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        $baseUrl = $this->client->config->getBasePath('A1099');
        return new Request(
            'GET',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getIssuers
     *
     * List issuers
     *
     * @param GetIssuersRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelIssuerResponse|\Avalara\SDK\Model\A1099\V2\ErrorResponse|\Avalara\SDK\Model\A1099\V2\ErrorResponse|\Avalara\SDK\Model\A1099\V2\ErrorResponse|string
     */
    public function getIssuers($request_parameters)
    {
        list($response) = $this->getIssuersWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation getIssuersWithHttpInfo
     *
     * List issuers
     *
     * @param GetIssuersRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelIssuerResponse|\Avalara\SDK\Model\A1099\V2\ErrorResponse|\Avalara\SDK\Model\A1099\V2\ErrorResponse|\Avalara\SDK\Model\A1099\V2\ErrorResponse|string, HTTP status code, HTTP response headers (array of strings)
     */
    public function getIssuersWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->getIssuersRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->getIssuersWithHttpInfo($request_parameters, true);
                    return $response;
                }
                $logObject->populateErrorInfo($e->getResponse());
                $this->client->logger->error(json_encode($logObject));
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                $logObject->populateErrorMessage($e->getCode(), $e->getMessage());
                $this->client->logger->error(json_encode($logObject));
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }         
            
            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelIssuerResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelIssuerResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Avalara\SDK\Model\A1099\V2\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\A1099\V2\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\Avalara\SDK\Model\A1099\V2\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\A1099\V2\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Avalara\SDK\Model\A1099\V2\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\A1099\V2\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('string' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, 'string', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelIssuerResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }
            $logObject->populateResponseInfo($content, $response);
            $this->client->logger->info(json_encode($logObject));
            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelIssuerResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\A1099\V2\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\A1099\V2\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\A1099\V2\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getIssuersAsync
     *
     * List issuers
     *
     * @param GetIssuersRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getIssuersAsync($request_parameters)
    {
        return $this->getIssuersAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getIssuersAsyncWithHttpInfo
     *
     * List issuers
     *
     * @param GetIssuersRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getIssuersAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelIssuerResponse';
        $request = $this->getIssuersRequest($request_parameters);
        $logObject->populateRequestInfo($request);
        return $this->client
            ->send_async($request, [])
            ->then(
                function ($response) use ($returnType, $logObject) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) use ($request_parameters, $isRetry, $request, $logObject) {
                    //OAuth2 Scopes
                    $requiredScopes = "";
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                        $this->client->refreshAuthToken($request->getHeaders(), $requiredScopes);
                        return $this->getIssuersAsyncWithHttpInfo($request_parameters, true)
                            ->then(
                                function ($response) {
                                    return $response[0];
                                }
                            );
                    }
                    $logObject->populateErrorInfo($response);
                    $this->client->logger->error(json_encode($logObject));
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getIssuers'
     *
     * @param GetIssuersRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getIssuersRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $filter = $request_parameters->getFilter();
        $top = $request_parameters->getTop();
        $skip = $request_parameters->getSkip();
        $order_by = $request_parameters->getOrderBy();
        $count = $request_parameters->getCount();
        $count_only = $request_parameters->getCountOnly();
        $x_correlation_id = $request_parameters->getXCorrelationId();
        $x_avalara_client = $request_parameters->getXAvalaraClient();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling getIssuers'
            );
        }

        $resourcePath = '/1099/issuers';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($filter !== null) {
            if('form' === 'form' && is_array($filter)) {
                foreach($filter as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['$filter'] = $filter;
            }
        }
        // query params
        if ($top !== null) {
            if('form' === 'form' && is_array($top)) {
                foreach($top as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['$top'] = $top;
            }
        }
        // query params
        if ($skip !== null) {
            if('form' === 'form' && is_array($skip)) {
                foreach($skip as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['$skip'] = $skip;
            }
        }
        // query params
        if ($order_by !== null) {
            if('form' === 'form' && is_array($order_by)) {
                foreach($order_by as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['$orderBy'] = $order_by;
            }
        }
        // query params
        if ($count !== null) {
            if('form' === 'form' && is_array($count)) {
                foreach($count as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['count'] = $count;
            }
        }
        // query params
        if ($count_only !== null) {
            if('form' === 'form' && is_array($count_only)) {
                foreach($count_only as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['countOnly'] = $count_only;
            }
        }

        // header params
        if ($avalara_version !== null) {
            $headerParams['avalara-version'] = ObjectSerializer::toHeaderValue($avalara_version);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-Id'] = ObjectSerializer::toHeaderValue($x_correlation_id);
        }
        // header params
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }
        $clientId="{$this->client->config->getAppName()}; {$this->client->config->getAppVersion()}; PhpRestClient; 25.8.1; {$this->client->config->getMachineName()}";

        $headers['X-Avalara-Client']=$clientId;

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        $headers = $this->client->applyAuthToRequest($headers, $requiredScopes);

        $defaultHeaders = [];
        
        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        $baseUrl = $this->client->config->getBasePath('A1099');
        return new Request(
            'GET',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateIssuer
     *
     * Update an issuer
     *
     * @param UpdateIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function updateIssuer($request_parameters)
    {
        $this->updateIssuerWithHttpInfo($request_parameters);
    }

    /**
     * Operation updateIssuerWithHttpInfo
     *
     * Update an issuer
     *
     * @param UpdateIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateIssuerWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->updateIssuerRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    $this->updateIssuerWithHttpInfo($request_parameters, true);
                }
                $logObject->populateErrorInfo($e->getResponse());
                $this->client->logger->error(json_encode($logObject));
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                $logObject->populateErrorMessage($e->getCode(), $e->getMessage());
                $this->client->logger->error(json_encode($logObject));
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }         
            
            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\A1099\V2\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateIssuerAsync
     *
     * Update an issuer
     *
     * @param UpdateIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateIssuerAsync($request_parameters)
    {
        return $this->updateIssuerAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateIssuerAsyncWithHttpInfo
     *
     * Update an issuer
     *
     * @param UpdateIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateIssuerAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '';
        $request = $this->updateIssuerRequest($request_parameters);
        $logObject->populateRequestInfo($request);
        return $this->client
            ->send_async($request, [])
            ->then(
                function ($response) use ($returnType, $logObject) {
                    $this->client->logger->info(json_encode($logObject));
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) use ($request_parameters, $isRetry, $request, $logObject) {
                    //OAuth2 Scopes
                    $requiredScopes = "";
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                        $this->client->refreshAuthToken($request->getHeaders(), $requiredScopes);
                        return $this->updateIssuerAsyncWithHttpInfo($request_parameters, true)
                            ->then(
                                function ($response) {
                                    return $response[0];
                                }
                            );
                    }
                    $logObject->populateErrorInfo($response);
                    $this->client->logger->error(json_encode($logObject));
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateIssuer'
     *
     * @param UpdateIssuerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updateIssuerRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $id = $request_parameters->getId();
        $avalara_version = $request_parameters->getAvalaraVersion();
        $x_correlation_id = $request_parameters->getXCorrelationId();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $issuer_command = $request_parameters->getIssuerCommand();

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling updateIssuer'
            );
        }
        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling updateIssuer'
            );
        }

        $resourcePath = '/1099/issuers/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($avalara_version !== null) {
            $headerParams['avalara-version'] = ObjectSerializer::toHeaderValue($avalara_version);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-Id'] = ObjectSerializer::toHeaderValue($x_correlation_id);
        }
        // header params
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json', 'text/json', 'application/*+json']
            );
        }
        $clientId="{$this->client->config->getAppName()}; {$this->client->config->getAppVersion()}; PhpRestClient; 25.8.1; {$this->client->config->getMachineName()}";

        $headers['X-Avalara-Client']=$clientId;

        // for model (json/xml)
        if (isset($issuer_command)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($issuer_command));
            } else {
                $httpBody = $issuer_command;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        $headers = $this->client->applyAuthToRequest($headers, $requiredScopes);

        $defaultHeaders = [];
        
        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        $baseUrl = $this->client->config->getBasePath('A1099');
        return new Request(
            'PUT',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

}
    /**
     * Represents the Request object for the CreateIssuer API
     *
     * @param  string $avalara_version API version (required)
     * @param  string $x_correlation_id Unique correlation Id in a GUID format (optional)
     * @param  string $x_avalara_client Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . (optional)
     * @param  \Avalara\SDK\Model\A1099\V2\IssuerCommand $issuer_command The issuer to create (optional)
     */
class CreateIssuerRequestSdk {
    private $avalara_version;
    private $x_correlation_id;
    private $x_avalara_client;
    private $issuer_command;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '2.0';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getIssuerCommand() {
        return $this->issuer_command;
    }

    public function setIssuerCommand($issuer_command) {
        $this->issuer_command = $issuer_command;
    }
}

    /**
     * Represents the Request object for the DeleteIssuer API
     *
     * @param  string $id Id of the issuer to delete (required)
     * @param  string $avalara_version API version (required)
     * @param  string $x_correlation_id Unique correlation Id in a GUID format (optional)
     * @param  string $x_avalara_client Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . (optional)
     */
class DeleteIssuerRequestSdk {
    private $id;
    private $avalara_version;
    private $x_correlation_id;
    private $x_avalara_client;

    public function __construct() {
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '2.0';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
}

    /**
     * Represents the Request object for the GetIssuer API
     *
     * @param  string $id Id of the issuer to retrieve (required)
     * @param  string $avalara_version API version (required)
     * @param  string $x_correlation_id Unique correlation Id in a GUID format (optional)
     * @param  string $x_avalara_client Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . (optional)
     */
class GetIssuerRequestSdk {
    private $id;
    private $avalara_version;
    private $x_correlation_id;
    private $x_avalara_client;

    public function __construct() {
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '2.0';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
}

    /**
     * Represents the Request object for the GetIssuers API
     *
     * @param  string $avalara_version API version (required)
     * @param  string $filter A filter statement to identify specific records to retrieve.  For more information on filtering, see &lt;a href&#x3D;\&quot;https://developer.avalara.com/avatax/filtering-in-rest/\&quot;&gt;Filtering in REST&lt;/a&gt;. (optional)
     * @param  int $top If zero or greater than 1000, return at most 1000 results.  Otherwise, return this number of results.  Used with skip to provide pagination for large datasets. (optional)
     * @param  int $skip If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets. (optional)
     * @param  string $order_by A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC. (optional)
     * @param  bool $count If true, return the global count of elements in the collection. (optional)
     * @param  bool $count_only If true, return ONLY the global count of elements in the collection.  It only applies when count&#x3D;true. (optional)
     * @param  string $x_correlation_id Unique correlation Id in a GUID format (optional)
     * @param  string $x_avalara_client Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . (optional)
     */
class GetIssuersRequestSdk {
    private $avalara_version;
    private $filter;
    private $top;
    private $skip;
    private $order_by;
    private $count;
    private $count_only;
    private $x_correlation_id;
    private $x_avalara_client;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '2.0';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getFilter() {
        return $this->filter;
    }

    public function setFilter($filter) {
        $this->filter = $filter;
    }
    public function getTop() {
        return $this->top;
    }

    public function setTop($top) {
        $this->top = $top;
    }
    public function getSkip() {
        return $this->skip;
    }

    public function setSkip($skip) {
        $this->skip = $skip;
    }
    public function getOrderBy() {
        return $this->order_by;
    }

    public function setOrderBy($order_by) {
        $this->order_by = $order_by;
    }
    public function getCount() {
        return $this->count;
    }

    public function setCount($count) {
        $this->count = $count;
    }
    public function getCountOnly() {
        return $this->count_only;
    }

    public function setCountOnly($count_only) {
        $this->count_only = $count_only;
    }
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
}

    /**
     * Represents the Request object for the UpdateIssuer API
     *
     * @param  string $id Id of the issuer to update (required)
     * @param  string $avalara_version API version (required)
     * @param  string $x_correlation_id Unique correlation Id in a GUID format (optional)
     * @param  string $x_avalara_client Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . (optional)
     * @param  \Avalara\SDK\Model\A1099\V2\IssuerCommand $issuer_command The issuer to update (optional)
     */
class UpdateIssuerRequestSdk {
    private $id;
    private $avalara_version;
    private $x_correlation_id;
    private $x_avalara_client;
    private $issuer_command;

    public function __construct() {
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '2.0';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getIssuerCommand() {
        return $this->issuer_command;
    }

    public function setIssuerCommand($issuer_command) {
        $this->issuer_command = $issuer_command;
    }
}

