<?php
/**
 * TradingPartnersApi
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
 * Avalara E-Invoicing API
 *
 * An API that supports sending data for an E-Invoicing compliance use-case.
 *
 * @category   Avalara client libraries
 * @package    Avalara\SDK\API\EInvoicing\V1
 * @author     Sachin Baijal <sachin.baijal@avalara.com>
 * @author     Jonathan Wenger <jonathan.wenger@avalara.com>
 * @copyright  2004-2025 Avalara, Inc.
 * @license    https://www.apache.org/licenses/LICENSE-2.0
 * @link       https://github.com/avadev/AvaTax-REST-V3-PHP-SDK

 */



namespace Avalara\SDK\API\EInvoicing\V1;

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

class TradingPartnersApi
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
        $client->setSdkVersion("25.11.1");
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
     * Operation batchSearchParticipants
     *
     * Handles batch search requests by uploading a file containing search parameters.
     *
     * @param BatchSearchParticipantsRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\EInvoicing\V1\BatchSearchParticipants202Response|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse
     */
    public function batchSearchParticipants($request_parameters)
    {
        list($response) = $this->batchSearchParticipantsWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation batchSearchParticipantsWithHttpInfo
     *
     * Handles batch search requests by uploading a file containing search parameters.
     *
     * @param BatchSearchParticipantsRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\EInvoicing\V1\BatchSearchParticipants202Response|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function batchSearchParticipantsWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->batchSearchParticipantsRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->batchSearchParticipantsWithHttpInfo($request_parameters, true);
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
                case 202:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\BatchSearchParticipants202Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\BatchSearchParticipants202Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\EInvoicing\V1\BatchSearchParticipants202Response';
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
                case 202:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\BatchSearchParticipants202Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation batchSearchParticipantsAsync
     *
     * Handles batch search requests by uploading a file containing search parameters.
     *
     * @param BatchSearchParticipantsRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function batchSearchParticipantsAsync($request_parameters)
    {
        return $this->batchSearchParticipantsAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation batchSearchParticipantsAsyncWithHttpInfo
     *
     * Handles batch search requests by uploading a file containing search parameters.
     *
     * @param BatchSearchParticipantsRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function batchSearchParticipantsAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\EInvoicing\V1\BatchSearchParticipants202Response';
        $request = $this->batchSearchParticipantsRequest($request_parameters);
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
                        return $this->batchSearchParticipantsAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'batchSearchParticipants'
     *
     * @param BatchSearchParticipantsRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function batchSearchParticipantsRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $name = $request_parameters->getName();
        $notification_email = $request_parameters->getNotificationEmail();
        $file = $request_parameters->getFile();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $x_correlation_id = $request_parameters->getXCorrelationId();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling batchSearchParticipants'
            );
        }
        // verify the required parameter 'name' is set
        if ($name === null || (is_array($name) && count($name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling batchSearchParticipants'
            );
        }
        // verify the required parameter 'notification_email' is set
        if ($notification_email === null || (is_array($notification_email) && count($notification_email) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $notification_email when calling batchSearchParticipants'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling batchSearchParticipants'
            );
        }

        $resourcePath = '/einvoicing/trading-partners/batch-searches';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($name !== null) {
            if('form' === 'form' && is_array($name)) {
                foreach($name as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['name'] = $name;
            }
        }
        // query params
        if ($notification_email !== null) {
            if('form' === 'form' && is_array($notification_email)) {
                foreach($notification_email as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['notificationEmail'] = $notification_email;
            }
        }

        // header params
        if ($avalara_version !== null) {
            $headerParams['avalara-version'] = ObjectSerializer::toHeaderValue($avalara_version);
        }
        // header params
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-ID'] = ObjectSerializer::toHeaderValue($x_correlation_id);
        }


        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = [];
            $paramFiles = is_array($file) ? $file : [$file];
            foreach ($paramFiles as $paramFile) {
                $formParams['file'][] = \GuzzleHttp\Psr7\Utils::tryFopen(
                    ObjectSerializer::toFormValue($paramFile),
                    'rb'
                );
            }
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['multipart/form-data']
            );
        }
        
        $this->client->applyClientHeaders($headerParams);

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
        $baseUrl = $this->client->config->getBasePath('EInvoicing');
        return new Request(
            'POST',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createTradingPartner
     *
     * Creates a new trading partner.
     *
     * @param CreateTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartner201Response|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse
     */
    public function createTradingPartner($request_parameters)
    {
        list($response) = $this->createTradingPartnerWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation createTradingPartnerWithHttpInfo
     *
     * Creates a new trading partner.
     *
     * @param CreateTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartner201Response|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createTradingPartnerWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->createTradingPartnerRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->createTradingPartnerWithHttpInfo($request_parameters, true);
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
                    if ('\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartner201Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartner201Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 409:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartner201Response';
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
                        '\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartner201Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createTradingPartnerAsync
     *
     * Creates a new trading partner.
     *
     * @param CreateTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTradingPartnerAsync($request_parameters)
    {
        return $this->createTradingPartnerAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createTradingPartnerAsyncWithHttpInfo
     *
     * Creates a new trading partner.
     *
     * @param CreateTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTradingPartnerAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartner201Response';
        $request = $this->createTradingPartnerRequest($request_parameters);
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
                        return $this->createTradingPartnerAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'createTradingPartner'
     *
     * @param CreateTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createTradingPartnerRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $trading_partner = $request_parameters->getTradingPartner();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $x_correlation_id = $request_parameters->getXCorrelationId();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling createTradingPartner'
            );
        }
        // verify the required parameter 'trading_partner' is set
        if ($trading_partner === null || (is_array($trading_partner) && count($trading_partner) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $trading_partner when calling createTradingPartner'
            );
        }

        $resourcePath = '/einvoicing/trading-partners';
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
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-ID'] = ObjectSerializer::toHeaderValue($x_correlation_id);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }
        
        $this->client->applyClientHeaders($headerParams);

        // for model (json/xml)
        if (isset($trading_partner)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($trading_partner));
            } else {
                $httpBody = $trading_partner;
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
        $baseUrl = $this->client->config->getBasePath('EInvoicing');
        return new Request(
            'POST',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createTradingPartnersBatch
     *
     * Creates a batch of multiple trading partners.
     *
     * @param CreateTradingPartnersBatchRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartnersBatch200Response|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse
     */
    public function createTradingPartnersBatch($request_parameters)
    {
        list($response) = $this->createTradingPartnersBatchWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation createTradingPartnersBatchWithHttpInfo
     *
     * Creates a batch of multiple trading partners.
     *
     * @param CreateTradingPartnersBatchRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartnersBatch200Response|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createTradingPartnersBatchWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->createTradingPartnersBatchRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->createTradingPartnersBatchWithHttpInfo($request_parameters, true);
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
                    if ('\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartnersBatch200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartnersBatch200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 409:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 413:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartnersBatch200Response';
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
                        '\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartnersBatch200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 413:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createTradingPartnersBatchAsync
     *
     * Creates a batch of multiple trading partners.
     *
     * @param CreateTradingPartnersBatchRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTradingPartnersBatchAsync($request_parameters)
    {
        return $this->createTradingPartnersBatchAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createTradingPartnersBatchAsyncWithHttpInfo
     *
     * Creates a batch of multiple trading partners.
     *
     * @param CreateTradingPartnersBatchRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTradingPartnersBatchAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartnersBatch200Response';
        $request = $this->createTradingPartnersBatchRequest($request_parameters);
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
                        return $this->createTradingPartnersBatchAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'createTradingPartnersBatch'
     *
     * @param CreateTradingPartnersBatchRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createTradingPartnersBatchRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $create_trading_partners_batch_request = $request_parameters->getCreateTradingPartnersBatchRequest();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $x_correlation_id = $request_parameters->getXCorrelationId();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling createTradingPartnersBatch'
            );
        }
        // verify the required parameter 'create_trading_partners_batch_request' is set
        if ($create_trading_partners_batch_request === null || (is_array($create_trading_partners_batch_request) && count($create_trading_partners_batch_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_trading_partners_batch_request when calling createTradingPartnersBatch'
            );
        }

        $resourcePath = '/einvoicing/trading-partners/batch';
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
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-ID'] = ObjectSerializer::toHeaderValue($x_correlation_id);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }
        
        $this->client->applyClientHeaders($headerParams);

        // for model (json/xml)
        if (isset($create_trading_partners_batch_request)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($create_trading_partners_batch_request));
            } else {
                $httpBody = $create_trading_partners_batch_request;
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
        $baseUrl = $this->client->config->getBasePath('EInvoicing');
        return new Request(
            'POST',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteTradingPartner
     *
     * Deletes a trading partner using ID.
     *
     * @param DeleteTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteTradingPartner($request_parameters)
    {
        $this->deleteTradingPartnerWithHttpInfo($request_parameters);
    }

    /**
     * Operation deleteTradingPartnerWithHttpInfo
     *
     * Deletes a trading partner using ID.
     *
     * @param DeleteTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteTradingPartnerWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->deleteTradingPartnerRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    $this->deleteTradingPartnerWithHttpInfo($request_parameters, true);
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
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteTradingPartnerAsync
     *
     * Deletes a trading partner using ID.
     *
     * @param DeleteTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteTradingPartnerAsync($request_parameters)
    {
        return $this->deleteTradingPartnerAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteTradingPartnerAsyncWithHttpInfo
     *
     * Deletes a trading partner using ID.
     *
     * @param DeleteTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteTradingPartnerAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '';
        $request = $this->deleteTradingPartnerRequest($request_parameters);
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
                        return $this->deleteTradingPartnerAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'deleteTradingPartner'
     *
     * @param DeleteTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteTradingPartnerRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $id = $request_parameters->getId();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $x_correlation_id = $request_parameters->getXCorrelationId();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling deleteTradingPartner'
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling deleteTradingPartner'
            );
        }

        $resourcePath = '/einvoicing/trading-partners/{id}';
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
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-ID'] = ObjectSerializer::toHeaderValue($x_correlation_id);
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
        
        $this->client->applyClientHeaders($headerParams);

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
        $baseUrl = $this->client->config->getBasePath('EInvoicing');
        return new Request(
            'DELETE',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation downloadBatchSearchReport
     *
     * Downloads batch search results in a csv file.
     *
     * @param DownloadBatchSearchReportRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse
     */
    public function downloadBatchSearchReport($request_parameters)
    {
        list($response) = $this->downloadBatchSearchReportWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation downloadBatchSearchReportWithHttpInfo
     *
     * Downloads batch search results in a csv file.
     *
     * @param DownloadBatchSearchReportRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function downloadBatchSearchReportWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->downloadBatchSearchReportRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->downloadBatchSearchReportWithHttpInfo($request_parameters, true);
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
                    if ('\SplFileObject' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\SplFileObject', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\SplFileObject';
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
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation downloadBatchSearchReportAsync
     *
     * Downloads batch search results in a csv file.
     *
     * @param DownloadBatchSearchReportRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function downloadBatchSearchReportAsync($request_parameters)
    {
        return $this->downloadBatchSearchReportAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation downloadBatchSearchReportAsyncWithHttpInfo
     *
     * Downloads batch search results in a csv file.
     *
     * @param DownloadBatchSearchReportRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function downloadBatchSearchReportAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\SplFileObject';
        $request = $this->downloadBatchSearchReportRequest($request_parameters);
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
                        return $this->downloadBatchSearchReportAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'downloadBatchSearchReport'
     *
     * @param DownloadBatchSearchReportRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function downloadBatchSearchReportRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $id = $request_parameters->getId();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $x_correlation_id = $request_parameters->getXCorrelationId();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling downloadBatchSearchReport'
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling downloadBatchSearchReport'
            );
        }

        $resourcePath = '/einvoicing/trading-partners/batch-searches/{id}/$download-results';
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
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-ID'] = ObjectSerializer::toHeaderValue($x_correlation_id);
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
                ['text/csv', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['text/csv', 'application/json'],
                []
            );
        }
        
        $this->client->applyClientHeaders($headerParams);

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
        $baseUrl = $this->client->config->getBasePath('EInvoicing');
        return new Request(
            'GET',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getBatchSearchDetail
     *
     * Returns the batch search details using ID.
     *
     * @param GetBatchSearchDetailRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\EInvoicing\V1\BatchSearch|\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse
     */
    public function getBatchSearchDetail($request_parameters)
    {
        list($response) = $this->getBatchSearchDetailWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation getBatchSearchDetailWithHttpInfo
     *
     * Returns the batch search details using ID.
     *
     * @param GetBatchSearchDetailRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\EInvoicing\V1\BatchSearch|\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getBatchSearchDetailWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->getBatchSearchDetailRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->getBatchSearchDetailWithHttpInfo($request_parameters, true);
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
                    if ('\Avalara\SDK\Model\EInvoicing\V1\BatchSearch' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\BatchSearch', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\EInvoicing\V1\BatchSearch';
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
                        '\Avalara\SDK\Model\EInvoicing\V1\BatchSearch',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBatchSearchDetailAsync
     *
     * Returns the batch search details using ID.
     *
     * @param GetBatchSearchDetailRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBatchSearchDetailAsync($request_parameters)
    {
        return $this->getBatchSearchDetailAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBatchSearchDetailAsyncWithHttpInfo
     *
     * Returns the batch search details using ID.
     *
     * @param GetBatchSearchDetailRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBatchSearchDetailAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\EInvoicing\V1\BatchSearch';
        $request = $this->getBatchSearchDetailRequest($request_parameters);
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
                        return $this->getBatchSearchDetailAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'getBatchSearchDetail'
     *
     * @param GetBatchSearchDetailRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getBatchSearchDetailRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $id = $request_parameters->getId();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $x_correlation_id = $request_parameters->getXCorrelationId();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling getBatchSearchDetail'
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getBatchSearchDetail'
            );
        }

        $resourcePath = '/einvoicing/trading-partners/batch-searches/{id}';
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
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-ID'] = ObjectSerializer::toHeaderValue($x_correlation_id);
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
        
        $this->client->applyClientHeaders($headerParams);

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
        $baseUrl = $this->client->config->getBasePath('EInvoicing');
        return new Request(
            'GET',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listBatchSearches
     *
     * Lists all batch searches that were previously submitted.
     *
     * @param ListBatchSearchesRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse
     */
    public function listBatchSearches($request_parameters)
    {
        list($response) = $this->listBatchSearchesWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation listBatchSearchesWithHttpInfo
     *
     * Lists all batch searches that were previously submitted.
     *
     * @param ListBatchSearchesRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listBatchSearchesWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->listBatchSearchesRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->listBatchSearchesWithHttpInfo($request_parameters, true);
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
                    if ('\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse';
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
                        '\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listBatchSearchesAsync
     *
     * Lists all batch searches that were previously submitted.
     *
     * @param ListBatchSearchesRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listBatchSearchesAsync($request_parameters)
    {
        return $this->listBatchSearchesAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listBatchSearchesAsyncWithHttpInfo
     *
     * Lists all batch searches that were previously submitted.
     *
     * @param ListBatchSearchesRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listBatchSearchesAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse';
        $request = $this->listBatchSearchesRequest($request_parameters);
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
                        return $this->listBatchSearchesAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'listBatchSearches'
     *
     * @param ListBatchSearchesRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listBatchSearchesRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $filter = $request_parameters->getFilter();
        $count = $request_parameters->getCount();
        $top = $request_parameters->getTop();
        $skip = $request_parameters->getSkip();
        $order_by = $request_parameters->getOrderBy();
        $x_correlation_id = $request_parameters->getXCorrelationId();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling listBatchSearches'
            );
        }

        $resourcePath = '/einvoicing/trading-partners/batch-searches';
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

        // header params
        if ($avalara_version !== null) {
            $headerParams['avalara-version'] = ObjectSerializer::toHeaderValue($avalara_version);
        }
        // header params
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-ID'] = ObjectSerializer::toHeaderValue($x_correlation_id);
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
        
        $this->client->applyClientHeaders($headerParams);

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
        $baseUrl = $this->client->config->getBasePath('EInvoicing');
        return new Request(
            'GET',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation searchParticipants
     *
     * Returns a list of participants matching the input query.
     *
     * @param SearchParticipantsRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\EInvoicing\V1\SearchParticipants200Response|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse
     */
    public function searchParticipants($request_parameters)
    {
        list($response) = $this->searchParticipantsWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation searchParticipantsWithHttpInfo
     *
     * Returns a list of participants matching the input query.
     *
     * @param SearchParticipantsRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\EInvoicing\V1\SearchParticipants200Response|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function searchParticipantsWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->searchParticipantsRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->searchParticipantsWithHttpInfo($request_parameters, true);
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
                    if ('\Avalara\SDK\Model\EInvoicing\V1\SearchParticipants200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\SearchParticipants200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\EInvoicing\V1\SearchParticipants200Response';
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
                        '\Avalara\SDK\Model\EInvoicing\V1\SearchParticipants200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation searchParticipantsAsync
     *
     * Returns a list of participants matching the input query.
     *
     * @param SearchParticipantsRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function searchParticipantsAsync($request_parameters)
    {
        return $this->searchParticipantsAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation searchParticipantsAsyncWithHttpInfo
     *
     * Returns a list of participants matching the input query.
     *
     * @param SearchParticipantsRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function searchParticipantsAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\EInvoicing\V1\SearchParticipants200Response';
        $request = $this->searchParticipantsRequest($request_parameters);
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
                        return $this->searchParticipantsAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'searchParticipants'
     *
     * @param SearchParticipantsRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function searchParticipantsRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $search = $request_parameters->getSearch();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $count = $request_parameters->getCount();
        $filter = $request_parameters->getFilter();
        $top = $request_parameters->getTop();
        $skip = $request_parameters->getSkip();
        $order_by = $request_parameters->getOrderBy();
        $x_correlation_id = $request_parameters->getXCorrelationId();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling searchParticipants'
            );
        }
        // verify the required parameter 'search' is set
        if ($search === null || (is_array($search) && count($search) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $search when calling searchParticipants'
            );
        }

        $resourcePath = '/einvoicing/trading-partners';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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
        if ($search !== null) {
            if('form' === 'form' && is_array($search)) {
                foreach($search as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['$search'] = $search;
            }
        }
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

        // header params
        if ($avalara_version !== null) {
            $headerParams['avalara-version'] = ObjectSerializer::toHeaderValue($avalara_version);
        }
        // header params
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-ID'] = ObjectSerializer::toHeaderValue($x_correlation_id);
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
        
        $this->client->applyClientHeaders($headerParams);

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
        $baseUrl = $this->client->config->getBasePath('EInvoicing');
        return new Request(
            'GET',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateTradingPartner
     *
     * Updates a trading partner using ID.
     *
     * @param UpdateTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\EInvoicing\V1\UpdateTradingPartner200Response|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse
     */
    public function updateTradingPartner($request_parameters)
    {
        list($response) = $this->updateTradingPartnerWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation updateTradingPartnerWithHttpInfo
     *
     * Updates a trading partner using ID.
     *
     * @param UpdateTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\EInvoicing\V1\UpdateTradingPartner200Response|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse|\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateTradingPartnerWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->updateTradingPartnerRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->updateTradingPartnerWithHttpInfo($request_parameters, true);
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
                    if ('\Avalara\SDK\Model\EInvoicing\V1\UpdateTradingPartner200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\UpdateTradingPartner200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 409:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\EInvoicing\V1\UpdateTradingPartner200Response';
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
                        '\Avalara\SDK\Model\EInvoicing\V1\UpdateTradingPartner200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateTradingPartnerAsync
     *
     * Updates a trading partner using ID.
     *
     * @param UpdateTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateTradingPartnerAsync($request_parameters)
    {
        return $this->updateTradingPartnerAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateTradingPartnerAsyncWithHttpInfo
     *
     * Updates a trading partner using ID.
     *
     * @param UpdateTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateTradingPartnerAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\EInvoicing\V1\UpdateTradingPartner200Response';
        $request = $this->updateTradingPartnerRequest($request_parameters);
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
                        return $this->updateTradingPartnerAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'updateTradingPartner'
     *
     * @param UpdateTradingPartnerRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updateTradingPartnerRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $id = $request_parameters->getId();
        $trading_partner = $request_parameters->getTradingPartner();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $x_correlation_id = $request_parameters->getXCorrelationId();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling updateTradingPartner'
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling updateTradingPartner'
            );
        }
        // verify the required parameter 'trading_partner' is set
        if ($trading_partner === null || (is_array($trading_partner) && count($trading_partner) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $trading_partner when calling updateTradingPartner'
            );
        }

        $resourcePath = '/einvoicing/trading-partners/{id}';
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
        if ($x_avalara_client !== null) {
            $headerParams['X-Avalara-Client'] = ObjectSerializer::toHeaderValue($x_avalara_client);
        }
        // header params
        if ($x_correlation_id !== null) {
            $headerParams['X-Correlation-ID'] = ObjectSerializer::toHeaderValue($x_correlation_id);
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
                ['application/json']
            );
        }
        
        $this->client->applyClientHeaders($headerParams);

        // for model (json/xml)
        if (isset($trading_partner)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($trading_partner));
            } else {
                $httpBody = $trading_partner;
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
        $baseUrl = $this->client->config->getBasePath('EInvoicing');
        return new Request(
            'PUT',
            $baseUrl . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

}
    /**
     * Represents the Request object for the BatchSearchParticipants API
     *
     * @param  string $avalara_version The HTTP Header meant to specify the version of the API intended to be used. (required)
     * @param  string $name A &lt;b&gt;human-readable&lt;/b&gt; name for the batch search. (required)
     * @param  string $notification_email The email address to which a notification will be sent once the batch search is complete. (required)
     * @param  \SplFileObject $file CSV file containing search parameters.  Input Constraints: - Maximum file size: 1 MB - File Header: Must be less than 500 KB - Total number of lines (including header): Must be 101 or fewer (required)
     * @param  string $x_avalara_client You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. (optional)
     * @param  string $x_correlation_id The caller can use this as an identifier to use as a correlation id to trace the call. (optional)
     */
class BatchSearchParticipantsRequestSdk {
    private $avalara_version;
    private $name;
    private $notification_email;
    private $file;
    private $x_avalara_client;
    private $x_correlation_id;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.4';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    public function getNotificationEmail() {
        return $this->notification_email;
    }

    public function setNotificationEmail($notification_email) {
        $this->notification_email = $notification_email;
    }
    public function getFile() {
        return $this->file;
    }

    public function setFile($file) {
        $this->file = $file;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
}

    /**
     * Represents the Request object for the CreateTradingPartner API
     *
     * @param  string $avalara_version The HTTP Header meant to specify the version of the API intended to be used. (required)
     * @param  \Avalara\SDK\Model\EInvoicing\V1\TradingPartner $trading_partner trading_partner (required)
     * @param  string $x_avalara_client You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. (optional)
     * @param  string $x_correlation_id The caller can use this as an identifier to use as a correlation id to trace the call. (optional)
     */
class CreateTradingPartnerRequestSdk {
    private $avalara_version;
    private $trading_partner;
    private $x_avalara_client;
    private $x_correlation_id;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.4';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getTradingPartner() {
        return $this->trading_partner;
    }

    public function setTradingPartner($trading_partner) {
        $this->trading_partner = $trading_partner;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
}

    /**
     * Represents the Request object for the CreateTradingPartnersBatch API
     *
     * @param  string $avalara_version The HTTP Header meant to specify the version of the API intended to be used. (required)
     * @param  \Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartnersBatchRequest $create_trading_partners_batch_request create_trading_partners_batch_request (required)
     * @param  string $x_avalara_client You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. (optional)
     * @param  string $x_correlation_id The caller can use this as an identifier to use as a correlation id to trace the call. (optional)
     */
class CreateTradingPartnersBatchRequestSdk {
    private $avalara_version;
    private $create_trading_partners_batch_request;
    private $x_avalara_client;
    private $x_correlation_id;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.4';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getCreateTradingPartnersBatchRequest() {
        return $this->create_trading_partners_batch_request;
    }

    public function setCreateTradingPartnersBatchRequest($create_trading_partners_batch_request) {
        $this->create_trading_partners_batch_request = $create_trading_partners_batch_request;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
}

    /**
     * Represents the Request object for the DeleteTradingPartner API
     *
     * @param  string $avalara_version The HTTP Header meant to specify the version of the API intended to be used. (required)
     * @param  string $id The ID of the trading partner which is being deleted. (required)
     * @param  string $x_avalara_client You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. (optional)
     * @param  string $x_correlation_id The caller can use this as an identifier to use as a correlation id to trace the call. (optional)
     */
class DeleteTradingPartnerRequestSdk {
    private $avalara_version;
    private $id;
    private $x_avalara_client;
    private $x_correlation_id;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.4';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
}

    /**
     * Represents the Request object for the DownloadBatchSearchReport API
     *
     * @param  string $avalara_version The HTTP Header meant to specify the version of the API intended to be used. (required)
     * @param  string $id The ID of the batch search for which the report should be downloaded. (required)
     * @param  string $x_avalara_client You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. (optional)
     * @param  string $x_correlation_id The caller can use this as an identifier to use as a correlation id to trace the call. (optional)
     */
class DownloadBatchSearchReportRequestSdk {
    private $avalara_version;
    private $id;
    private $x_avalara_client;
    private $x_correlation_id;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.4';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
}

    /**
     * Represents the Request object for the GetBatchSearchDetail API
     *
     * @param  string $avalara_version The HTTP Header meant to specify the version of the API intended to be used. (required)
     * @param  string $id The ID of the batch search that was submitted earlier. (required)
     * @param  string $x_avalara_client You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. (optional)
     * @param  string $x_correlation_id The caller can use this as an identifier to use as a correlation id to trace the call. (optional)
     */
class GetBatchSearchDetailRequestSdk {
    private $avalara_version;
    private $id;
    private $x_avalara_client;
    private $x_correlation_id;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.4';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
}

    /**
     * Represents the Request object for the ListBatchSearches API
     *
     * @param  string $avalara_version The HTTP Header meant to specify the version of the API intended to be used. (required)
     * @param  string $x_avalara_client You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. (optional)
     * @param  string $filter Filters the results by field name. Only the &lt;code&gt;eq&lt;/code&gt; operator and the name field is supported. For more information, refer to [AvaTax filtering guide](https://developer.avalara.com/avatax/filtering-in-rest/). (optional)
     * @param  bool $count When set to &lt;code&gt;true&lt;/code&gt;, returns the total count of matching records included as &lt;code&gt;@recordSetCount&lt;/code&gt; in the response body. (optional)
     * @param  int $top The number of items to include in the result. (optional)
     * @param  int $skip The number of items to skip in the result. (optional)
     * @param  string $order_by The &lt;code&gt;$orderBy&lt;/code&gt; query parameter specifies the field and sorting direction for ordering the result set. The value is a string that combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space. (optional)
     * @param  string $x_correlation_id The caller can use this as an identifier to use as a correlation id to trace the call. (optional)
     */
class ListBatchSearchesRequestSdk {
    private $avalara_version;
    private $x_avalara_client;
    private $filter;
    private $count;
    private $top;
    private $skip;
    private $order_by;
    private $x_correlation_id;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.4';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getFilter() {
        return $this->filter;
    }

    public function setFilter($filter) {
        $this->filter = $filter;
    }
    public function getCount() {
        return $this->count;
    }

    public function setCount($count) {
        $this->count = $count;
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
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
}

    /**
     * Represents the Request object for the SearchParticipants API
     *
     * @param  string $avalara_version The HTTP Header meant to specify the version of the API intended to be used. (required)
     * @param  string $search Search by value supports logical &lt;code&gt;AND&lt;/code&gt; / &lt;code&gt;OR&lt;/code&gt; operators. Search is performed only over the name and identifier value fields. For more information, refer to [Query options overview - OData.](https://learn.microsoft.com/en-us/odata/concepts/queryoptions-overview#search). (required)
     * @param  string $x_avalara_client You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. (optional)
     * @param  bool $count When set to &lt;code&gt;true&lt;/code&gt;, returns the total count of matching records included as &lt;code&gt;@recordSetCount&lt;/code&gt; in the response body. (optional)
     * @param  string $filter Filters the results using the &lt;code&gt;eq&lt;/code&gt; operator. Supported fields: &lt;code&gt;network&lt;/code&gt;, &lt;code&gt;country&lt;/code&gt;, &lt;code&gt;documentType&lt;/code&gt;, &lt;code&gt;idType&lt;/code&gt;. For more information, refer to [AvaTax filtering guide](https://developer.avalara.com/avatax/filtering-in-rest/). (optional)
     * @param  int $top The number of items to include in the result. (optional)
     * @param  int $skip The number of items to skip in the result. (optional)
     * @param  string $order_by The &lt;code&gt;$orderBy&lt;/code&gt; query parameter specifies the field and sorting direction for ordering the result set. The value is a string that combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space. (optional)
     * @param  string $x_correlation_id The caller can use this as an identifier to use as a correlation id to trace the call. (optional)
     */
class SearchParticipantsRequestSdk {
    private $avalara_version;
    private $search;
    private $x_avalara_client;
    private $count;
    private $filter;
    private $top;
    private $skip;
    private $order_by;
    private $x_correlation_id;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.4';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getSearch() {
        return $this->search;
    }

    public function setSearch($search) {
        $this->search = $search;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getCount() {
        return $this->count;
    }

    public function setCount($count) {
        $this->count = $count;
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
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
}

    /**
     * Represents the Request object for the UpdateTradingPartner API
     *
     * @param  string $avalara_version The HTTP Header meant to specify the version of the API intended to be used. (required)
     * @param  string $id The ID of the trading partner which is being updated. (required)
     * @param  \Avalara\SDK\Model\EInvoicing\V1\TradingPartner $trading_partner trading_partner (required)
     * @param  string $x_avalara_client You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. (optional)
     * @param  string $x_correlation_id The caller can use this as an identifier to use as a correlation id to trace the call. (optional)
     */
class UpdateTradingPartnerRequestSdk {
    private $avalara_version;
    private $id;
    private $trading_partner;
    private $x_avalara_client;
    private $x_correlation_id;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.4';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getTradingPartner() {
        return $this->trading_partner;
    }

    public function setTradingPartner($trading_partner) {
        $this->trading_partner = $trading_partner;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
    }
}

