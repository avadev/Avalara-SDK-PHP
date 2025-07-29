# Avalara\SDK\TradingPartnersApi

All URIs are relative to https://api.sbx.avalara.com/einvoicing.

Method | HTTP request | Description
------------- | ------------- | -------------
[**batchSearchParticipants()**](TradingPartnersApi.md#batchSearchParticipants) | **POST** /trading-partners/batch-searches | Handles batch search requests by uploading a file containing search parameters.
[**createTradingPartner()**](TradingPartnersApi.md#createTradingPartner) | **POST** /trading-partners | Creates a new trading partner.
[**createTradingPartnersBatch()**](TradingPartnersApi.md#createTradingPartnersBatch) | **POST** /trading-partners/batch | Creates a batch of multiple trading partners.
[**deleteTradingPartner()**](TradingPartnersApi.md#deleteTradingPartner) | **DELETE** /trading-partners/{id} | Deletes a trading partner using ID.
[**downloadBatchSearchReport()**](TradingPartnersApi.md#downloadBatchSearchReport) | **GET** /trading-partners/batch-searches/{id}/$download-results | Downloads batch search results in a csv file.
[**getBatchSearchDetail()**](TradingPartnersApi.md#getBatchSearchDetail) | **GET** /trading-partners/batch-searches/{id} | Returns the batch search details using ID.
[**listBatchSearches()**](TradingPartnersApi.md#listBatchSearches) | **GET** /trading-partners/batch-searches | Lists all batch searches that were previously submitted.
[**searchParticipants()**](TradingPartnersApi.md#searchParticipants) | **GET** /trading-partners | Returns a list of participants matching the input query.
[**updateTradingPartner()**](TradingPartnersApi.md#updateTradingPartner) | **PUT** /trading-partners/{id} | Updates a trading partner using ID.


## `batchSearchParticipants()`

```php
batchSearchParticipants($avalara_version, $name, $notification_email, $file, $x_avalara_client, $x_correlation_id): \Avalara\SDK\Model\EInvoicing\V1\BatchSearchParticipants202Response
```

Handles batch search requests by uploading a file containing search parameters.

This endpoint creates a batch search and performs a batch search in the directory for participants in the background.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\TradingPartnersApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used.
$name = Automotive Companies in London Search; // string | A <b>human-readable</b> name for the batch search.
$notification_email = user@example.com; // string | The email address to which a notification will be sent once the batch search is complete.
$file = "/path/to/file.txt"; // \SplFileObject | CSV file containing search parameters.  Input Constraints: - Maximum file size: 1 MB - File Header: Must be less than 500 KB - Total number of lines (including header): Must be 101 or fewer
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\".
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | The caller can use this as an identifier to use as a correlation id to trace the call.

try {
    $result = $apiInstance->batchSearchParticipants($avalara_version, $name, $notification_email, $file, $x_avalara_client, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TradingPartnersApi->batchSearchParticipants: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used. |
 **name** | **string**| A &lt;b&gt;human-readable&lt;/b&gt; name for the batch search. |
 **notification_email** | **string**| The email address to which a notification will be sent once the batch search is complete. |
 **file** | **\SplFileObject****\SplFileObject**| CSV file containing search parameters.  Input Constraints: - Maximum file size: 1 MB - File Header: Must be less than 500 KB - Total number of lines (including header): Must be 101 or fewer |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\BatchSearchParticipants202Response**](../Model/BatchSearchParticipants202Response.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `createTradingPartner()`

```php
createTradingPartner($avalara_version, $trading_partner, $x_avalara_client, $x_correlation_id): \Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartner201Response
```

Creates a new trading partner.

This endpoint creates a new trading partner with the provided details. The request body must include the necessary information as defined in the `TradingPartner` schema.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\TradingPartnersApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used.
$trading_partner = {"name":"Pineapple Labs ltd","network":"","registrationDate":"2024-01-01T00:00:00.000Z","identifiers":[{"name":"urn:avalara:systems:des:directory:participant:identifiers:peppolparticipantid","displayName":"","value":"9930:de112233445"}],"addresses":[{"line1":"Line 1","line2":"Line 2","city":"Brisbane","state":"Queensland","country":"Australia","postalCode":"4000"}],"supportedDocumentTypes":[{"name":"","value":"busdox-docid-qns::urn:oasis:names:specification:ubl:schema:xsd:Invoice-2::Invoice##urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0::2.1","supportedByTradingPartner":true,"supportedByAvalara":true,"extensions":[]}],"consents":{"listInAvalaraDirectory":true},"extensions":[]}; // \Avalara\SDK\Model\EInvoicing\V1\TradingPartner
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\".
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | The caller can use this as an identifier to use as a correlation id to trace the call.

try {
    $result = $apiInstance->createTradingPartner($avalara_version, $trading_partner, $x_avalara_client, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TradingPartnersApi->createTradingPartner: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used. |
 **trading_partner** | [**\Avalara\SDK\Model\EInvoicing\V1\TradingPartner**](../Model/TradingPartner.md)|  |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartner201Response**](../Model/CreateTradingPartner201Response.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `createTradingPartnersBatch()`

```php
createTradingPartnersBatch($avalara_version, $create_trading_partners_batch_request, $x_avalara_client, $x_correlation_id): \Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartnersBatch200Response
```

Creates a batch of multiple trading partners.

This endpoint creates multiple trading partners in a single batch request. It accepts an array of trading partners and processes them synchronously. Supports a maximum of 100 records or 1 MB request payload. The batch is processed atomically and partial success is not allowed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\TradingPartnersApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used.
$create_trading_partners_batch_request = {"value":[{"name":"Pineapple Labs ltd","network":"","registrationDate":"2024-01-01T00:00:00.000Z","identifiers":[{"name":"urn:avalara:systems:des:directory:participant:identifiers:peppolparticipantid","displayName":"","value":"9930:de112233445"}],"addresses":[{"line1":"Line 1","line2":"Line 2","city":"Brisbane","state":"Queensland","country":"Australia","postalCode":"4000"}],"supportedDocumentTypes":[{"name":"","value":"busdox-docid-qns::urn:oasis:names:specification:ubl:schema:xsd:Invoice-2::Invoice##urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0::2.1","supportedByTradingPartner":true,"supportedByAvalara":true,"extensions":[]}],"consents":{"listInAvalaraDirectory":true},"extensions":[]}]}; // \Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartnersBatchRequest
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\".
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | The caller can use this as an identifier to use as a correlation id to trace the call.

try {
    $result = $apiInstance->createTradingPartnersBatch($avalara_version, $create_trading_partners_batch_request, $x_avalara_client, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TradingPartnersApi->createTradingPartnersBatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used. |
 **create_trading_partners_batch_request** | [**\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartnersBatchRequest**](../Model/CreateTradingPartnersBatchRequest.md)|  |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\CreateTradingPartnersBatch200Response**](../Model/CreateTradingPartnersBatch200Response.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `deleteTradingPartner()`

```php
deleteTradingPartner($avalara_version, $id, $x_avalara_client, $x_correlation_id)
```

Deletes a trading partner using ID.

This endpoint deletes an existing trading partner identified by the provided ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\TradingPartnersApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used.
$id = 'id_example'; // string | The ID of the trading partner which is being deleted.
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\".
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | The caller can use this as an identifier to use as a correlation id to trace the call.

try {
    $apiInstance->deleteTradingPartner($avalara_version, $id, $x_avalara_client, $x_correlation_id);
} catch (Exception $e) {
    echo 'Exception when calling TradingPartnersApi->deleteTradingPartner: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used. |
 **id** | **string**| The ID of the trading partner which is being deleted. |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

### Return type

void (empty response body)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `downloadBatchSearchReport()`

```php
downloadBatchSearchReport($avalara_version, $id, $x_avalara_client, $x_correlation_id): \SplFileObject
```

Downloads batch search results in a csv file.

This endpoint downloads the report for a specific batch search using the batch search ID. It returns a CSV file containing up to 1,000 query results.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\TradingPartnersApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used.
$id = 2f5ea4b5-4dae-445a-b3e4-9f65a61eaa99; // string | The ID of the batch search for which the report should be downloaded.
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\".
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | The caller can use this as an identifier to use as a correlation id to trace the call.

try {
    $result = $apiInstance->downloadBatchSearchReport($avalara_version, $id, $x_avalara_client, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TradingPartnersApi->downloadBatchSearchReport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used. |
 **id** | **string**| The ID of the batch search for which the report should be downloaded. |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

### Return type

**\SplFileObject**

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `text/csv`, `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getBatchSearchDetail()`

```php
getBatchSearchDetail($avalara_version, $id, $x_avalara_client, $x_correlation_id): \Avalara\SDK\Model\EInvoicing\V1\BatchSearch
```

Returns the batch search details using ID.

This endpoint returns detailed information for a specific batch search using the provided ID. It is useful for tracking the status and progress of a previously initiated batch search operation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\TradingPartnersApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used.
$id = 2f5ea4b5-4dae-445a-b3e4-9f65a61eaa99; // string | The ID of the batch search that was submitted earlier.
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\".
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | The caller can use this as an identifier to use as a correlation id to trace the call.

try {
    $result = $apiInstance->getBatchSearchDetail($avalara_version, $id, $x_avalara_client, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TradingPartnersApi->getBatchSearchDetail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used. |
 **id** | **string**| The ID of the batch search that was submitted earlier. |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\BatchSearch**](../Model/BatchSearch.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `listBatchSearches()`

```php
listBatchSearches($avalara_version, $x_avalara_client, $filter, $count, $top, $skip, $order_by, $x_correlation_id): \Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse
```

Lists all batch searches that were previously submitted.

This endpoint retrieves a list of all batch search operations that have been previously submitted. It returns details such as the batch search ID, status, creation date, and associated metadata. It is useful for tracking the progress of a previously initiated batch search operations.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\TradingPartnersApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used.
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\".
$filter = name eq 'Batch_Search_Import_V4'; // string | Filters the results by field name. Only the <code>eq</code> operator and the name field is supported. For more information, refer to [AvaTax filtering guide](https://developer.avalara.com/avatax/filtering-in-rest/).
$count = true; // bool | When set to <code>true</code>, returns the total count of matching records included as <code>@recordSetCount</code> in the response body.
$top = 56; // int | The number of items to include in the result.
$skip = 56; // int | The number of items to skip in the result.
$order_by = name desc; // string | The <code>$orderBy</code> query parameter specifies the field and sorting direction for ordering the result set. The value is a string that combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space.
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | The caller can use this as an identifier to use as a correlation id to trace the call.

try {
    $result = $apiInstance->listBatchSearches($avalara_version, $x_avalara_client, $filter, $count, $top, $skip, $order_by, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TradingPartnersApi->listBatchSearches: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used. |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. | [optional]
 **filter** | **string**| Filters the results by field name. Only the &lt;code&gt;eq&lt;/code&gt; operator and the name field is supported. For more information, refer to [AvaTax filtering guide](https://developer.avalara.com/avatax/filtering-in-rest/). | [optional]
 **count** | **bool**| When set to &lt;code&gt;true&lt;/code&gt;, returns the total count of matching records included as &lt;code&gt;@recordSetCount&lt;/code&gt; in the response body. | [optional]
 **top** | **int**| The number of items to include in the result. | [optional]
 **skip** | **int**| The number of items to skip in the result. | [optional]
 **order_by** | **string**| The &lt;code&gt;$orderBy&lt;/code&gt; query parameter specifies the field and sorting direction for ordering the result set. The value is a string that combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse**](../Model/BatchSearchListResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `searchParticipants()`

```php
searchParticipants($avalara_version, $search, $x_avalara_client, $count, $filter, $top, $skip, $order_by, $x_correlation_id): \Avalara\SDK\Model\EInvoicing\V1\SearchParticipants200Response
```

Returns a list of participants matching the input query.

This endpoint retrieves a list of trading partners that match the specified search criteria. It supports filtering, search text, and other relevant query parameters to narrow down the results.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\TradingPartnersApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used.
$search = Acme and 7726627177 or BMW; // string | Search by value supports logical <code>AND</code> / <code>OR</code> operators. Search is performed only over the name and identifier value fields. For more information, refer to [Query options overview - OData.](https://learn.microsoft.com/en-us/odata/concepts/queryoptions-overview#search).
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\".
$count = true; // bool | When set to <code>true</code>, returns the total count of matching records included as <code>@recordSetCount</code> in the response body.
$filter = network eq 'Peppol' and country eq 'Australia'; // string | Filters the results using the <code>eq</code> operator. Supported fields: <code>network</code>, <code>country</code>, <code>documentType</code>, <code>idType</code>. For more information, refer to [AvaTax filtering guide](https://developer.avalara.com/avatax/filtering-in-rest/).
$top = 56; // int | The number of items to include in the result.
$skip = 56; // int | The number of items to skip in the result.
$order_by = name desc; // string | The <code>$orderBy</code> query parameter specifies the field and sorting direction for ordering the result set. The value is a string that combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space.
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | The caller can use this as an identifier to use as a correlation id to trace the call.

try {
    $result = $apiInstance->searchParticipants($avalara_version, $search, $x_avalara_client, $count, $filter, $top, $skip, $order_by, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TradingPartnersApi->searchParticipants: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used. |
 **search** | **string**| Search by value supports logical &lt;code&gt;AND&lt;/code&gt; / &lt;code&gt;OR&lt;/code&gt; operators. Search is performed only over the name and identifier value fields. For more information, refer to [Query options overview - OData.](https://learn.microsoft.com/en-us/odata/concepts/queryoptions-overview#search). |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. | [optional]
 **count** | **bool**| When set to &lt;code&gt;true&lt;/code&gt;, returns the total count of matching records included as &lt;code&gt;@recordSetCount&lt;/code&gt; in the response body. | [optional]
 **filter** | **string**| Filters the results using the &lt;code&gt;eq&lt;/code&gt; operator. Supported fields: &lt;code&gt;network&lt;/code&gt;, &lt;code&gt;country&lt;/code&gt;, &lt;code&gt;documentType&lt;/code&gt;, &lt;code&gt;idType&lt;/code&gt;. For more information, refer to [AvaTax filtering guide](https://developer.avalara.com/avatax/filtering-in-rest/). | [optional]
 **top** | **int**| The number of items to include in the result. | [optional]
 **skip** | **int**| The number of items to skip in the result. | [optional]
 **order_by** | **string**| The &lt;code&gt;$orderBy&lt;/code&gt; query parameter specifies the field and sorting direction for ordering the result set. The value is a string that combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\SearchParticipants200Response**](../Model/SearchParticipants200Response.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `updateTradingPartner()`

```php
updateTradingPartner($avalara_version, $id, $trading_partner, $x_avalara_client, $x_correlation_id): \Avalara\SDK\Model\EInvoicing\V1\UpdateTradingPartner200Response
```

Updates a trading partner using ID.

This endpoint updates the details of an existing trading partner specified by the provided ID. It performs a full update, and the request body must include all required fields.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\TradingPartnersApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used.
$id = 'id_example'; // string | The ID of the trading partner which is being updated.
$trading_partner = {"name":"Pineapple Labs ltd","registrationDate":"2024-01-01T00:00:00.000Z","identifiers":[{"name":"urn:avalara:systems:des:directory:participant:identifiers:peppolparticipantid","displayName":"","value":"9930:de112233445"}],"address":[{"line1":"Line 1","line2":"Line 2","city":"Brisbane","state":"Queensland","country":"Australia","postalCode":"4000"}],"supportedDocumentTypes":[{"name":"","value":"busdox-docid-qns::urn:oasis:names:specification:ubl:schema:xsd:Invoice-2::Invoice##urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0::2.1","supportedByTradingPartner":true,"supportedByAvalara":true,"extensions":[]}],"consents":{"listInAvalaraDirectory":true},"extensions":[]}; // \Avalara\SDK\Model\EInvoicing\V1\TradingPartner
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\".
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | The caller can use this as an identifier to use as a correlation id to trace the call.

try {
    $result = $apiInstance->updateTradingPartner($avalara_version, $id, $trading_partner, $x_avalara_client, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TradingPartnersApi->updateTradingPartner: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used. |
 **id** | **string**| The ID of the trading partner which is being updated. |
 **trading_partner** | [**\Avalara\SDK\Model\EInvoicing\V1\TradingPartner**](../Model/TradingPartner.md)|  |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\UpdateTradingPartner200Response**](../Model/UpdateTradingPartner200Response.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
