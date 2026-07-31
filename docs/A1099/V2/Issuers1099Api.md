# Avalara\SDK\Issuers1099Api

All URIs are relative to https://api-ava1099.edge.qa.us-east-1.aws.avalara.io/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createIssuer()**](Issuers1099Api.md#createIssuer) | **POST** /1099/issuers | Create an issuer
[**deleteIssuer()**](Issuers1099Api.md#deleteIssuer) | **DELETE** /1099/issuers/{id} | Delete an issuer
[**getIssuer()**](Issuers1099Api.md#getIssuer) | **GET** /1099/issuers/{id} | Retrieve an issuer
[**getIssuers()**](Issuers1099Api.md#getIssuers) | **GET** /1099/issuers | List issuers
[**updateIssuer()**](Issuers1099Api.md#updateIssuer) | **PUT** /1099/issuers/{id} | Update an issuer


## `createIssuer()`

```php
createIssuer($avalara_version, $x_correlation_id, $x_avalara_client, $issuer_request): \Avalara\SDK\Model\A1099\V2\IssuerWriteResponse
```

Create an issuer

Create an issuer (also known as a Payer).

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

$apiInstance = new Avalara\SDK\Api\Issuers1099Api($client);

$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 14e92c5a-0e21-4dcd-8e3f-59111c335ba3; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$issuer_request = {"businessName":"Acme Corporation","businessName2":"Acme Widgets","name":"Acme Corporation","dbaName":"Acme Widgets","tinType":"BUSINESS","firstName":null,"middleName":null,"lastName":null,"suffix":null,"tin":"94-2765431","referenceId":"issuer-001","telephone":"+1-555-123-4567","taxYear":2025,"countryCode":"US","email":"support@acmecorp.com","address":"123 Main Street","city":"San Francisco","state":"CA","zip":"94105","foreignProvince":"","transferAgentName":"","lastFiling":false}; // \Avalara\SDK\Model\A1099\V2\IssuerRequest | The issuer to create

try {
    $result = $apiInstance->createIssuer($avalara_version, $x_correlation_id, $x_avalara_client, $issuer_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Issuers1099Api->createIssuer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
 **issuer_request** | [**\Avalara\SDK\Model\A1099\V2\IssuerRequest**](../Model/IssuerRequest.md)| The issuer to create | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\IssuerWriteResponse**](../Model/IssuerWriteResponse.md)

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
deleteIssuer($id, $avalara_version, $x_correlation_id, $x_avalara_client)
```

Delete an issuer

Delete an issuer (also known as a Payer).

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

$apiInstance = new Avalara\SDK\Api\Issuers1099Api($client);

$id = 'id_example'; // string | Id of the issuer to delete
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = cc721fe4-7f1e-4228-87d2-9351c780d9e9; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $apiInstance->deleteIssuer($id, $avalara_version, $x_correlation_id, $x_avalara_client);
} catch (Exception $e) {
    echo 'Exception when calling Issuers1099Api->deleteIssuer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of the issuer to delete |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

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
getIssuer($id, $avalara_version, $x_correlation_id, $x_avalara_client): \Avalara\SDK\Model\A1099\V2\IssuerResponse
```

Retrieve an issuer

Retrieve an issuer (also known as a Payer).

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

$apiInstance = new Avalara\SDK\Api\Issuers1099Api($client);

$id = 'id_example'; // string | Id of the issuer to retrieve
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 1c49f829-d029-4e67-8d87-c87a83033413; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->getIssuer($id, $avalara_version, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Issuers1099Api->getIssuer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of the issuer to retrieve |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\IssuerResponse**](../Model/IssuerResponse.md)

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
getIssuers($avalara_version, $filter, $top, $skip, $order_by, $count, $count_only, $x_correlation_id, $x_avalara_client): \Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelIssuerResponse
```

List issuers

List issuers (also known as Payers). Filterable fields are businessName, businessName2, referenceId, taxYear, firstName, and lastName.

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

$apiInstance = new Avalara\SDK\Api\Issuers1099Api($client);

$avalara_version = 2.0.0; // string | API version
$filter = taxYear eq 2025; // string | A filter statement to identify specific records to retrieve.  For more information on filtering, see <a href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</a>.
$top = 56; // int | If zero or greater than 1000, return at most 1000 results.  Otherwise, return this number of results.  Used with skip to provide pagination for large datasets.
$skip = 56; // int | If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets.
$order_by = 'order_by_example'; // string | A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC.
$count = True; // bool | If true, return the global count of elements in the collection.
$count_only = True; // bool | If true, return ONLY the global count of elements in the collection.  It only applies when count=true.
$x_correlation_id = 7845d8ad-09ab-4ba4-a644-bc06bcb806b0; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->getIssuers($avalara_version, $filter, $top, $skip, $order_by, $count, $count_only, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Issuers1099Api->getIssuers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **filter** | **string**| A filter statement to identify specific records to retrieve.  For more information on filtering, see &lt;a href&#x3D;\&quot;https://developer.avalara.com/avatax/filtering-in-rest/\&quot;&gt;Filtering in REST&lt;/a&gt;. | [optional]
 **top** | **int**| If zero or greater than 1000, return at most 1000 results.  Otherwise, return this number of results.  Used with skip to provide pagination for large datasets. | [optional]
 **skip** | **int**| If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets. | [optional]
 **order_by** | **string**| A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC. | [optional]
 **count** | **bool**| If true, return the global count of elements in the collection. | [optional]
 **count_only** | **bool**| If true, return ONLY the global count of elements in the collection.  It only applies when count&#x3D;true. | [optional]
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelIssuerResponse**](../Model/PaginatedQueryResultModelIssuerResponse.md)

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
updateIssuer($id, $avalara_version, $x_correlation_id, $x_avalara_client, $issuer_request): \Avalara\SDK\Model\A1099\V2\IssuerWriteResponse
```

Update an issuer

Update an issuer (also known as a Payer). When the payload violates field-level business rules, the issuer is still persisted and the response body includes a `validationErrors[]` array describing each violation.

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

$apiInstance = new Avalara\SDK\Api\Issuers1099Api($client);

$id = 'id_example'; // string | Id of the issuer to update
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 484d0024-b885-4e06-aac7-bf3ab4daba3b; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$issuer_request = {"businessName":"Acme Corporation","businessName2":"Acme Widgets","name":"Acme Corporation","dbaName":"Acme Widgets","tinType":"BUSINESS","firstName":null,"middleName":null,"lastName":null,"suffix":null,"tin":"94-2765431","referenceId":"issuer-001","telephone":"+1-555-123-4567","taxYear":2025,"countryCode":"US","email":"support@acmecorp.com","address":"123 Main Street","city":"San Francisco","state":"CA","zip":"94105","foreignProvince":"","transferAgentName":"","lastFiling":false}; // \Avalara\SDK\Model\A1099\V2\IssuerRequest | The issuer to update

try {
    $result = $apiInstance->updateIssuer($id, $avalara_version, $x_correlation_id, $x_avalara_client, $issuer_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Issuers1099Api->updateIssuer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of the issuer to update |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
 **issuer_request** | [**\Avalara\SDK\Model\A1099\V2\IssuerRequest**](../Model/IssuerRequest.md)| The issuer to update | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\IssuerWriteResponse**](../Model/IssuerWriteResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
