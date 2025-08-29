# AvalaraSDK\CompaniesW9Api

All URIs are relative to https://api.sbx.avalara.com/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createCompany()**](CompaniesW9Api.md#createCompany) | **POST** /w9/companies | Create a company
[**deleteCompany()**](CompaniesW9Api.md#deleteCompany) | **DELETE** /w9/companies/{id} | Delete a company
[**getCompanies()**](CompaniesW9Api.md#getCompanies) | **GET** /w9/companies | List companies
[**getCompany()**](CompaniesW9Api.md#getCompany) | **GET** /w9/companies/{id} | Retrieve a company
[**updateCompany()**](CompaniesW9Api.md#updateCompany) | **PUT** /w9/companies/{id} | Update a company


## `createCompany()`

```php
createCompany($avalara_version, $x_correlation_id, $x_avalara_client, $create_company_request): \AvalaraSDK\ModelA1099V2\CompanyResponse
```

Create a company

Create a company.

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

$apiInstance = new AvalaraSDK\Api\CompaniesW9Api($client);

$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 84a816ef-95df-4fb7-8d8a-95bc8a8d8fe9; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$create_company_request = {"name":"Acme Corporation","dbaName":"","email":"contact@acmecorp.com","address":"123 Business Ave","city":"Phoenix","state":"AZ","zip":"85001","telephone":"602-555-0123","tin":"12-3456789","referenceId":"","doTinMatch":null,"groupName":"","foreignProvince":"","countryCode":"US","resendRequests":null,"resendIntervalDays":null,"maxReminderAttempts":null}; // \AvalaraSDK\ModelA1099V2\CreateCompanyRequest | The company to create

try {
    $result = $apiInstance->createCompany($avalara_version, $x_correlation_id, $x_avalara_client, $create_company_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesW9Api->createCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
 **create_company_request** | [**\AvalaraSDK\ModelA1099V2\CreateCompanyRequest**](../Model/CreateCompanyRequest.md)| The company to create | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\CompanyResponse**](../Model/CompanyResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `deleteCompany()`

```php
deleteCompany($id, $avalara_version, $x_correlation_id, $x_avalara_client)
```

Delete a company

Delete a company.

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

$apiInstance = new AvalaraSDK\Api\CompaniesW9Api($client);

$id = 'id_example'; // string | The company to delete
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 22a14d95-22c8-4e2d-a6f9-a60235ff2fb6; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $apiInstance->deleteCompany($id, $avalara_version, $x_correlation_id, $x_avalara_client);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesW9Api->deleteCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The company to delete |
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

## `getCompanies()`

```php
getCompanies($avalara_version, $filter, $top, $skip, $order_by, $count, $count_only, $x_correlation_id, $x_avalara_client): \AvalaraSDK\ModelA1099V2\PaginatedQueryResultModelCompanyResponse
```

List companies

List existing companies. Filterable/Sortable fields are: \"name\", \"referenceId\", \"group.name\", \"createdAt\" and \"updatedAt\".

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

$apiInstance = new AvalaraSDK\Api\CompaniesW9Api($client);

$avalara_version = 2.0.0; // string | API version
$filter = name eq 'company name'; // string | A filter statement to identify specific records to retrieve.  For more information on filtering, see <a href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</a>.
$top = 56; // int | If zero or greater than 1000, return at most 1000 results.  Otherwise, return this number of results.  Used with skip to provide pagination for large datasets.
$skip = 56; // int | If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets.
$order_by = 'order_by_example'; // string | A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC.
$count = True; // bool | If true, return the global count of elements in the collection.
$count_only = True; // bool | If true, return ONLY the global count of elements in the collection.  It only applies when count=true.
$x_correlation_id = b20f7fbd-d0ac-4f59-a75d-ca2afa4b1e91; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->getCompanies($avalara_version, $filter, $top, $skip, $order_by, $count, $count_only, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesW9Api->getCompanies: ', $e->getMessage(), PHP_EOL;
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

[**\AvalaraSDK\ModelA1099V2\PaginatedQueryResultModelCompanyResponse**](../Model/PaginatedQueryResultModelCompanyResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getCompany()`

```php
getCompany($id, $avalara_version, $x_correlation_id, $x_avalara_client): \AvalaraSDK\ModelA1099V2\CompanyResponse
```

Retrieve a company

Retrieve a company.

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

$apiInstance = new AvalaraSDK\Api\CompaniesW9Api($client);

$id = 'id_example'; // string | Id of the company
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 06bf1c2a-d8be-473a-9d6d-a5100b9d7402; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->getCompany($id, $avalara_version, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesW9Api->getCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of the company |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\CompanyResponse**](../Model/CompanyResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `updateCompany()`

```php
updateCompany($id, $avalara_version, $x_correlation_id, $x_avalara_client, $create_company_request): \AvalaraSDK\ModelA1099V2\CompanyResponse
```

Update a company

Update a company.

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

$apiInstance = new AvalaraSDK\Api\CompaniesW9Api($client);

$id = 'id_example'; // string | The ID of the company to update
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = b3aa843f-04a8-48cf-9a55-08fd136a6e0c; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$create_company_request = {"name":"Acme Corporation","dbaName":"","email":"contact@acmecorp.com","address":"123 Business Ave","city":"Phoenix","state":"AZ","zip":"85001","telephone":"602-555-0123","tin":"12-3456789","referenceId":"","doTinMatch":null,"groupName":"","foreignProvince":"","countryCode":"US","resendRequests":null,"resendIntervalDays":null,"maxReminderAttempts":null}; // \AvalaraSDK\ModelA1099V2\CreateCompanyRequest | The updated company data

try {
    $result = $apiInstance->updateCompany($id, $avalara_version, $x_correlation_id, $x_avalara_client, $create_company_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesW9Api->updateCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The ID of the company to update |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
 **create_company_request** | [**\AvalaraSDK\ModelA1099V2\CreateCompanyRequest**](../Model/CreateCompanyRequest.md)| The updated company data | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\CompanyResponse**](../Model/CompanyResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
