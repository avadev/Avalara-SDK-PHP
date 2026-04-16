<?php
/**
 * ReportsApi
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
 * @package    AvalaraSDK\API\EInvoicing\V1
 * @author     Sachin Baijal <sachin.baijal@avalara.com>
 * @author     Jonathan Wenger <jonathan.wenger@avalara.com>
 * @copyright  2004-2025 Avalara, Inc.
 * @license    https://www.apache.org/licenses/LICENSE-2.0
 * @link       https://github.com/avadev/AvaTax-REST-V3-PHP-SDK

 */



namespace AvalaraSDK\API\EInvoicing\V1;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use AvalaraSDK\ApiClient;
use AvalaraSDK\ApiException;
use AvalaraSDK\Configuration;
use AvalaraSDK\HeaderSelector;
use AvalaraSDK\ObjectSerializer;
use AvalaraSDK\Utils\LogObject;

class ReportsApi
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
     * Operation downloadReport
     *
     * Returns a pre-signed download URL for a report
     *
     * @param DownloadReportRequestSdk The request parameters for the API call.
     *
     * @throws \AvalaraSDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \AvalaraSDK\Model\EInvoicing\V1\ReportDownloadResponse|\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError|\AvalaraSDK\Model\EInvoicing\V1\NotFoundError
     */
    public function downloadReport($request_parameters)
    {
        list($response) = $this->downloadReportWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation downloadReportWithHttpInfo
     *
     * Returns a pre-signed download URL for a report
     *
     * @param DownloadReportRequestSdk The request parameters for the API call.
     *
     * @throws \AvalaraSDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \AvalaraSDK\Model\EInvoicing\V1\ReportDownloadResponse|\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError|\AvalaraSDK\Model\EInvoicing\V1\NotFoundError, HTTP status code, HTTP response headers (array of strings)
     */
    public function downloadReportWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->downloadReportRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->downloadReportWithHttpInfo($request_parameters, true);
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
                    if ('\AvalaraSDK\Model\EInvoicing\V1\ReportDownloadResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\AvalaraSDK\Model\EInvoicing\V1\ReportDownloadResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\AvalaraSDK\Model\EInvoicing\V1\NotFoundError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\AvalaraSDK\Model\EInvoicing\V1\NotFoundError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\AvalaraSDK\Model\EInvoicing\V1\ReportDownloadResponse';
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
                        '\AvalaraSDK\Model\EInvoicing\V1\ReportDownloadResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AvalaraSDK\Model\EInvoicing\V1\NotFoundError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation downloadReportAsync
     *
     * Returns a pre-signed download URL for a report
     *
     * @param DownloadReportRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function downloadReportAsync($request_parameters)
    {
        return $this->downloadReportAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation downloadReportAsyncWithHttpInfo
     *
     * Returns a pre-signed download URL for a report
     *
     * @param DownloadReportRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function downloadReportAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\AvalaraSDK\Model\EInvoicing\V1\ReportDownloadResponse';
        $request = $this->downloadReportRequest($request_parameters);
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
                        return $this->downloadReportAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'downloadReport'
     *
     * @param DownloadReportRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function downloadReportRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $report_id = $request_parameters->getReportId();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $x_correlation_id = $request_parameters->getXCorrelationId();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling downloadReport'
            );
        }
        // verify the required parameter 'report_id' is set
        if ($report_id === null || (is_array($report_id) && count($report_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $report_id when calling downloadReport'
            );
        }

        $resourcePath = '/einvoicing/reports/{reportId}/$download';
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
        if ($report_id !== null) {
            $resourcePath = str_replace(
                '{' . 'reportId' . '}',
                ObjectSerializer::toPathValue($report_id),
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
     * Operation getReportById
     *
     * Retrieves a report by its unique ID
     *
     * @param GetReportByIdRequestSdk The request parameters for the API call.
     *
     * @throws \AvalaraSDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \AvalaraSDK\Model\EInvoicing\V1\ReportItem|\AvalaraSDK\Model\EInvoicing\V1\BadRequest|\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError|\AvalaraSDK\Model\EInvoicing\V1\NotFoundError
     */
    public function getReportById($request_parameters)
    {
        list($response) = $this->getReportByIdWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation getReportByIdWithHttpInfo
     *
     * Retrieves a report by its unique ID
     *
     * @param GetReportByIdRequestSdk The request parameters for the API call.
     *
     * @throws \AvalaraSDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \AvalaraSDK\Model\EInvoicing\V1\ReportItem|\AvalaraSDK\Model\EInvoicing\V1\BadRequest|\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError|\AvalaraSDK\Model\EInvoicing\V1\NotFoundError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getReportByIdWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->getReportByIdRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->getReportByIdWithHttpInfo($request_parameters, true);
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
                    if ('\AvalaraSDK\Model\EInvoicing\V1\ReportItem' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\AvalaraSDK\Model\EInvoicing\V1\ReportItem', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\AvalaraSDK\Model\EInvoicing\V1\BadRequest' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\AvalaraSDK\Model\EInvoicing\V1\BadRequest', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\AvalaraSDK\Model\EInvoicing\V1\NotFoundError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\AvalaraSDK\Model\EInvoicing\V1\NotFoundError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\AvalaraSDK\Model\EInvoicing\V1\ReportItem';
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
                        '\AvalaraSDK\Model\EInvoicing\V1\ReportItem',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AvalaraSDK\Model\EInvoicing\V1\BadRequest',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AvalaraSDK\Model\EInvoicing\V1\NotFoundError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getReportByIdAsync
     *
     * Retrieves a report by its unique ID
     *
     * @param GetReportByIdRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getReportByIdAsync($request_parameters)
    {
        return $this->getReportByIdAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getReportByIdAsyncWithHttpInfo
     *
     * Retrieves a report by its unique ID
     *
     * @param GetReportByIdRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getReportByIdAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\AvalaraSDK\Model\EInvoicing\V1\ReportItem';
        $request = $this->getReportByIdRequest($request_parameters);
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
                        return $this->getReportByIdAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'getReportById'
     *
     * @param GetReportByIdRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getReportByIdRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $report_id = $request_parameters->getReportId();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $x_correlation_id = $request_parameters->getXCorrelationId();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling getReportById'
            );
        }
        // verify the required parameter 'report_id' is set
        if ($report_id === null || (is_array($report_id) && count($report_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $report_id when calling getReportById'
            );
        }

        $resourcePath = '/einvoicing/reports/{reportId}/status';
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
        if ($report_id !== null) {
            $resourcePath = str_replace(
                '{' . 'reportId' . '}',
                ObjectSerializer::toPathValue($report_id),
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
     * Operation getReports
     *
     * Returns a list of reports
     *
     * @param GetReportsRequestSdk The request parameters for the API call.
     *
     * @throws \AvalaraSDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \AvalaraSDK\Model\EInvoicing\V1\ReportListResponse|\AvalaraSDK\Model\EInvoicing\V1\BadRequest|\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError
     */
    public function getReports($request_parameters)
    {
        list($response) = $this->getReportsWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation getReportsWithHttpInfo
     *
     * Returns a list of reports
     *
     * @param GetReportsRequestSdk The request parameters for the API call.
     *
     * @throws \AvalaraSDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \AvalaraSDK\Model\EInvoicing\V1\ReportListResponse|\AvalaraSDK\Model\EInvoicing\V1\BadRequest|\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getReportsWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->getReportsRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->getReportsWithHttpInfo($request_parameters, true);
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
                    if ('\AvalaraSDK\Model\EInvoicing\V1\ReportListResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\AvalaraSDK\Model\EInvoicing\V1\ReportListResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\AvalaraSDK\Model\EInvoicing\V1\BadRequest' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\AvalaraSDK\Model\EInvoicing\V1\BadRequest', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\AvalaraSDK\Model\EInvoicing\V1\ReportListResponse';
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
                        '\AvalaraSDK\Model\EInvoicing\V1\ReportListResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AvalaraSDK\Model\EInvoicing\V1\BadRequest',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AvalaraSDK\Model\EInvoicing\V1\ForbiddenError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getReportsAsync
     *
     * Returns a list of reports
     *
     * @param GetReportsRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getReportsAsync($request_parameters)
    {
        return $this->getReportsAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getReportsAsyncWithHttpInfo
     *
     * Returns a list of reports
     *
     * @param GetReportsRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getReportsAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\AvalaraSDK\Model\EInvoicing\V1\ReportListResponse';
        $request = $this->getReportsRequest($request_parameters);
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
                        return $this->getReportsAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'getReports'
     *
     * @param GetReportsRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getReportsRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $x_correlation_id = $request_parameters->getXCorrelationId();
        $filter = $request_parameters->getFilter();
        $top = $request_parameters->getTop();
        $skip = $request_parameters->getSkip();
        $count = $request_parameters->getCount();
        $count_only = $request_parameters->getCountOnly();
        $orderby = $request_parameters->getOrderby();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling getReports'
            );
        }

        $resourcePath = '/einvoicing/reports';
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
        if ($orderby !== null) {
            if('form' === 'form' && is_array($orderby)) {
                foreach($orderby as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['$orderby'] = $orderby;
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

}
    /**
     * Represents the Request object for the DownloadReport API
     *
     * @param  string $avalara_version Header that specifies the API version to use (for example \&quot;1.6\&quot;). (required)
     * @param  string $report_id The unique ID for this report as returned in a GET /reports response. (required)
     * @param  string $x_avalara_client Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). (optional)
     * @param  string $x_correlation_id Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). (optional)
     */
class DownloadReportRequestSdk {
    private $avalara_version;
    private $report_id;
    private $x_avalara_client;
    private $x_correlation_id;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.6';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getReportId() {
        return $this->report_id;
    }

    public function setReportId($report_id) {
        $this->report_id = $report_id;
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
     * Represents the Request object for the GetReportById API
     *
     * @param  string $avalara_version Header that specifies the API version to use (for example \&quot;1.6\&quot;). (required)
     * @param  string $report_id The unique ID for this report as returned in a GET /reports response. (required)
     * @param  string $x_avalara_client Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). (optional)
     * @param  string $x_correlation_id Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). (optional)
     */
class GetReportByIdRequestSdk {
    private $avalara_version;
    private $report_id;
    private $x_avalara_client;
    private $x_correlation_id;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.6';
    }

    public function setAvalaraVersion($avalara_version) {
        $this->avalara_version = $avalara_version;
    }
    public function getReportId() {
        return $this->report_id;
    }

    public function setReportId($report_id) {
        $this->report_id = $report_id;
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
     * Represents the Request object for the GetReports API
     *
     * @param  string $avalara_version Header that specifies the API version to use (for example \&quot;1.6\&quot;). (required)
     * @param  string $x_avalara_client Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). (optional)
     * @param  string $x_correlation_id Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). (optional)
     * @param  string $filter OData-style filter expression. Supports operators: eq, ne, gt, ge, lt, le, like, ilike, contains. Examples: status eq &#39;COMPLETED&#39;, reportGenerateDate gt &#39;2025-11-01&#39;, transactionIds contains &#39;TXN-2025-001&#39; (optional)
     * @param  int $top The number of items to include in the result. (optional)
     * @param  int $skip The number of items to skip in the result. (optional)
     * @param  string $count When set to true, the response body also includes the count of items in the collection. (optional)
     * @param  string $count_only When set to true, the response returns only the count of items in the collection. (optional)
     * @param  string $orderby OData-style orderby expression. Format: &#39;field asc&#39; or &#39;field desc&#39;. Default: reportGenerateDate desc (optional, default to 'reportGenerateDate desc')
     */
class GetReportsRequestSdk {
    private $avalara_version;
    private $x_avalara_client;
    private $x_correlation_id;
    private $filter;
    private $top;
    private $skip;
    private $count;
    private $count_only;
    private $orderby;

    public function __construct() {
    }
    public function getAvalaraVersion() {
        return $this->avalara_version ?? '1.6';
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
    public function getXCorrelationId() {
        return $this->x_correlation_id;
    }

    public function setXCorrelationId($x_correlation_id) {
        $this->x_correlation_id = $x_correlation_id;
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
    public function getOrderby() {
        return $this->orderby;
    }

    public function setOrderby($orderby) {
        $this->orderby = $orderby;
    }
}

