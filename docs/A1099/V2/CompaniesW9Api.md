# Avalara\SDK\CompaniesW9Api

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
createCompany($avalara_version, $x_correlation_id, $x_avalara_client, $company_request): \Avalara\SDK\Model\A1099\V2\CompanyResponse
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

$apiInstance = new Avalara\SDK\Api\CompaniesW9Api($client);

$avalara_version = 2.0.0; // string | API version
$x_correlation_id = e059925d-91f6-4c34-9bcd-2a0e997dd8fa; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$company_request = {"name":"Acme Corporation","dbaName":"","email":"contact@acmecorp.com","address":"123 Business Ave","city":"Phoenix","state":"AZ","zip":"85001","telephone":"602-555-0123","tin":"12-3456789","referenceId":"","doTinMatch":null,"groupName":"","foreignProvince":"","countryCode":"US","resendRequests":null,"resendIntervalDays":null,"maxReminderAttempts":null}; // \Avalara\SDK\Model\A1099\V2\CompanyRequest | The company to create

try {
    $result = $apiInstance->createCompany($avalara_version, $x_correlation_id, $x_avalara_client, $company_request);
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
 **company_request** | [**\Avalara\SDK\Model\A1099\V2\CompanyRequest**](../Model/CompanyRequest.md)| The company to create | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\CompanyResponse**](../Model/CompanyResponse.md)

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

$apiInstance = new Avalara\SDK\Api\CompaniesW9Api($client);

$id = 'id_example'; // string | The company to delete
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = b01f9bff-5e8c-49d6-8c9b-44892e578dc5; // string | Unique correlation Id in a GUID format
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
getCompanies($avalara_version, $filter, $top, $skip, $order_by, $count, $count_only, $x_correlation_id, $x_avalara_client): \Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelCompanyResponse
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

$avalara_version = 2.0.0; // string | API version
$filter = name eq 'company name'; // string | A filter statement to identify specific records to retrieve.  For more information on filtering, see <a href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</a>.
$top = 56; // int | If zero or greater than 1000, return at most 1000 results.  Otherwise, return this number of results.  Used with skip to provide pagination for large datasets.
$skip = 56; // int | If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets.
$order_by = 'order_by_example'; // string | A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC.
$count = True; // bool | If true, return the global count of elements in the collection.
$count_only = True; // bool | If true, return ONLY the global count of elements in the collection.  It only applies when count=true.
$x_correlation_id = 9654708e-0675-4a73-a0fa-5b8016bb2175; // string | Unique correlation Id in a GUID format
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
getCompany($id, $avalara_version, $x_correlation_id, $x_avalara_client): \Avalara\SDK\Model\A1099\V2\CompanyResponse
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

$apiInstance = new Avalara\SDK\Api\CompaniesW9Api($client);

$id = 'id_example'; // string | Id of the company
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = c9747d06-85d9-42ed-a7d2-1438a48a4d33; // string | Unique correlation Id in a GUID format
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
updateCompany($id, $avalara_version, $x_correlation_id, $x_avalara_client, $company_request): \Avalara\SDK\Model\A1099\V2\CompanyResponse
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

$apiInstance = new Avalara\SDK\Api\CompaniesW9Api($client);

$id = 'id_example'; // string | The ID of the company to update
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 0227fcc3-16c4-439b-a4ea-28c316d311ef; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$company_request = {"name":"Acme Corporation","dbaName":"","email":"contact@acmecorp.com","address":"123 Business Ave","city":"Phoenix","state":"AZ","zip":"85001","telephone":"602-555-0123","tin":"12-3456789","referenceId":"","doTinMatch":null,"groupName":"","foreignProvince":"","countryCode":"US","resendRequests":null,"resendIntervalDays":null,"maxReminderAttempts":null}; // \Avalara\SDK\Model\A1099\V2\CompanyRequest | The updated company data

try {
    $result = $apiInstance->updateCompany($id, $avalara_version, $x_correlation_id, $x_avalara_client, $company_request);
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
 **company_request** | [**\Avalara\SDK\Model\A1099\V2\CompanyRequest**](../Model/CompanyRequest.md)| The updated company data | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\CompanyResponse**](../Model/CompanyResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
