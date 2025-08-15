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

This endpoint provides a list of required, conditional, and optional fields for each country mandate. You can use the <code>mandates</code> endpoint to retrieve all available country mandates. You can use the $filter query parameter to retrieve fields for a particular mandate

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

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint.
$filter = requiredFor/countryMandate eq AU-B2G-PEPPOL; // string | Filter by field name and value. This filter only supports <code>eq</code> and <code>contains</code>. Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering.
$top = 56; // int | The number of items to include in the result.
$skip = 56; // int | The number of items to skip in the result.
$count = true; // bool | When set to true, the count of the collection is also returned in the response body
$count_only = true; // bool | When set to true, only the count of the collection is returned

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
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint. | [optional]
 **filter** | **string**| Filter by field name and value. This filter only supports &lt;code&gt;eq&lt;/code&gt; and &lt;code&gt;contains&lt;/code&gt;. Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering. | [optional]
 **top** | **int**| The number of items to include in the result. | [optional]
 **skip** | **int**| The number of items to skip in the result. | [optional]
 **count** | **bool**| When set to true, the count of the collection is also returned in the response body | [optional]
 **count_only** | **bool**| When set to true, only the count of the collection is returned | [optional]

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
