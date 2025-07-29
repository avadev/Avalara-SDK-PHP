# Avalara\SDK\TaxIdentifiersApi

All URIs are relative to https://api.sbx.avalara.com/einvoicing.

Method | HTTP request | Description
------------- | ------------- | -------------
[**taxIdentifierSchemaByCountry()**](TaxIdentifiersApi.md#taxIdentifierSchemaByCountry) | **GET** /tax-identifiers/schema | Returns the tax identifier request &amp; response schema for a specific country.
[**validateTaxIdentifier()**](TaxIdentifiersApi.md#validateTaxIdentifier) | **POST** /tax-identifiers/validate | Validates a tax identifier.


## `taxIdentifierSchemaByCountry()`

```php
taxIdentifierSchemaByCountry($avalara_version, $country_code, $x_avalara_client, $x_correlation_id, $type): \Avalara\SDK\Model\EInvoicing\V1\TaxIdentifierSchemaByCountry200Response
```

Returns the tax identifier request & response schema for a specific country.

This endpoint retrieves the request and response schema required to validate tax identifiers based on a specific country's requirements. This can include both standard fields and any additional parameters required by the respective country's tax authority.

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

$apiInstance = new Avalara\SDK\Api\TaxIdentifiersApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used.
$country_code = DE; // string | The two-letter ISO-3166 country code for which the schema should be retrieved.
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\".
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | The caller can use this as an identifier to use as a correlation id to trace the call.
$type = request; // string | Specifies whether to return the request or response schema.

try {
    $result = $apiInstance->taxIdentifierSchemaByCountry($avalara_version, $country_code, $x_avalara_client, $x_correlation_id, $type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TaxIdentifiersApi->taxIdentifierSchemaByCountry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used. |
 **country_code** | **string**| The two-letter ISO-3166 country code for which the schema should be retrieved. |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]
 **type** | **string**| Specifies whether to return the request or response schema. | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\TaxIdentifierSchemaByCountry200Response**](../Model/TaxIdentifierSchemaByCountry200Response.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `validateTaxIdentifier()`

```php
validateTaxIdentifier($avalara_version, $tax_identifier_request, $x_avalara_client, $x_correlation_id): \Avalara\SDK\Model\EInvoicing\V1\TaxIdentifierResponse
```

Validates a tax identifier.

This endpoint verifies whether a given tax identifier is valid and properly formatted according to the rules of the applicable country or tax system.

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

$apiInstance = new Avalara\SDK\Api\TaxIdentifiersApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used.
$tax_identifier_request = {"countryCode":"DE","identifierType":"vat","identifier":"123456789"}; // \Avalara\SDK\Model\EInvoicing\V1\TaxIdentifierRequest
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\".
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | The caller can use this as an identifier to use as a correlation id to trace the call.

try {
    $result = $apiInstance->validateTaxIdentifier($avalara_version, $tax_identifier_request, $x_avalara_client, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TaxIdentifiersApi->validateTaxIdentifier: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used. |
 **tax_identifier_request** | [**\Avalara\SDK\Model\EInvoicing\V1\TaxIdentifierRequest**](../Model/TaxIdentifierRequest.md)|  |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot;. | [optional]
 **x_correlation_id** | **string**| The caller can use this as an identifier to use as a correlation id to trace the call. | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\TaxIdentifierResponse**](../Model/TaxIdentifierResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
