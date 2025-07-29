<?php
/**
 * DataInputFieldsApi
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

class DataInputFieldsApi
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
        $client->setSdkVersion("25.8.0");
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
     * Operation getDataInputFields
     *
     * Returns the optionality of document fields for different country mandates
     *
     * @param GetDataInputFieldsRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Avalara\SDK\Model\EInvoicing\V1\DataInputFieldsResponse|\Avalara\SDK\Model\EInvoicing\V1\ForbiddenError|\Avalara\SDK\Model\EInvoicing\V1\InternalServerError
     */
    public function getDataInputFields($request_parameters)
    {
        list($response) = $this->getDataInputFieldsWithHttpInfo($request_parameters);
        return $response;
    }

    /**
     * Operation getDataInputFieldsWithHttpInfo
     *
     * Returns the optionality of document fields for different country mandates
     *
     * @param GetDataInputFieldsRequestSdk The request parameters for the API call.
     *
     * @throws \Avalara\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Avalara\SDK\Model\EInvoicing\V1\DataInputFieldsResponse|\Avalara\SDK\Model\EInvoicing\V1\ForbiddenError|\Avalara\SDK\Model\EInvoicing\V1\InternalServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDataInputFieldsWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        //OAuth2 Scopes
        $requiredScopes = "";
        $request = $this->getDataInputFieldsRequest($request_parameters);
        $logObject->populateRequestInfo($request);

        try {
            try {
                $response = $this->client->send_sync($request, []);
            } catch (RequestException $e) {
                $statusCode = $e->getCode();
                if (($statusCode == 401 || $statusCode == 403) && !$isRetry) {
                    $this->client->refreshAuthToken($e->getRequest() ? $e->getRequest()->getHeaders() : null, $requiredScopes);
                    list($response) = $this->getDataInputFieldsWithHttpInfo($request_parameters, true);
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
                    if ('\Avalara\SDK\Model\EInvoicing\V1\DataInputFieldsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\DataInputFieldsResponse', []),
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
                case 500:
                    if ('\Avalara\SDK\Model\EInvoicing\V1\InternalServerError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    $logObject->populateResponseInfo($content, $response);
                    $this->client->logger->info(json_encode($logObject));
                    return [
                        ObjectSerializer::deserialize($content, '\Avalara\SDK\Model\EInvoicing\V1\InternalServerError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Avalara\SDK\Model\EInvoicing\V1\DataInputFieldsResponse';
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
                        '\Avalara\SDK\Model\EInvoicing\V1\DataInputFieldsResponse',
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
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Avalara\SDK\Model\EInvoicing\V1\InternalServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getDataInputFieldsAsync
     *
     * Returns the optionality of document fields for different country mandates
     *
     * @param GetDataInputFieldsRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDataInputFieldsAsync($request_parameters)
    {
        return $this->getDataInputFieldsAsyncWithHttpInfo($request_parameters)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDataInputFieldsAsyncWithHttpInfo
     *
     * Returns the optionality of document fields for different country mandates
     *
     * @param GetDataInputFieldsRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDataInputFieldsAsyncWithHttpInfo($request_parameters, $isRetry = false)
    {
        $logObject = new LogObject($this->client->logRequestAndResponse);
        $returnType = '\Avalara\SDK\Model\EInvoicing\V1\DataInputFieldsResponse';
        $request = $this->getDataInputFieldsRequest($request_parameters);
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
                        return $this->getDataInputFieldsAsyncWithHttpInfo($request_parameters, true)
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
     * Create request for operation 'getDataInputFields'
     *
     * @param GetDataInputFieldsRequestSdk The request parameters for the API call.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getDataInputFieldsRequest($request_parameters)
    {
        //OAuth2 Scopes
        $requiredScopes = "";
        
        $avalara_version = $request_parameters->getAvalaraVersion();
        $x_avalara_client = $request_parameters->getXAvalaraClient();
        $filter = $request_parameters->getFilter();
        $top = $request_parameters->getTop();
        $skip = $request_parameters->getSkip();
        $count = $request_parameters->getCount();
        $count_only = $request_parameters->getCountOnly();

        // verify the required parameter 'avalara_version' is set
        if ($avalara_version === null || (is_array($avalara_version) && count($avalara_version) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $avalara_version when calling getDataInputFields'
            );
        }

        $resourcePath = '/einvoicing/data-input-fields';
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
        $clientId="{$this->client->config->getAppName()}; {$this->client->config->getAppVersion()}; PhpRestClient; 25.8.0; {$this->client->config->getMachineName()}";

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
     * Represents the Request object for the GetDataInputFields API
     *
     * @param  string $avalara_version The HTTP Header meant to specify the version of the API intended to be used (required)
     * @param  string $x_avalara_client You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint. (optional)
     * @param  string $filter Filter by field name and value. This filter only supports &lt;code&gt;eq&lt;/code&gt; and &lt;code&gt;contains&lt;/code&gt;. Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering. (optional)
     * @param  float $top If nonzero, return no more than this number of results. Used with &lt;code&gt;$skip&lt;/code&gt; to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 1,000 records. (optional)
     * @param  float $skip If nonzero, skip this number of results before returning data. Used with &lt;code&gt;$top&lt;/code&gt; to provide pagination for large datasets. (optional)
     * @param  bool $count When set to true, the count of the collection is also returned in the response body (optional)
     * @param  bool $count_only When set to true, only the count of the collection is returned (optional)
     */
class GetDataInputFieldsRequestSdk {
    private $avalara_version;
    private $x_avalara_client;
    private $filter;
    private $top;
    private $skip;
    private $count;
    private $count_only;

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
}

