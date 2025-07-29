# Avalara\SDK\MandatesApi

All URIs are relative to https://api.sbx.avalara.com/einvoicing.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getMandateDataInputFields()**](MandatesApi.md#getMandateDataInputFields) | **GET** /mandates/{mandateId}/data-input-fields | Returns document field information for a country mandate, a selected document type, and its version
[**getMandates()**](MandatesApi.md#getMandates) | **GET** /mandates | List country mandates that are supported by the Avalara E-Invoicing platform


## `getMandateDataInputFields()`

```php
getMandateDataInputFields($avalara_version, $mandate_id, $document_type, $document_version, $x_avalara_client): \Avalara\SDK\Model\EInvoicing\V1\MandateDataInputField[]
```

Returns document field information for a country mandate, a selected document type, and its version

This endpoint provides document field details and the optionality of fields (required, conditional, optional) of different documents supported by the country mandate. Use the GET <code>/mandates</code> endpoint to retrieve all available country mandates, their supported document types and supported versions. You can use the `documentType` and `documentVersion` query parameters to retrieve the input fields for a particular document type and document version.

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

$apiInstance = new Avalara\SDK\Api\MandatesApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used
$mandate_id = AD-B2G-PEPPOL; // string | The unique ID for the mandate that was returned in the GET /einvoicing/mandates response body
$document_type = ubl-invoice; // string | Select the documentType for which you wish to view the data-input-fields (You may obtain the supported documentTypes from the GET /mandates endpoint)
$document_version = 2.1; // string | Select the document version of the documentType (You may obtain the supported documentVersion from the GET /mandates endpoint)
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint.

try {
    $result = $apiInstance->getMandateDataInputFields($avalara_version, $mandate_id, $document_type, $document_version, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MandatesApi->getMandateDataInputFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **mandate_id** | **string**| The unique ID for the mandate that was returned in the GET /einvoicing/mandates response body |
 **document_type** | **string**| Select the documentType for which you wish to view the data-input-fields (You may obtain the supported documentTypes from the GET /mandates endpoint) |
 **document_version** | **string**| Select the document version of the documentType (You may obtain the supported documentVersion from the GET /mandates endpoint) |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint. | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\MandateDataInputField[]**](../Model/MandateDataInputField.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getMandates()`

```php
getMandates($avalara_version, $x_avalara_client, $filter, $top, $skip, $count, $count_only): \Avalara\SDK\Model\EInvoicing\V1\MandatesResponse
```

List country mandates that are supported by the Avalara E-Invoicing platform

This endpoint offers a list of country mandates supported by the Avalara E-Invoicing API.

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

$apiInstance = new Avalara\SDK\Api\MandatesApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint.
$filter = countryMandate eq DE-B2G-PEPPOL; // string | Filter by field name and value. This filter only supports <code>eq</code> and <code>contains</code>. Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering.
$top = 10; // float | If nonzero, return no more than this number of results. Used with <code>$skip</code> to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 1,000 records.
$skip = 10; // float | If nonzero, skip this number of results before returning data. Used with <code>$top</code> to provide pagination for large datasets.
$count = true; // bool | When set to true, the count of the collection is also returned in the response body.
$count_only = true; // bool | When set to true, only the count of the collection is returned

try {
    $result = $apiInstance->getMandates($avalara_version, $x_avalara_client, $filter, $top, $skip, $count, $count_only);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MandatesApi->getMandates: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint. | [optional]
 **filter** | **string**| Filter by field name and value. This filter only supports &lt;code&gt;eq&lt;/code&gt; and &lt;code&gt;contains&lt;/code&gt;. Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering. | [optional]
 **top** | **float**| If nonzero, return no more than this number of results. Used with &lt;code&gt;$skip&lt;/code&gt; to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 1,000 records. | [optional]
 **skip** | **float**| If nonzero, skip this number of results before returning data. Used with &lt;code&gt;$top&lt;/code&gt; to provide pagination for large datasets. | [optional]
 **count** | **bool**| When set to true, the count of the collection is also returned in the response body. | [optional]
 **count_only** | **bool**| When set to true, only the count of the collection is returned | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\MandatesResponse**](../Model/MandatesResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
