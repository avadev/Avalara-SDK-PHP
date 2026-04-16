<?php
/**
 * CodeListsApi
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

class CodeListsApi
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
        $client->setSdkVersion("26.4.0");
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
     * Operation getCodeList
     *
     * Retrieves a code list by ID for a specific country
     *
     * @param GetCodeListRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\EInvoicing\V1\CodeListResponse|\Avalara\SDK\Model\EInvoicing\V1\BadRequest|\Avalara\SDK\Model\EInvoicing\V1\ForbiddenError|\Avalara\SDK\Model\EInvoicing\V1\NotFoundError
     */
    public function getCodeList($request_parameters)
    {
        list($response) = $this->getCodeListWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation getCodeListWithHttpInfo
     *
     * Retrieves a code list by ID for a specific country
     *
     * @param GetCodeListRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\EInvoicing\V1\CodeListResponse|\Avalara\SDK\Model\EInvoicing\V1\BadRequest|\Avalara\SDK\Model\EInvoicing\V1\ForbiddenError|\Avalara\SDK\Model\EInvoicing\V1\NotFoundError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getCodeListWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->getCodeListRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->getCodeListWithHttpInfo($request_parameters, true);
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
                    if ('\Avalara\SDK\Model\EInvoicing\V1\CodeListResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\CodeListResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\BadRequest' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\BadRequest', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ForbiddenError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ForbiddenError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\NotFoundError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\NotFoundError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\EInvoicing\V1\CodeListResponse';
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
                        '\Avalara\SDK\Model\EInvoicing\V1\CodeListResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\BadRequest',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ForbiddenError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\NotFoundError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getCodeListAsync
     *
     * Retrieves a code list by ID for a specific country
     *
     * @param GetCodeListRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCodeListAsync($request_parameters)
    {
        return $this->getCodeListAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCodeListAsyncWithHttpInfo
     *
     * Retrieves a code list by ID for a specific country
     *
     * @param GetCodeListRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCodeListAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\EInvoicing\V1\CodeListResponse';
        $request = $this->getCodeListRequest($request_parameters);
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
                        return $this->getCodeListAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'getCodeList'
     *
     * @param GetCodeListRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getCodeListRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $codelist_id = $request_parameters->getCodelistId();
        $country_code = $request_parameters->getCountryCode();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $effective_date = $request_parameters->getEffectiveDate();
        $sunset_date = $request_parameters->getSunsetDate();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling getCodeList'
            );
        }
        // verify the required parameter 'codelist_id' is set
        if ($codelist_id === null || (is_array($codelist_id) && count($codelist_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $codelist_id when calling getCodeList'
            );
        }
        // verify the required parameter 'country_code' is set
        if ($country_code === null || (is_array($country_code) && count($country_code) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $country_code when calling getCodeList'
            );
        }

        $resourcePath = '/einvoicing/codelists/{codelistId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($country_code !== null) {
            if('form' === 'form' && is_array($country_code)) {
                foreach($country_code as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['countryCode'] = $country_code;
            }
        }
        // query params
        if ($effective_date !== null) {
            if('form' === 'form' && is_array($effective_date)) {
                foreach($effective_date as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['effectiveDate'] = $effective_date;
            }
        }
        // query params
        if ($sunset_date !== null) {
            if('form' === 'form' && is_array($sunset_date)) {
                foreach($sunset_date as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['sunsetDate'] = $sunset_date;
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

        // path params
        if ($codelist_id !== null) {
            $resourcePath = str_replace(
                '{' . 'codelistId' . '}',
                ObjectSerializer::toPathValue($codelist_id),
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
     * Operation getCodeListList
     *
     * Returns a list of code lists for a specific country
     *
     * @param GetCodeListListRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\EInvoicing\V1\CodeListListResponse|\Avalara\SDK\Model\EInvoicing\V1\BadRequest|\Avalara\SDK\Model\EInvoicing\V1\ForbiddenError
     */
    public function getCodeListList($request_parameters)
    {
        list($response) = $this->getCodeListListWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation getCodeListListWithHttpInfo
     *
     * Returns a list of code lists for a specific country
     *
     * @param GetCodeListListRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\EInvoicing\V1\CodeListListResponse|\Avalara\SDK\Model\EInvoicing\V1\BadRequest|\Avalara\SDK\Model\EInvoicing\V1\ForbiddenError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getCodeListListWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->getCodeListListRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->getCodeListListWithHttpInfo($request_parameters, true);
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
                    if ('\Avalara\SDK\Model\EInvoicing\V1\CodeListListResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\CodeListListResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\BadRequest' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\BadRequest', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\ForbiddenError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\ForbiddenError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\EInvoicing\V1\CodeListListResponse';
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
                        '\Avalara\SDK\Model\EInvoicing\V1\CodeListListResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\BadRequest',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\ForbiddenError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getCodeListListAsync
     *
     * Returns a list of code lists for a specific country
     *
     * @param GetCodeListListRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCodeListListAsync($request_parameters)
    {
        return $this->getCodeListListAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCodeListListAsyncWithHttpInfo
     *
     * Returns a list of code lists for a specific country
     *
     * @param GetCodeListListRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCodeListListAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\EInvoicing\V1\CodeListListResponse';
        $request = $this->getCodeListListRequest($request_parameters);
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
                        return $this->getCodeListListAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'getCodeListList'
     *
     * @param GetCodeListListRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getCodeListListRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $country_code = $request_parameters->getCountryCode();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $effective_date = $request_parameters->getEffectiveDate();
        $sunset_date = $request_parameters->getSunsetDate();
        $count = $request_parameters->getCount();
        $count_only = $request_parameters->getCountOnly();
        $top = $request_parameters->getTop();
        $skip = $request_parameters->getSkip();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling getCodeListList'
            );
        }
        // verify the required parameter 'country_code' is set
        if ($country_code === null || (is_array($country_code) && count($country_code) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $country_code when calling getCodeListList'
            );
        }

        $resourcePath = '/einvoicing/codelists';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($country_code !== null) {
            if('form' === 'form' && is_array($country_code)) {
                foreach($country_code as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['countryCode'] = $country_code;
            }
        }
        // query params
        if ($effective_date !== null) {
            if('form' === 'form' && is_array($effective_date)) {
                foreach($effective_date as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['effectiveDate'] = $effective_date;
            }
        }
        // query params
        if ($sunset_date !== null) {
            if('form' === 'form' && is_array($sunset_date)) {
                foreach($sunset_date as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['sunsetDate'] = $sunset_date;
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
                $queryParams['$count'] = $count;
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
                $queryParams['$countOnly'] = $count_only;
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

        // header params
        if ($avalara_version !== null) {
            $headerParams['avalara-version'] = ObjectSerializer::toHeaderValue($avalara_version);
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

}
    /**
     * Represents the Request object for the GetCodeList API
     *
     * @param  string $avalara_version Header that specifies the API version to use (for example \&quot;1.6\&quot;). (required)
     * @param  string $codelist_id System-generated unique identifier of the code list definition. Typically a UUID used to reference this code list internally or via APIs. (required)
     * @param  string $country_code Two-letter ISO 3166-1 alpha-2 country code indicating the jurisdiction this code list applies to. (required)
     * @param  string $x_avalara_client Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). (optional)
     * @param  \DateTime $effective_date Filter code list versions by effective date. Returns versions that are effective on or before this date. Format: YYYY-MM-DD (ISO 8601). If not specified, defaults to the current date. sunsetDate is required when effectiveDate is provided. (optional)
     * @param  \DateTime $sunset_date Filter code list versions by sunset date. Returns versions that have not yet sunset on or before this date. Format: YYYY-MM-DD (ISO 8601). If not specified, only non-expired versions are returned. (optional)
     */
class GetCodeListRequestSdk {
    private $avalara_version;
    private $codelist_id;
    private $country_code;
    private $x_avalara_client;
    private $effective_date;
    private $sunset_date;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.6';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getCodelistId() {
        return $this->codelist_id;
    }

    public function setCodelistId($codelist_id) {
        $this->codelist_id = $codelist_id;
    }
    public function getCountryCode() {
        return $this->country_code;
    }

    public function setCountryCode($country_code) {
        $this->country_code = $country_code;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getEffectiveDate() {
        return $this->effective_date;
    }

    public function setEffectiveDate($effective_date) {
        $this->effective_date = $effective_date;
    }
    public function getSunsetDate() {
        return $this->sunset_date;
    }

    public function setSunsetDate($sunset_date) {
        $this->sunset_date = $sunset_date;
    }
}

    /**
     * Represents the Request object for the GetCodeListList API
     *
     * @param  string $avalara_version Header that specifies the API version to use (for example \&quot;1.6\&quot;). (required)
     * @param  string $country_code Two-letter ISO 3166-1 alpha-2 country code indicating the jurisdiction for which code lists should be returned. (required)
     * @param  string $x_avalara_client Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). (optional)
     * @param  \DateTime $effective_date Filter code lists by effective date. Returns code lists that are effective on or before this date. Format: YYYY-MM-DD (ISO 8601). If not specified, defaults to the current date. sunsetDate is required when effectiveDate is provided. (optional)
     * @param  \DateTime $sunset_date Filter code lists by sunset date. Returns code lists that have not yet sunset on or before this date. Format: YYYY-MM-DD (ISO 8601). If not specified, only non-expired code lists are returned. (optional)
     * @param  string $count When set to true, the response body also includes the count of items in the collection. (optional)
     * @param  string $count_only When set to true, the response returns only the count of items in the collection. (optional)
     * @param  int $top The number of items to include in the result. (optional)
     * @param  int $skip The number of items to skip in the result. (optional)
     */
class GetCodeListListRequestSdk {
    private $avalara_version;
    private $country_code;
    private $x_avalara_client;
    private $effective_date;
    private $sunset_date;
    private $count;
    private $count_only;
    private $top;
    private $skip;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.6';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getCountryCode() {
        return $this->country_code;
    }

    public function setCountryCode($country_code) {
        $this->country_code = $country_code;
    }
    public function getXAvalaraClient() {
        return $this->x_avalara_client;
    }

    public function setXAvalaraClient($x_avalara_client) {
        $this->x_avalara_client = $x_avalara_client;
    }
    public function getEffectiveDate() {
        return $this->effective_date;
    }

    public function setEffectiveDate($effective_date) {
        $this->effective_date = $effective_date;
    }
    public function getSunsetDate() {
        return $this->sunset_date;
    }

    public function setSunsetDate($sunset_date) {
        $this->sunset_date = $sunset_date;
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
}

