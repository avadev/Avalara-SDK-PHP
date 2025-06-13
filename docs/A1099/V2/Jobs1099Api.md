# Avalara\SDK\Jobs1099Api

All URIs are relative to https://api-ava1099.eta.sbx.us-east-1.aws.avalara.io/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getJob()**](Jobs1099Api.md#getJob) | **GET** /1099/jobs/{id} | Retrieves information about the job


## `getJob()`

```php
getJob($id, $avalara_version, $x_correlation_id): \Avalara\SDK\Model\A1099\V2\JobResult
```

Retrieves information about the job

Retrieves information about the job

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

$apiInstance = new Avalara\SDK\Api\Jobs1099Api($client);

$id = 'id_example'; // string | Job id obtained from other API responses, like `/1099/bulk-upsert`.
$avalara_version = 2.0; // string | API version
$x_correlation_id = da0c2f4f-cc07-41f5-a4a0-d0683f09f28e; // string | Unique correlation Id in a GUID format

try {
    $result = $apiInstance->getJob($id, $avalara_version, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Jobs1099Api->getJob: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Job id obtained from other API responses, like &#x60;/1099/bulk-upsert&#x60;. |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |

### Return type

[**\Avalara\SDK\Model\A1099\V2\JobResult**](../Model/JobResult.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
