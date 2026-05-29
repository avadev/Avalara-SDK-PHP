# AvalaraSDK\TaxIdentifiersApi

All URIs are relative to https://api.sbx.avalara.com/einvoicing.

Method | HTTP request | Description
------------- | ------------- | -------------
[**taxIdentifierSchemaByCountry()**](TaxIdentifiersApi.md#taxIdentifierSchemaByCountry) | **GET** /tax-identifiers/schema | Returns the tax identifier request and response schema for a specific country.
[**validateTaxIdentifier()**](TaxIdentifiersApi.md#validateTaxIdentifier) | **POST** /tax-identifiers/validate | Validates a tax identifier.


## `taxIdentifierSchemaByCountry()`

```php
taxIdentifierSchemaByCountry($avalara_version, $country_code, $x_avalara_client, $x_correlation_id, $type): \AvalaraSDK\ModelEInvoicingV1\TaxIdentifierSchemaByCountry200Response
```

Returns the tax identifier request and response schema for a specific country.

Returns the tax identifier request and response schema for a specific country.

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

$apiInstance = new AvalaraSDK\Api\TaxIdentifiersApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$country_code = DE; // string | Two-letter ISO 3166 country code for which to retrieve the schema (for example \"DE\").
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").
$type = request; // string | Specifies which schema to return: \"request\" to receive the request validation schema or \"response\" to receive the response validation schema.

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
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **country_code** | **string**| Two-letter ISO 3166 country code for which to retrieve the schema (for example \&quot;DE\&quot;). |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]
 **type** | **string**| Specifies which schema to return: \&quot;request\&quot; to receive the request validation schema or \&quot;response\&quot; to receive the response validation schema. | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\TaxIdentifierSchemaByCountry200Response**](../Model/TaxIdentifierSchemaByCountry200Response.md)

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
validateTaxIdentifier($avalara_version, $tax_identifier_request, $x_avalara_client, $x_correlation_id): \AvalaraSDK\ModelEInvoicingV1\TaxIdentifierResponse
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

$apiInstance = new AvalaraSDK\Api\TaxIdentifiersApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$tax_identifier_request = {"countryCode":"DE","identifierType":"vat","identifier":"123456789"}; // \AvalaraSDK\ModelEInvoicingV1\TaxIdentifierRequest
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").

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
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **tax_identifier_request** | [**\AvalaraSDK\ModelEInvoicingV1\TaxIdentifierRequest**](../Model/TaxIdentifierRequest.md)|  |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\TaxIdentifierResponse**](../Model/TaxIdentifierResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
