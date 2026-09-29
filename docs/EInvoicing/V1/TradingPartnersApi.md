# AvalaraSDK\TradingPartnersApi

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
batchSearchParticipants($avalara_version, $name, $notification_email, $file, $x_avalara_client, $x_correlation_id): \AvalaraSDK\ModelEInvoicingV1\BatchSearchParticipants202Response
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

$apiInstance = new AvalaraSDK\Api\TradingPartnersApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$name = Automotive Companies in London Search; // string | A human-readable name for the batch search.
$notification_email = user@example.com; // string | The email address to which a notification will be sent once the batch search is complete.
$file = "/path/to/file.txt"; // \SplFileObject | CSV file containing search parameters.  Input Constraints: - Maximum file size: 1 MB - File Header: Must be less than 500 KB - Total number of lines (including header): Must be 101 or fewer
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").

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
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **name** | **string**| A human-readable name for the batch search. |
 **notification_email** | **string**| The email address to which a notification will be sent once the batch search is complete. |
 **file** | **\SplFileObject****\SplFileObject**| CSV file containing search parameters.  Input Constraints: - Maximum file size: 1 MB - File Header: Must be less than 500 KB - Total number of lines (including header): Must be 101 or fewer |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\BatchSearchParticipants202Response**](../Model/BatchSearchParticipants202Response.md)

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
createTradingPartner($avalara_version, $trading_partner, $x_avalara_client, $x_correlation_id): \AvalaraSDK\ModelEInvoicingV1\CreateTradingPartner201Response
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

$apiInstance = new AvalaraSDK\Api\TradingPartnersApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$trading_partner = {"name":"Pineapple Labs ltd","network":"","registrationDate":"2024-01-01T00:00:00.000Z","identifiers":[{"name":"urn:avalara:systems:des:directory:participant:identifiers:peppolparticipantid","displayName":"","value":"9930:de112233445","extensions":[]}],"addresses":[{"line1":"Line 1","line2":"Line 2","city":"Brisbane","state":"Queensland","country":"Australia","postalCode":"4000"}],"supportedDocumentTypes":[{"name":"","value":"busdox-docid-qns::urn:oasis:names:specification:ubl:schema:xsd:Invoice-2::Invoice##urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0::2.1","supportedByTradingPartner":true,"supportedByAvalara":true,"extensions":[]}],"consents":{"listInAvalaraDirectory":true},"extensions":[]}; // \AvalaraSDK\ModelEInvoicingV1\TradingPartner
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").

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
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **trading_partner** | [**\AvalaraSDK\ModelEInvoicingV1\TradingPartner**](../Model/TradingPartner.md)|  |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\CreateTradingPartner201Response**](../Model/CreateTradingPartner201Response.md)

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
createTradingPartnersBatch($avalara_version, $create_trading_partners_batch_request, $x_avalara_client, $x_correlation_id): \AvalaraSDK\ModelEInvoicingV1\CreateTradingPartnersBatch200Response
```

Creates a batch of multiple trading partners.

This endpoint creates multiple trading partners in a single batch request. It accepts an array of trading partners and processes them synchronously. Supports a maximum of 100 records or a 1 MB request payload.

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

$apiInstance = new AvalaraSDK\Api\TradingPartnersApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$create_trading_partners_batch_request = {"value":[{"name":"Pineapple Labs ltd","network":"","registrationDate":"2024-01-01T00:00:00.000Z","identifiers":[{"name":"urn:avalara:systems:des:directory:participant:identifiers:peppolparticipantid","displayName":"","value":"9930:de112233445","extensions":[]}],"addresses":[{"line1":"Line 1","line2":"Line 2","city":"Brisbane","state":"Queensland","country":"Australia","postalCode":"4000"}],"supportedDocumentTypes":[{"name":"","value":"busdox-docid-qns::urn:oasis:names:specification:ubl:schema:xsd:Invoice-2::Invoice##urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0::2.1","supportedByTradingPartner":true,"supportedByAvalara":true,"extensions":[]}],"consents":{"listInAvalaraDirectory":true},"extensions":[]}]}; // \AvalaraSDK\ModelEInvoicingV1\CreateTradingPartnersBatchRequest
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").

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
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **create_trading_partners_batch_request** | [**\AvalaraSDK\ModelEInvoicingV1\CreateTradingPartnersBatchRequest**](../Model/CreateTradingPartnersBatchRequest.md)|  |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\CreateTradingPartnersBatch200Response**](../Model/CreateTradingPartnersBatch200Response.md)

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

$apiInstance = new AvalaraSDK\Api\TradingPartnersApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$id = 'id_example'; // string | Unique identifier of the trading partner.
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").

try {
    $apiInstance->deleteTradingPartner($avalara_version, $id, $x_avalara_client, $x_correlation_id);
} catch (Exception $e) {
    echo 'Exception when calling TradingPartnersApi->deleteTradingPartner: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **id** | **string**| Unique identifier of the trading partner. |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]

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

$apiInstance = new AvalaraSDK\Api\TradingPartnersApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$id = 2f5ea4b5-4dae-445a-b3e4-9f65a61eaa99; // string | Unique identifier of the batch search for which to download the report.
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").

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
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **id** | **string**| Unique identifier of the batch search for which to download the report. |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]

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
getBatchSearchDetail($avalara_version, $id, $x_avalara_client, $x_correlation_id): \AvalaraSDK\ModelEInvoicingV1\BatchSearch
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

$apiInstance = new AvalaraSDK\Api\TradingPartnersApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$id = 2f5ea4b5-4dae-445a-b3e4-9f65a61eaa99; // string | Unique identifier of the batch search.
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").

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
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **id** | **string**| Unique identifier of the batch search. |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\BatchSearch**](../Model/BatchSearch.md)

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
listBatchSearches($avalara_version, $x_avalara_client, $filter, $count, $top, $skip, $order_by, $x_correlation_id): \AvalaraSDK\ModelEInvoicingV1\BatchSearchListResponse
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

$apiInstance = new AvalaraSDK\Api\TradingPartnersApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$filter = name eq 'Batch_Search_Import_V4'; // string | Filters the results by field name. Only the eq operator and the name field are supported. For more information, refer to the Avalara filtering guide.
$count = true; // bool | When set to <code>true</code>, returns the total count of matching records included as <code>@recordSetCount</code> in the response body.
$top = 56; // int | The number of items to include in the result.
$skip = 56; // int | The number of items to skip in the result.
$order_by = name desc; // string | The <code>$orderBy</code> query parameter specifies the field and sorting direction for ordering the result set. The value is a string that combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space.
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").

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
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **filter** | **string**| Filters the results by field name. Only the eq operator and the name field are supported. For more information, refer to the Avalara filtering guide. | [optional]
 **count** | **bool**| When set to &lt;code&gt;true&lt;/code&gt;, returns the total count of matching records included as &lt;code&gt;@recordSetCount&lt;/code&gt; in the response body. | [optional]
 **top** | **int**| The number of items to include in the result. | [optional]
 **skip** | **int**| The number of items to skip in the result. | [optional]
 **order_by** | **string**| The &lt;code&gt;$orderBy&lt;/code&gt; query parameter specifies the field and sorting direction for ordering the result set. The value is a string that combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space. | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\BatchSearchListResponse**](../Model/BatchSearchListResponse.md)

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
searchParticipants($avalara_version, $search, $x_avalara_client, $count, $filter, $top, $skip, $order_by, $x_correlation_id): \AvalaraSDK\ModelEInvoicingV1\SearchParticipants200Response
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

$apiInstance = new AvalaraSDK\Api\TradingPartnersApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$search = Acme AND 7726627177 OR BMW; // string | Search by value supports logical AND and OR operators (case-sensitive). Search is performed only over the name and identifier value fields. For more information, refer to the OData query options overview documentation.
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$count = true; // bool | When set to true, returns the total count of matching records included as @recordSetCount in the response body.
$filter = network eq 'Peppol' and country eq 'Australia'; // string | Filters the results using the eq operator. Supported fields include network, country, documentType, and idType. For more information, refer to the Avalara filtering guide.
$top = 56; // int | The number of items to include in the result.
$skip = 56; // int | The number of items to skip in the result.
$order_by = name desc; // string | The $orderBy query parameter specifies the field and sorting direction for ordering the result set. The value combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space.
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").

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
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **search** | **string**| Search by value supports logical AND and OR operators (case-sensitive). Search is performed only over the name and identifier value fields. For more information, refer to the OData query options overview documentation. |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **count** | **bool**| When set to true, returns the total count of matching records included as @recordSetCount in the response body. | [optional]
 **filter** | **string**| Filters the results using the eq operator. Supported fields include network, country, documentType, and idType. For more information, refer to the Avalara filtering guide. | [optional]
 **top** | **int**| The number of items to include in the result. | [optional]
 **skip** | **int**| The number of items to skip in the result. | [optional]
 **order_by** | **string**| The $orderBy query parameter specifies the field and sorting direction for ordering the result set. The value combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space. | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\SearchParticipants200Response**](../Model/SearchParticipants200Response.md)

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
updateTradingPartner($avalara_version, $id, $trading_partner, $x_avalara_client, $x_correlation_id): \AvalaraSDK\ModelEInvoicingV1\UpdateTradingPartner200Response
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

$apiInstance = new AvalaraSDK\Api\TradingPartnersApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$id = 'id_example'; // string | Unique identifier of the trading partner.
$trading_partner = {"name":"Pineapple Labs ltd","registrationDate":"2024-01-01T00:00:00.000Z","identifiers":[{"name":"urn:avalara:systems:des:directory:participant:identifiers:peppolparticipantid","displayName":"","value":"9930:de112233445","extensions":[]}],"address":[{"line1":"Line 1","line2":"Line 2","city":"Brisbane","state":"Queensland","country":"Australia","postalCode":"4000"}],"supportedDocumentTypes":[{"name":"","value":"busdox-docid-qns::urn:oasis:names:specification:ubl:schema:xsd:Invoice-2::Invoice##urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0::2.1","supportedByTradingPartner":true,"supportedByAvalara":true,"extensions":[]}],"consents":{"listInAvalaraDirectory":true},"extensions":[]}; // \AvalaraSDK\ModelEInvoicingV1\TradingPartner
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").

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
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **id** | **string**| Unique identifier of the trading partner. |
 **trading_partner** | [**\AvalaraSDK\ModelEInvoicingV1\TradingPartner**](../Model/TradingPartner.md)|  |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\UpdateTradingPartner200Response**](../Model/UpdateTradingPartner200Response.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
