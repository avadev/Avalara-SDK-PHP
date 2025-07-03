# AvalaraSDK\Issuers1099Api

All URIs are relative to https://api-ava1099.eta.sbx.us-east-1.aws.avalara.io/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createIssuer()**](Issuers1099Api.md#createIssuer) | **POST** /1099/issuers | Create an issuer
[**deleteIssuer()**](Issuers1099Api.md#deleteIssuer) | **DELETE** /1099/issuers/{id} | Delete an issuer
[**getIssuer()**](Issuers1099Api.md#getIssuer) | **GET** /1099/issuers/{id} | Get an issuer
[**getIssuers()**](Issuers1099Api.md#getIssuers) | **GET** /1099/issuers | List issuers
[**updateIssuer()**](Issuers1099Api.md#updateIssuer) | **PUT** /1099/issuers/{id} | Update an issuer


## `createIssuer()`

```php
createIssuer($avalara_version, $x_correlation_id, $issuer_command): \AvalaraSDK\ModelA1099V2\IssuerResponse
```

Create an issuer

Create a new issuer

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

$apiInstance = new AvalaraSDK\Api\Issuers1099Api($client);

$avalara_version = 2.0; // string | API version
$x_correlation_id = ac3bb1f6-353e-4933-afb5-07862797f03e; // string | Unique correlation Id in a GUID format
$issuer_command = new \AvalaraSDK\ModelA1099V2\IssuerCommand(); // \AvalaraSDK\ModelA1099V2\IssuerCommand | The issuer to create

try {
    $result = $apiInstance->createIssuer($avalara_version, $x_correlation_id, $issuer_command);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Issuers1099Api->createIssuer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **issuer_command** | [**\AvalaraSDK\ModelA1099V2\IssuerCommand**](../Model/IssuerCommand.md)| The issuer to create | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\IssuerResponse**](../Model/IssuerResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `deleteIssuer()`

```php
deleteIssuer($id, $avalara_version, $x_correlation_id)
```

Delete an issuer

Delete an issuer

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

$apiInstance = new AvalaraSDK\Api\Issuers1099Api($client);

$id = 'id_example'; // string | Id of the issuer to delete
$avalara_version = 2.0; // string | API version
$x_correlation_id = 840d88dc-1469-4611-9df8-a9e787a04b50; // string | Unique correlation Id in a GUID format

try {
    $apiInstance->deleteIssuer($id, $avalara_version, $x_correlation_id);
} catch (Exception $e) {
    echo 'Exception when calling Issuers1099Api->deleteIssuer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of the issuer to delete |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |

### Return type

void (empty response body)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getIssuer()`

```php
getIssuer($id, $avalara_version, $x_correlation_id): \AvalaraSDK\ModelA1099V2\IssuerResponse
```

Get an issuer

Get an issuer

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

$apiInstance = new AvalaraSDK\Api\Issuers1099Api($client);

$id = 'id_example'; // string
$avalara_version = 2.0; // string | API version
$x_correlation_id = c3619be9-6530-492d-a172-da05364e3793; // string | Unique correlation Id in a GUID format

try {
    $result = $apiInstance->getIssuer($id, $avalara_version, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Issuers1099Api->getIssuer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |

### Return type

[**\AvalaraSDK\ModelA1099V2\IssuerResponse**](../Model/IssuerResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getIssuers()`

```php
getIssuers($avalara_version, $x_correlation_id, $filter, $top, $skip, $order_by, $count, $count_only): \AvalaraSDK\ModelA1099V2\PaginatedQueryResultModelIssuerResponse
```

List issuers

List issuers for a given tax year. Filterable fields are name, referenceId and taxYear

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

$apiInstance = new AvalaraSDK\Api\Issuers1099Api($client);

$avalara_version = 2.0; // string | API version
$x_correlation_id = 422ed89a-1974-4c86-91b6-4dcbe876b7f7; // string | Unique correlation Id in a GUID format
$filter = 'filter_example'; // string | A filter statement to identify specific records to retrieve.  For more information on filtering, see <a href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</a>.
$top = 56; // int | If zero or greater than 1000, return at most 1000 results.  Otherwise, return this number of results.  Used with skip to provide pagination for large datasets.
$skip = 56; // int | If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets.
$order_by = 'order_by_example'; // string | A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC.
$count = True; // bool | If true, return the global count of elements in the collection.
$count_only = True; // bool | If true, return ONLY the global count of elements in the collection.  It only applies when count=true.

try {
    $result = $apiInstance->getIssuers($avalara_version, $x_correlation_id, $filter, $top, $skip, $order_by, $count, $count_only);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Issuers1099Api->getIssuers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **filter** | **string**| A filter statement to identify specific records to retrieve.  For more information on filtering, see &lt;a href&#x3D;\&quot;https://developer.avalara.com/avatax/filtering-in-rest/\&quot;&gt;Filtering in REST&lt;/a&gt;. | [optional]
 **top** | **int**| If zero or greater than 1000, return at most 1000 results.  Otherwise, return this number of results.  Used with skip to provide pagination for large datasets. | [optional]
 **skip** | **int**| If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets. | [optional]
 **order_by** | **string**| A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC. | [optional]
 **count** | **bool**| If true, return the global count of elements in the collection. | [optional]
 **count_only** | **bool**| If true, return ONLY the global count of elements in the collection.  It only applies when count&#x3D;true. | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\PaginatedQueryResultModelIssuerResponse**](../Model/PaginatedQueryResultModelIssuerResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `updateIssuer()`

```php
updateIssuer($id, $avalara_version, $x_correlation_id, $issuer_command)
```

Update an issuer

Update an existing issuer

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

$apiInstance = new AvalaraSDK\Api\Issuers1099Api($client);

$id = 'id_example'; // string | Id of the issuer to Update
$avalara_version = 2.0; // string | API version
$x_correlation_id = 37e09615-e73c-4348-9ab3-fa6718b2cf60; // string | Unique correlation Id in a GUID format
$issuer_command = new \AvalaraSDK\ModelA1099V2\IssuerCommand(); // \AvalaraSDK\ModelA1099V2\IssuerCommand | The issuer to update

try {
    $apiInstance->updateIssuer($id, $avalara_version, $x_correlation_id, $issuer_command);
} catch (Exception $e) {
    echo 'Exception when calling Issuers1099Api->updateIssuer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of the issuer to Update |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **issuer_command** | [**\AvalaraSDK\ModelA1099V2\IssuerCommand**](../Model/IssuerCommand.md)| The issuer to update | [optional]

### Return type

void (empty response body)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
