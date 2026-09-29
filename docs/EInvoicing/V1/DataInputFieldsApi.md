# AvalaraSDK\DataInputFieldsApi

All URIs are relative to https://api.sbx.avalara.com/einvoicing.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDataInputFields()**](DataInputFieldsApi.md#getDataInputFields) | **GET** /data-input-fields | Returns the optionality of document fields for different country mandates


## `getDataInputFields()`

```php
getDataInputFields($avalara_version, $x_avalara_client, $filter, $top, $skip, $count, $count_only): \AvalaraSDK\ModelEInvoicingV1\DataInputFieldsResponse
```

Returns the optionality of document fields for different country mandates

This endpoint returns a list of required, conditional, and optional fields for each country mandate. Use the mandates endpoint to retrieve all available country mandates. Use the $filter query parameter to retrieve fields for a specific mandate.

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

$apiInstance = new AvalaraSDK\Api\DataInputFieldsApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$filter = requiredFor/countryMandate eq AU-B2G-PEPPOL; // string | Filter by field name and value. This filter supports only eq and contains. For more information, refer to the Avalara filtering guide.
$top = 56; // int | The number of items to include in the result.
$skip = 56; // int | The number of items to skip in the result.
$count = true; // bool | When set to true, the response body also includes the count of items in the collection.
$count_only = true; // bool | When set to true, the response returns only the count of items in the collection.

try {
    $result = $apiInstance->getDataInputFields($avalara_version, $x_avalara_client, $filter, $top, $skip, $count, $count_only);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataInputFieldsApi->getDataInputFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **filter** | **string**| Filter by field name and value. This filter supports only eq and contains. For more information, refer to the Avalara filtering guide. | [optional]
 **top** | **int**| The number of items to include in the result. | [optional]
 **skip** | **int**| The number of items to skip in the result. | [optional]
 **count** | **bool**| When set to true, the response body also includes the count of items in the collection. | [optional]
 **count_only** | **bool**| When set to true, the response returns only the count of items in the collection. | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\DataInputFieldsResponse**](../Model/DataInputFieldsResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
