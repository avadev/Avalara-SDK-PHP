# Avalara\SDK\CompaniesW9Api

All URIs are relative to https://api-ava1099.eta.sbx.us-east-1.aws.avalara.io/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createCompany()**](CompaniesW9Api.md#createCompany) | **POST** /w9/companies | Creates a new company
[**deleteCompany()**](CompaniesW9Api.md#deleteCompany) | **DELETE** /w9/companies/{id} | Deletes a company
[**getCompanies()**](CompaniesW9Api.md#getCompanies) | **GET** /w9/companies | List companies
[**getCompany()**](CompaniesW9Api.md#getCompany) | **GET** /w9/companies/{id} | Retrieve a company
[**updateCompany()**](CompaniesW9Api.md#updateCompany) | **PUT** /w9/companies/{id} | Update a company


## `createCompany()`

```php
createCompany($avalara_version, $x_correlation_id, $company_create_update_request_model): \Avalara\SDK\Model\A1099\V2\CompanyResponseModel
```

Creates a new company

Creates a new company

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

$apiInstance = new Avalara\SDK\Api\CompaniesW9Api($client);

$avalara_version = 2.0; // string | API version
$x_correlation_id = 2e7ec372-d597-405d-83ee-4191117f58c9; // string | Unique correlation Id in a GUID format
$company_create_update_request_model = new \Avalara\SDK\Model\A1099\V2\CompanyCreateUpdateRequestModel(); // \Avalara\SDK\Model\A1099\V2\CompanyCreateUpdateRequestModel | The company to create

try {
    $result = $apiInstance->createCompany($avalara_version, $x_correlation_id, $company_create_update_request_model);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesW9Api->createCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **company_create_update_request_model** | [**\Avalara\SDK\Model\A1099\V2\CompanyCreateUpdateRequestModel**](../Model/CompanyCreateUpdateRequestModel.md)| The company to create | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\CompanyResponseModel**](../Model/CompanyResponseModel.md)

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
deleteCompany($id, $avalara_version, $x_correlation_id)
```

Deletes a company

Deletes a company

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

$apiInstance = new Avalara\SDK\Api\CompaniesW9Api($client);

$id = 'id_example'; // string | The company to delete
$avalara_version = 2.0; // string | API version
$x_correlation_id = 54e270fd-9c82-482b-a1c1-359a2fdf9f54; // string | Unique correlation Id in a GUID format

try {
    $apiInstance->deleteCompany($id, $avalara_version, $x_correlation_id);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesW9Api->deleteCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The company to delete |
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

## `getCompanies()`

```php
getCompanies($avalara_version, $x_correlation_id, $filter, $top, $skip, $order_by, $count, $count_only): \Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelCompanyResponse
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

$apiInstance = new Avalara\SDK\Api\CompaniesW9Api($client);

$avalara_version = 2.0; // string | API version
$x_correlation_id = 0b0a9d49-bc0b-417e-bb87-4ec47e3a0f6a; // string | Unique correlation Id in a GUID format
$filter = 'filter_example'; // string | A filter statement to identify specific records to retrieve.  For more information on filtering, see <a href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</a>.
$top = 56; // int | If zero or greater than 1000, return at most 1000 results.  Otherwise, return this number of results.  Used with skip to provide pagination for large datasets.
$skip = 56; // int | If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets.
$order_by = 'order_by_example'; // string | A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC.
$count = True; // bool | If true, return the global count of elements in the collection.
$count_only = True; // bool | If true, return ONLY the global count of elements in the collection.  It only applies when count=true.

try {
    $result = $apiInstance->getCompanies($avalara_version, $x_correlation_id, $filter, $top, $skip, $order_by, $count, $count_only);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesW9Api->getCompanies: ', $e->getMessage(), PHP_EOL;
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

[**\Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelCompanyResponse**](../Model/PaginatedQueryResultModelCompanyResponse.md)

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
getCompany($id, $avalara_version, $x_correlation_id): \Avalara\SDK\Model\A1099\V2\CompanyResponse
```

Retrieve a company

Retrieve an existing company

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

$apiInstance = new Avalara\SDK\Api\CompaniesW9Api($client);

$id = 'id_example'; // string | Id of the company
$avalara_version = 2.0; // string | API version
$x_correlation_id = a86ebe89-d9d0-4235-90dc-0ea715256552; // string | Unique correlation Id in a GUID format

try {
    $result = $apiInstance->getCompany($id, $avalara_version, $x_correlation_id);
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
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |

### Return type

[**\Avalara\SDK\Model\A1099\V2\CompanyResponse**](../Model/CompanyResponse.md)

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
updateCompany($id, $avalara_version, $x_correlation_id, $company_create_update_request_model): \Avalara\SDK\Model\A1099\V2\CompanyResponseModel
```

Update a company

Update a company

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

$apiInstance = new Avalara\SDK\Api\CompaniesW9Api($client);

$id = 'id_example'; // string | The ID of the company to update
$avalara_version = 2.0; // string | API version
$x_correlation_id = 2039b509-1e2c-4816-ad2b-1d00e26c3a3e; // string | Unique correlation Id in a GUID format
$company_create_update_request_model = new \Avalara\SDK\Model\A1099\V2\CompanyCreateUpdateRequestModel(); // \Avalara\SDK\Model\A1099\V2\CompanyCreateUpdateRequestModel | The updated company data

try {
    $result = $apiInstance->updateCompany($id, $avalara_version, $x_correlation_id, $company_create_update_request_model);
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
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **company_create_update_request_model** | [**\Avalara\SDK\Model\A1099\V2\CompanyCreateUpdateRequestModel**](../Model/CompanyCreateUpdateRequestModel.md)| The updated company data | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\CompanyResponseModel**](../Model/CompanyResponseModel.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
