# AvalaraSDK\TINMatchesApi

All URIs are relative to https://api.sbx.avalara.com/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getBulkTinMatch()**](TINMatchesApi.md#getBulkTinMatch) | **GET** /tin-matches/$bulk/{id} | Get bulk TIN match details
[**getBulkTinMatchResults()**](TINMatchesApi.md#getBulkTinMatchResults) | **GET** /tin-matches/$bulk/{id}/results | List bulk TIN match results
[**performRealTimeTinMatch()**](TINMatchesApi.md#performRealTimeTinMatch) | **POST** /tin-matches/$real-time | Perform real time TIN Match
[**submitBulkTinMatch()**](TINMatchesApi.md#submitBulkTinMatch) | **POST** /tin-matches/$bulk | Submit bulk TIN match


## `getBulkTinMatch()`

```php
getBulkTinMatch($id, $avalara_version, $x_correlation_id, $x_avalara_client): \AvalaraSDK\ModelA1099V2\BulkTinMatchResponse
```

Get bulk TIN match details

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

$apiInstance = new AvalaraSDK\Api\TINMatchesApi($client);

$id = 'id_example'; // string | The bulk ID
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 77d79db6-e884-4ef0-a76d-0c10c41f5993; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->getBulkTinMatch($id, $avalara_version, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TINMatchesApi->getBulkTinMatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The bulk ID |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\BulkTinMatchResponse**](../Model/BulkTinMatchResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getBulkTinMatchResults()`

```php
getBulkTinMatchResults($id, $avalara_version, $filter, $top, $skip, $order_by, $count, $count_only, $x_correlation_id, $x_avalara_client): \AvalaraSDK\ModelA1099V2\PaginatedQueryResultModelBulkTinMatchResultItemResponse
```

List bulk TIN match results

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

$apiInstance = new AvalaraSDK\Api\TINMatchesApi($client);

$id = 'id_example'; // string | The bulk ID
$avalara_version = 2.0.0; // string | API version
$filter = 'filter_example'; // string | A filter statement to identify specific records to retrieve.  For more information on filtering, see <a href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</a>.
$top = 56; // int | If zero or greater than 1000, return at most 1000 results.  Otherwise, return this number of results.  Used with skip to provide pagination for large datasets.
$skip = 56; // int | If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets.
$order_by = 'order_by_example'; // string | A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC.
$count = True; // bool | If true, return the global count of elements in the collection.
$count_only = True; // bool | If true, return ONLY the global count of elements in the collection.  It only applies when count=true.
$x_correlation_id = 8bd78a31-95dc-4091-9f0e-fd0647ecc6f5; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->getBulkTinMatchResults($id, $avalara_version, $filter, $top, $skip, $order_by, $count, $count_only, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TINMatchesApi->getBulkTinMatchResults: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The bulk ID |
 **avalara_version** | **string**| API version |
 **filter** | **string**| A filter statement to identify specific records to retrieve.  For more information on filtering, see &lt;a href&#x3D;\&quot;https://developer.avalara.com/avatax/filtering-in-rest/\&quot;&gt;Filtering in REST&lt;/a&gt;. | [optional]
 **top** | **int**| If zero or greater than 1000, return at most 1000 results.  Otherwise, return this number of results.  Used with skip to provide pagination for large datasets. | [optional]
 **skip** | **int**| If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets. | [optional]
 **order_by** | **string**| A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC. | [optional]
 **count** | **bool**| If true, return the global count of elements in the collection. | [optional]
 **count_only** | **bool**| If true, return ONLY the global count of elements in the collection.  It only applies when count&#x3D;true. | [optional]
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\PaginatedQueryResultModelBulkTinMatchResultItemResponse**](../Model/PaginatedQueryResultModelBulkTinMatchResultItemResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `performRealTimeTinMatch()`

```php
performRealTimeTinMatch($avalara_version, $x_correlation_id, $x_avalara_client, $real_time_tin_match_request): \AvalaraSDK\ModelA1099V2\RealTimeTinMatchResponse
```

Perform real time TIN Match

Perform real time TIN Match.

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

$apiInstance = new AvalaraSDK\Api\TINMatchesApi($client);

$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 7f2a23f6-59ed-4fb9-95fd-7937e99952f5; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$real_time_tin_match_request = {"tinType":"BUSINESS","tin":"94-2765439","name":"Acme Corporation"}; // \AvalaraSDK\ModelA1099V2\RealTimeTinMatchRequest | Required data to perform TIN match

try {
    $result = $apiInstance->performRealTimeTinMatch($avalara_version, $x_correlation_id, $x_avalara_client, $real_time_tin_match_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TINMatchesApi->performRealTimeTinMatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
 **real_time_tin_match_request** | [**\AvalaraSDK\ModelA1099V2\RealTimeTinMatchRequest**](../Model/RealTimeTinMatchRequest.md)| Required data to perform TIN match | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\RealTimeTinMatchResponse**](../Model/RealTimeTinMatchResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `submitBulkTinMatch()`

```php
submitBulkTinMatch($avalara_version, $x_correlation_id, $x_avalara_client, $bulk_tin_match_request): \AvalaraSDK\ModelA1099V2\BulkTinMatchAcceptedResponse
```

Submit bulk TIN match

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

$apiInstance = new AvalaraSDK\Api\TINMatchesApi($client);

$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 88b0e4e3-1fd9-437c-9744-753f89dfef9f; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$bulk_tin_match_request = {"items":[{"referenceId":"ACME0001","tinType":"BUSINESS","tin":"94-2765439","name":"Acme Corporation"},{"referenceId":"123JD","tinType":"INDIVIDUAL","tin":"543-45-6789","name":"John Doe"}]}; // \AvalaraSDK\ModelA1099V2\BulkTinMatchRequest | Required TIN collection to perform bulk TIN match

try {
    $result = $apiInstance->submitBulkTinMatch($avalara_version, $x_correlation_id, $x_avalara_client, $bulk_tin_match_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TINMatchesApi->submitBulkTinMatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
 **bulk_tin_match_request** | [**\AvalaraSDK\ModelA1099V2\BulkTinMatchRequest**](../Model/BulkTinMatchRequest.md)| Required TIN collection to perform bulk TIN match | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\BulkTinMatchAcceptedResponse**](../Model/BulkTinMatchAcceptedResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
