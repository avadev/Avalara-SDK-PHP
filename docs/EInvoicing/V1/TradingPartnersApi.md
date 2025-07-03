# AvalaraSDK\TradingPartnersApi

All URIs are relative to https://api.sbx.avalara.com/einvoicing.

Method | HTTP request | Description
------------- | ------------- | -------------
[**batchSearchParticipants()**](TradingPartnersApi.md#batchSearchParticipants) | **POST** /trading-partners/batch-searches | Creates a batch search and performs a batch search in the directory for participants in the background.
[**downloadBatchSearchReport()**](TradingPartnersApi.md#downloadBatchSearchReport) | **GET** /trading-partners/batch-searches/{id}/$download-results | Download batch search results in a csv file.
[**getBatchSearchDetail()**](TradingPartnersApi.md#getBatchSearchDetail) | **GET** /trading-partners/batch-searches/{id} | Get the batch search details for a given id.
[**listBatchSearches()**](TradingPartnersApi.md#listBatchSearches) | **GET** /trading-partners/batch-searches | List all batch searches that were previously submitted.
[**searchParticipants()**](TradingPartnersApi.md#searchParticipants) | **GET** /trading-partners | Returns a list of participants matching the input query.


## `batchSearchParticipants()`

```php
batchSearchParticipants($avalara_version, $name, $notification_email, $file, $x_avalara_client, $x_correlation_id): \AvalaraSDK\ModelEInvoicingV1\BatchSearchParticipants202Response
```

Creates a batch search and performs a batch search in the directory for participants in the background.

Handles batch search requests by uploading a file containing search parameters.

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

$avalara_version = 1.2; // string | The HTTP Header meant to specify the version of the API intended to be used
$name = Automotive Companies in London Search; // string | The human readable name given to this batch search.
$notification_email = user@example.com; // string | The email address of the user to whom the batch search completion notification must go to.
$file = "/path/to/file.txt"; // \SplFileObject | CSV file containing search parameters.
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\"
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
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **name** | **string**| The human readable name given to this batch search. |
 **notification_email** | **string**| The email address of the user to whom the batch search completion notification must go to. |
 **file** | **\SplFileObject****\SplFileObject**| CSV file containing search parameters. |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot; | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

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

## `downloadBatchSearchReport()`

```php
downloadBatchSearchReport($avalara_version, $id, $x_avalara_client, $x_correlation_id): \SplFileObject
```

Download batch search results in a csv file.

Downloads the report for a specific batch search using the batch search ID.

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

$avalara_version = 1.2; // string | The HTTP Header meant to specify the version of the API intended to be used
$id = 2f5ea4b5-4dae-445a-b3e4-9f65a61eaa99; // string | The ID of the batch search whose report is to be downloaded.
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\"
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
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **id** | **string**| The ID of the batch search whose report is to be downloaded. |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot; | [optional]
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
getBatchSearchDetail($avalara_version, $id, $x_avalara_client, $x_correlation_id): \AvalaraSDK\ModelEInvoicingV1\BatchSearch
```

Get the batch search details for a given id.

This endpoint provides a detailed information for a specific batch search based on a given ID. It is ideal for tracking the progress of a previously initiated batch search operation.

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

$avalara_version = 1.2; // string | The HTTP Header meant to specify the version of the API intended to be used
$id = 2f5ea4b5-4dae-445a-b3e4-9f65a61eaa99; // string | The ID of the batch search that was submitted earlier.
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\"
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
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **id** | **string**| The ID of the batch search that was submitted earlier. |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot; | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

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

List all batch searches that were previously submitted.

This endpoint provides a way to retrieve a comprehensive list of all batch search operations that have been previously submitted. This endpoint returns details about each batch search, such as their id, status, created date and associated metadata, allowing users to easily view past batch search requests. It's particularly useful for tracking the progress of a previously initiated batch search operations.

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

$avalara_version = 1.2; // string | The HTTP Header meant to specify the version of the API intended to be used
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\"
$filter = name eq 'Batch_Search_Import_V4'; // string | Filter by field name and value. This filter only supports <code>eq</code> .The parameters supported is <code>name</code>.    Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering. Filtering will be done over the provided parameters.
$count = true; // bool | When set to true, the count of the collection is included as @recordSetCount in the response body.
$top = 10; // string | If nonzero, return no more than this number of results. Used with <code>$skip</code> to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 200 records.
$skip = 10; // string | If nonzero, skip this number of results before returning data. Used with <code>$top</code> to provide pagination for large datasets.
$order_by = name desc; // string | The $orderBy query parameter specifies the field and sorting direction for ordering the result set. The value is a string that combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space.
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
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot; | [optional]
 **filter** | **string**| Filter by field name and value. This filter only supports &lt;code&gt;eq&lt;/code&gt; .The parameters supported is &lt;code&gt;name&lt;/code&gt;.    Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering. Filtering will be done over the provided parameters. | [optional]
 **count** | **bool**| When set to true, the count of the collection is included as @recordSetCount in the response body. | [optional]
 **top** | **string**| If nonzero, return no more than this number of results. Used with &lt;code&gt;$skip&lt;/code&gt; to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 200 records. | [optional]
 **skip** | **string**| If nonzero, skip this number of results before returning data. Used with &lt;code&gt;$top&lt;/code&gt; to provide pagination for large datasets. | [optional]
 **order_by** | **string**| The $orderBy query parameter specifies the field and sorting direction for ordering the result set. The value is a string that combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

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
searchParticipants($avalara_version, $search, $x_avalara_client, $count, $filter, $top, $skip, $order_by, $x_correlation_id): \AvalaraSDK\ModelEInvoicingV1\DirectorySearchResponse
```

Returns a list of participants matching the input query.

This endpoint provides a list of trading partners that match a specified input query. The search is performed based on various filters, search text, and other relevant parameters.

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

$avalara_version = 1.2; // string | The HTTP Header meant to specify the version of the API intended to be used
$search = Acme and 7726627177 or BMW; // string | Search by value supports logical AND and OR. Refer to [https://learn.microsoft.com/en-us/odata/concepts/queryoptions-overview#search](https://learn.microsoft.com/en-us/odata/concepts/queryoptions-overview#search) for more information on search. Search will be done over <code>name</code> and <code>identifier</code> parameters only.
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\"
$count = true; // bool | When set to true, the count of the collection is included as @recordSetCount in the response body.
$filter = network eq 'Peppol' and country eq 'Australia'; // string | Filter by field name and value. This filter only supports <code>eq</code> .The parameters supported are <code>network</code>, <code>country</code>, <code>documentType</code>, <code>idType</code>.          Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering. Filtering will be done over the provided parameters.
$top = 10; // string | If nonzero, return no more than this number of results. Used with <code>$skip</code> to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 200 records.
$skip = 10; // string | If nonzero, skip this number of results before returning data. Used with <code>$top</code> to provide pagination for large datasets.
$order_by = name desc; // string | The $orderBy query parameter specifies the field and sorting direction for ordering the result set. The value is a string that combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space.
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
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **search** | **string**| Search by value supports logical AND and OR. Refer to [https://learn.microsoft.com/en-us/odata/concepts/queryoptions-overview#search](https://learn.microsoft.com/en-us/odata/concepts/queryoptions-overview#search) for more information on search. Search will be done over &lt;code&gt;name&lt;/code&gt; and &lt;code&gt;identifier&lt;/code&gt; parameters only. |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot; | [optional]
 **count** | **bool**| When set to true, the count of the collection is included as @recordSetCount in the response body. | [optional]
 **filter** | **string**| Filter by field name and value. This filter only supports &lt;code&gt;eq&lt;/code&gt; .The parameters supported are &lt;code&gt;network&lt;/code&gt;, &lt;code&gt;country&lt;/code&gt;, &lt;code&gt;documentType&lt;/code&gt;, &lt;code&gt;idType&lt;/code&gt;.          Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering. Filtering will be done over the provided parameters. | [optional]
 **top** | **string**| If nonzero, return no more than this number of results. Used with &lt;code&gt;$skip&lt;/code&gt; to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 200 records. | [optional]
 **skip** | **string**| If nonzero, skip this number of results before returning data. Used with &lt;code&gt;$top&lt;/code&gt; to provide pagination for large datasets. | [optional]
 **order_by** | **string**| The $orderBy query parameter specifies the field and sorting direction for ordering the result set. The value is a string that combines a field name and a sorting direction (asc for ascending or desc for descending), separated by a space. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\DirectorySearchResponse**](../Model/DirectorySearchResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
