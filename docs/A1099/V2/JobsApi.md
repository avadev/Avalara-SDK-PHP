# AvalaraSDK\JobsApi

All URIs are relative to https://api.sbx.avalara.com/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getJob()**](JobsApi.md#getJob) | **GET** /jobs/{id} | Retrieves information about the job


## `getJob()`

```php
getJob($id, $avalara_version, $x_correlation_id, $x_avalara_client): \AvalaraSDK\ModelA1099V2\JobResponse
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

$apiInstance = new AvalaraSDK\Api\JobsApi($client);

$id = 'id_example'; // string | Job id obtained from other API responses, like `/1099/bulk-upsert`.
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = b17e0df6-816d-45a2-8b6d-a2d79a90a02c; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->getJob($id, $avalara_version, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobsApi->getJob: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Job id obtained from other API responses, like &#x60;/1099/bulk-upsert&#x60;. |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\JobResponse**](../Model/JobResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
