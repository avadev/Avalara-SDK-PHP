# Avalara\SDK\ReportsApi

All URIs are relative to https://api.sbx.avalara.com/einvoicing.

Method | HTTP request | Description
------------- | ------------- | -------------
[**downloadReport()**](ReportsApi.md#downloadReport) | **GET** /reports/{reportId}/$download | Returns a pre-signed download URL for a report
[**getReportById()**](ReportsApi.md#getReportById) | **GET** /reports/{reportId}/status | Retrieves a report by its unique ID
[**getReports()**](ReportsApi.md#getReports) | **GET** /reports | Returns a list of reports


## `downloadReport()`

```php
downloadReport($avalara_version, $report_id, $x_avalara_client, $x_correlation_id): \Avalara\SDK\Model\EInvoicing\V1\ReportDownloadResponse
```

Returns a pre-signed download URL for a report

Returns a pre-signed URL to download the report file when it is available. If the report has not yet been generated, a 404 (not found) is returned.

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

$apiInstance = new Avalara\SDK\Api\ReportsApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$report_id = 'report_id_example'; // string | The unique ID for this report as returned in a GET /reports response.
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").

try {
    $result = $apiInstance->downloadReport($avalara_version, $report_id, $x_avalara_client, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReportsApi->downloadReport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **report_id** | **string**| The unique ID for this report as returned in a GET /reports response. |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\ReportDownloadResponse**](../Model/ReportDownloadResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getReportById()`

```php
getReportById($avalara_version, $report_id, $x_avalara_client, $x_correlation_id): \Avalara\SDK\Model\EInvoicing\V1\ReportItem
```

Retrieves a report by its unique ID

Retrieves a specific report by its unique identifier. Returns complete report details including metadata, status, and associated information.

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

$apiInstance = new Avalara\SDK\Api\ReportsApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$report_id = 'report_id_example'; // string | The unique ID for this report as returned in a GET /reports response.
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").

try {
    $result = $apiInstance->getReportById($avalara_version, $report_id, $x_avalara_client, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReportsApi->getReportById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **report_id** | **string**| The unique ID for this report as returned in a GET /reports response. |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\ReportItem**](../Model/ReportItem.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getReports()`

```php
getReports($avalara_version, $x_avalara_client, $x_correlation_id, $filter, $top, $skip, $count, $count_only, $orderby): \Avalara\SDK\Model\EInvoicing\V1\ReportListResponse
```

Returns a list of reports

Retrieves all reports with optional filtering, paging, and sorting. Results are filtered by tenant. Supports OData-style filtering using the $filter parameter. Use $top and $skip for paging; when more results exist, the response includes @nextLink to fetch the next page. Default sort order is by report generation date (descending).

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

$apiInstance = new Avalara\SDK\Api\ReportsApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").
$filter = status eq 'COMPLETED'; // string | OData-style filter expression. Supports operators: eq, ne, gt, ge, lt, le, like, ilike, contains. Examples: status eq 'COMPLETED', reportGenerateDate gt '2025-11-01', transactionIds contains 'TXN-2025-001'
$top = 56; // int | The number of items to include in the result.
$skip = 56; // int | The number of items to skip in the result.
$count = true; // string | When set to true, the response body also includes the count of items in the collection.
$count_only = false; // string | When set to true, the response returns only the count of items in the collection.
$orderby = reportGenerateDate desc; // string | OData-style orderby expression. Format: 'field asc' or 'field desc'. Default: reportGenerateDate desc

try {
    $result = $apiInstance->getReports($avalara_version, $x_avalara_client, $x_correlation_id, $filter, $top, $skip, $count, $count_only, $orderby);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReportsApi->getReports: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]
 **filter** | **string**| OData-style filter expression. Supports operators: eq, ne, gt, ge, lt, le, like, ilike, contains. Examples: status eq &#39;COMPLETED&#39;, reportGenerateDate gt &#39;2025-11-01&#39;, transactionIds contains &#39;TXN-2025-001&#39; | [optional]
 **top** | **int**| The number of items to include in the result. | [optional]
 **skip** | **int**| The number of items to skip in the result. | [optional]
 **count** | **string**| When set to true, the response body also includes the count of items in the collection. | [optional]
 **count_only** | **string**| When set to true, the response returns only the count of items in the collection. | [optional]
 **orderby** | **string**| OData-style orderby expression. Format: &#39;field asc&#39; or &#39;field desc&#39;. Default: reportGenerateDate desc | [optional] [default to &#39;reportGenerateDate desc&#39;]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\ReportListResponse**](../Model/ReportListResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
