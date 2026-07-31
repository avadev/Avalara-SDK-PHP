# Avalara\SDK\TINMatchesApi

All URIs are relative to https://api-ava1099.edge.qa.us-east-1.aws.avalara.io/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**performRealTimeTinMatch()**](TINMatchesApi.md#performRealTimeTinMatch) | **POST** /tin-matches/$real-time | Perform real time TIN Match


## `performRealTimeTinMatch()`

```php
performRealTimeTinMatch($avalara_version, $x_correlation_id, $x_avalara_client, $real_time_tin_match_request): \Avalara\SDK\Model\A1099\V2\RealTimeTinMatchResponse
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

$apiInstance = new Avalara\SDK\Api\TINMatchesApi($client);

$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 86993e01-0897-4667-b8f3-bac8c0081c4c; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$real_time_tin_match_request = {"tinType":"BUSINESS","tin":"94-2765439","name":"Acme Corporation"}; // \Avalara\SDK\Model\A1099\V2\RealTimeTinMatchRequest | Required data to perform TIN match

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
 **real_time_tin_match_request** | [**\Avalara\SDK\Model\A1099\V2\RealTimeTinMatchRequest**](../Model/RealTimeTinMatchRequest.md)| Required data to perform TIN match | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\RealTimeTinMatchResponse**](../Model/RealTimeTinMatchResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
