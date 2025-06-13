# Avalara\SDK\FormsW9Api

All URIs are relative to https://api-ava1099.eta.sbx.us-east-1.aws.avalara.io/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createW9Form()**](FormsW9Api.md#createW9Form) | **POST** /w9/forms | Create a W9/W4/W8 form
[**deleteW9Form()**](FormsW9Api.md#deleteW9Form) | **DELETE** /w9/forms/{id} | Delete a form
[**getW9Form()**](FormsW9Api.md#getW9Form) | **GET** /w9/forms/{id} | Retrieve a W9/W4/W8 form
[**getW9FormRequest()**](FormsW9Api.md#getW9FormRequest) | **GET** /w9/forms/requests/{formRequestId} | Retrieve a form request
[**listW9Forms()**](FormsW9Api.md#listW9Forms) | **GET** /w9/forms | List W9/W4/W8 forms.
[**sendW9FormEmail()**](FormsW9Api.md#sendW9FormEmail) | **POST** /w9/forms/{id}/$send-email | Sends a W9 email request to a vendor/payee
[**updateW9Form()**](FormsW9Api.md#updateW9Form) | **PUT** /w9/forms/{id} | Update a W9/W4/W8 form
[**uploadW9Files()**](FormsW9Api.md#uploadW9Files) | **PUT** /w9/forms/{id}/attachment | Upload files for a W9/W4/W8 form


## `createW9Form()`

```php
createW9Form($avalara_version, $x_correlation_id, $iw9_form_data_models_one_of): \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf
```

Create a W9/W4/W8 form

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

$apiInstance = new Avalara\SDK\Api\FormsW9Api($client);

$avalara_version = 2.0; // string | API version
$x_correlation_id = 79fd4b78-3713-43c5-89f5-25d870e6c202; // string | Unique correlation Id in a GUID format
$iw9_form_data_models_one_of = new \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf(); // \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf | Form to be created

try {
    $result = $apiInstance->createW9Form($avalara_version, $x_correlation_id, $iw9_form_data_models_one_of);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsW9Api->createW9Form: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **iw9_form_data_models_one_of** | [**\Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf**](../Model/IW9FormDataModelsOneOf.md)| Form to be created | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf**](../Model/IW9FormDataModelsOneOf.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `deleteW9Form()`

```php
deleteW9Form($id, $avalara_version, $x_correlation_id)
```

Delete a form

Delete a form

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

$apiInstance = new Avalara\SDK\Api\FormsW9Api($client);

$id = 'id_example'; // string | Id of the form to delete
$avalara_version = 2.0; // string | API version
$x_correlation_id = 9241776b-1ebb-4cf8-8ed6-3f8651182ded; // string | Unique correlation Id in a GUID format

try {
    $apiInstance->deleteW9Form($id, $avalara_version, $x_correlation_id);
} catch (Exception $e) {
    echo 'Exception when calling FormsW9Api->deleteW9Form: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of the form to delete |
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

## `getW9Form()`

```php
getW9Form($id, $avalara_version, $x_correlation_id): \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf
```

Retrieve a W9/W4/W8 form

Retrieve a W9/W4/W8 form

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

$apiInstance = new Avalara\SDK\Api\FormsW9Api($client);

$id = 'id_example'; // string | Id of the form
$avalara_version = 2.0; // string | API version
$x_correlation_id = 3d1de033-3501-42d0-a004-6054d5c40b47; // string | Unique correlation Id in a GUID format

try {
    $result = $apiInstance->getW9Form($id, $avalara_version, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsW9Api->getW9Form: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of the form |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |

### Return type

[**\Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf**](../Model/IW9FormDataModelsOneOf.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getW9FormRequest()`

```php
getW9FormRequest($form_request_id, $avalara_version, $x_correlation_id): \Avalara\SDK\Model\A1099\V2\FormRequestModel
```

Retrieve a form request

Retrieve a form request after creation: not likely to be useful except in testing. Previously-valid form requests will be Not Found after `expires_at`.

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

$apiInstance = new Avalara\SDK\Api\FormsW9Api($client);

$form_request_id = 'form_request_id_example'; // string | 
$avalara_version = 2.0; // string | API version
$x_correlation_id = 5b988bd9-2eb8-424c-bbe1-9858c7d015cf; // string | Unique correlation Id in a GUID format

try {
    $result = $apiInstance->getW9FormRequest($form_request_id, $avalara_version, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsW9Api->getW9FormRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **form_request_id** | **string**|  |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |

### Return type

[**\Avalara\SDK\Model\A1099\V2\FormRequestModel**](../Model/FormRequestModel.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `listW9Forms()`

```php
listW9Forms($avalara_version, $x_correlation_id, $filter, $top, $skip, $order_by, $count): \Avalara\SDK\Model\A1099\V2\PaginatedW9FormsModel
```

List W9/W4/W8 forms.

List W9/W4/W8 forms.

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

$apiInstance = new Avalara\SDK\Api\FormsW9Api($client);

$avalara_version = 2.0; // string | API version
$x_correlation_id = ede33ed8-dd7e-4849-a5b2-74ca376b6f02; // string | Unique correlation Id in a GUID format
$filter = 'filter_example'; // string | A filter statement to identify specific records to retrieve. For more information on filtering, see <a href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</a>.
$top = 10; // int | If nonzero, return no more than this number of results. Used with skip to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 1,000 records.
$skip = 0; // int | If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets.
$order_by = 'order_by_example'; // string | A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC.
$count = True; // bool | When true, returns a @recordSetCount in the result set

try {
    $result = $apiInstance->listW9Forms($avalara_version, $x_correlation_id, $filter, $top, $skip, $order_by, $count);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsW9Api->listW9Forms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **filter** | **string**| A filter statement to identify specific records to retrieve. For more information on filtering, see &lt;a href&#x3D;\&quot;https://developer.avalara.com/avatax/filtering-in-rest/\&quot;&gt;Filtering in REST&lt;/a&gt;. | [optional]
 **top** | **int**| If nonzero, return no more than this number of results. Used with skip to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 1,000 records. | [optional] [default to 10]
 **skip** | **int**| If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets. | [optional] [default to 0]
 **order_by** | **string**| A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC. | [optional]
 **count** | **bool**| When true, returns a @recordSetCount in the result set | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\PaginatedW9FormsModel**](../Model/PaginatedW9FormsModel.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `sendW9FormEmail()`

```php
sendW9FormEmail($id, $avalara_version, $x_correlation_id): \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf
```

Sends a W9 email request to a vendor/payee

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

$apiInstance = new Avalara\SDK\Api\FormsW9Api($client);

$id = 'id_example'; // string | The ID of the W9/W4/W8 form.
$avalara_version = 2.0; // string | API version
$x_correlation_id = 6be66c37-7db9-493e-a06d-a74115f1e60e; // string | Unique correlation Id in a GUID format

try {
    $result = $apiInstance->sendW9FormEmail($id, $avalara_version, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsW9Api->sendW9FormEmail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The ID of the W9/W4/W8 form. |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |

### Return type

[**\Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf**](../Model/IW9FormDataModelsOneOf.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `updateW9Form()`

```php
updateW9Form($id, $avalara_version, $x_correlation_id, $iw9_form_data_models_one_of): \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf
```

Update a W9/W4/W8 form

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

$apiInstance = new Avalara\SDK\Api\FormsW9Api($client);

$id = 'id_example'; // string | Id of the form to update
$avalara_version = 2.0; // string | API version
$x_correlation_id = 1074f043-ccb5-4428-b127-4636e4d53efa; // string | Unique correlation Id in a GUID format
$iw9_form_data_models_one_of = new \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf(); // \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf | Form to be updated

try {
    $result = $apiInstance->updateW9Form($id, $avalara_version, $x_correlation_id, $iw9_form_data_models_one_of);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsW9Api->updateW9Form: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of the form to update |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **iw9_form_data_models_one_of** | [**\Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf**](../Model/IW9FormDataModelsOneOf.md)| Form to be updated | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf**](../Model/IW9FormDataModelsOneOf.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `uploadW9Files()`

```php
uploadW9Files($id, $avalara_version, $x_correlation_id, $file): string
```

Upload files for a W9/W4/W8 form

Upload files for a W9/W4/W8 form

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

$apiInstance = new Avalara\SDK\Api\FormsW9Api($client);

$id = 'id_example'; // string | Id of the form
$avalara_version = 2.0; // string | API version
$x_correlation_id = 29abee70-a0d1-48cd-b3e2-98a52e85a0a3; // string | Unique correlation Id in a GUID format
$file = "/path/to/file.txt"; // \SplFileObject

try {
    $result = $apiInstance->uploadW9Files($id, $avalara_version, $x_correlation_id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsW9Api->uploadW9Files: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of the form |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **file** | **\SplFileObject****\SplFileObject**|  | [optional]

### Return type

**string**

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
