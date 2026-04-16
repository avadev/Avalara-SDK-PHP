# AvalaraSDK\CodeListsApi

All URIs are relative to https://api.sbx.avalara.com/einvoicing.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getCodeList()**](CodeListsApi.md#getCodeList) | **GET** /codelists/{codelistId} | Retrieves a code list by ID for a specific country
[**getCodeListList()**](CodeListsApi.md#getCodeListList) | **GET** /codelists | Returns a list of code lists for a specific country


## `getCodeList()`

```php
getCodeList($avalara_version, $codelist_id, $country_code, $x_avalara_client, $effective_date, $sunset_date): \AvalaraSDK\Model\EInvoicing\V1\CodeListResponse
```

Retrieves a code list by ID for a specific country

A Code List is a controlled set of predefined, standardized values used to populate specific fields in electronic documents (such as e-invoices). Each code has a stable, machine-readable identifier and a human-readable description. Code Lists are typically based on global standards (e.g., UN/CEFACT, ISO, EN16931) and may include jurisdiction-specific extensions or restrictions.<br><br>Code Lists are versioned, and each version may have defined effective and sunset dates to ensure that the correct set of allowable values is applied according to regulatory or jurisdictional requirements.<br><br>By default, the API returns only non-expired code list versions (versions where the sunset date has not passed). To retrieve expired versions or filter by specific date ranges, use the <code>effectiveDate</code> and <code>sunsetDate</code> query parameters.

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

$apiInstance = new AvalaraSDK\Api\CodeListsApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$codelist_id = ab123343-3432-423c-ac3f-53453scs9999; // string | System-generated unique identifier of the code list definition. Typically a UUID used to reference this code list internally or via APIs.
$country_code = FR; // string | Two-letter ISO 3166-1 alpha-2 country code indicating the jurisdiction this code list applies to.
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$effective_date = Tue Dec 31 16:00:00 PST 2024; // \DateTime | Filter code list versions by effective date. Returns versions that are effective on or before this date. Format: YYYY-MM-DD (ISO 8601). If not specified, defaults to the current date. sunsetDate is required when effectiveDate is provided.
$sunset_date = Wed Dec 30 16:00:00 PST 2026; // \DateTime | Filter code list versions by sunset date. Returns versions that have not yet sunset on or before this date. Format: YYYY-MM-DD (ISO 8601). If not specified, only non-expired versions are returned.

try {
    $result = $apiInstance->getCodeList($avalara_version, $codelist_id, $country_code, $x_avalara_client, $effective_date, $sunset_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CodeListsApi->getCodeList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **codelist_id** | **string**| System-generated unique identifier of the code list definition. Typically a UUID used to reference this code list internally or via APIs. |
 **country_code** | **string**| Two-letter ISO 3166-1 alpha-2 country code indicating the jurisdiction this code list applies to. |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **effective_date** | **\DateTime**| Filter code list versions by effective date. Returns versions that are effective on or before this date. Format: YYYY-MM-DD (ISO 8601). If not specified, defaults to the current date. sunsetDate is required when effectiveDate is provided. | [optional]
 **sunset_date** | **\DateTime**| Filter code list versions by sunset date. Returns versions that have not yet sunset on or before this date. Format: YYYY-MM-DD (ISO 8601). If not specified, only non-expired versions are returned. | [optional]

### Return type

[**\AvalaraSDK\Model\EInvoicing\V1\CodeListResponse**](../Model/CodeListResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getCodeListList()`

```php
getCodeListList($avalara_version, $country_code, $x_avalara_client, $effective_date, $sunset_date, $count, $count_only, $top, $skip): \AvalaraSDK\Model\EInvoicing\V1\CodeListListResponse
```

Returns a list of code lists for a specific country

Get a list of code lists on the Avalara E-Invoicing platform for the specified country. By default, the API returns only non-expired code lists (code lists where the sunset date has not passed). To retrieve expired code lists or filter by specific date ranges, use the <code>effectiveDate</code> and <code>sunsetDate</code> query parameters.<br><br>A Code List is a controlled set of predefined, standardized values used to populate specific fields in electronic documents (such as e-invoices). Each code has a stable, machine-readable identifier and a human-readable description. Code Lists are typically based on global standards (e.g., UN/CEFACT, ISO, EN16931) and may include jurisdiction-specific extensions or restrictions.

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

$apiInstance = new AvalaraSDK\Api\CodeListsApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$country_code = FR; // string | Two-letter ISO 3166-1 alpha-2 country code indicating the jurisdiction for which code lists should be returned.
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$effective_date = Tue Dec 31 16:00:00 PST 2024; // \DateTime | Filter code lists by effective date. Returns code lists that are effective on or before this date. Format: YYYY-MM-DD (ISO 8601). If not specified, defaults to the current date. sunsetDate is required when effectiveDate is provided.
$sunset_date = Wed Dec 30 16:00:00 PST 2026; // \DateTime | Filter code lists by sunset date. Returns code lists that have not yet sunset on or before this date. Format: YYYY-MM-DD (ISO 8601). If not specified, only non-expired code lists are returned.
$count = true; // string | When set to true, the response body also includes the count of items in the collection.
$count_only = false; // string | When set to true, the response returns only the count of items in the collection.
$top = 56; // int | The number of items to include in the result.
$skip = 56; // int | The number of items to skip in the result.

try {
    $result = $apiInstance->getCodeListList($avalara_version, $country_code, $x_avalara_client, $effective_date, $sunset_date, $count, $count_only, $top, $skip);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CodeListsApi->getCodeListList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **country_code** | **string**| Two-letter ISO 3166-1 alpha-2 country code indicating the jurisdiction for which code lists should be returned. |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **effective_date** | **\DateTime**| Filter code lists by effective date. Returns code lists that are effective on or before this date. Format: YYYY-MM-DD (ISO 8601). If not specified, defaults to the current date. sunsetDate is required when effectiveDate is provided. | [optional]
 **sunset_date** | **\DateTime**| Filter code lists by sunset date. Returns code lists that have not yet sunset on or before this date. Format: YYYY-MM-DD (ISO 8601). If not specified, only non-expired code lists are returned. | [optional]
 **count** | **string**| When set to true, the response body also includes the count of items in the collection. | [optional]
 **count_only** | **string**| When set to true, the response returns only the count of items in the collection. | [optional]
 **top** | **int**| The number of items to include in the result. | [optional]
 **skip** | **int**| The number of items to skip in the result. | [optional]

### Return type

[**\AvalaraSDK\Model\EInvoicing\V1\CodeListListResponse**](../Model/CodeListListResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
