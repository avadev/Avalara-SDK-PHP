# Avalara\SDK\FormsW9Api

All URIs are relative to https://api-ava1099.eta.sbx.us-east-1.aws.avalara.io/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createW9Form()**](FormsW9Api.md#createW9Form) | **POST** /w9/forms | Create a W9/W4/W8 form
[**deleteW9Form()**](FormsW9Api.md#deleteW9Form) | **DELETE** /w9/forms/{id} | Delete a form
[**getW9Form()**](FormsW9Api.md#getW9Form) | **GET** /w9/forms/{id} | Retrieve a W9/W4/W8 form
[**listW9Forms()**](FormsW9Api.md#listW9Forms) | **GET** /w9/forms | List W9/W4/W8 forms.
[**sendW9FormEmail()**](FormsW9Api.md#sendW9FormEmail) | **POST** /w9/forms/{id}/$send-email | Sends a W9 email request to a vendor/payee
[**updateW9Form()**](FormsW9Api.md#updateW9Form) | **PUT** /w9/forms/{id} | Update a W9/W4/W8 form
[**uploadW9Files()**](FormsW9Api.md#uploadW9Files) | **PUT** /w9/forms/{id}/attachment | Upload files for a W9/W4/W8 form


## `createW9Form()`

```php
createW9Form($avalara_version, $x_correlation_id, $x_avalara_client, $iw9_form_data_models_one_of): \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf
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
$x_correlation_id = cf698b33-27c8-4c6c-be2d-a2192133e8be; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$iw9_form_data_models_one_of = new \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf(); // \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf | Form to be created

try {
    $result = $apiInstance->createW9Form($avalara_version, $x_correlation_id, $x_avalara_client, $iw9_form_data_models_one_of);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsW9Api->createW9Form: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
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
deleteW9Form($id, $avalara_version, $x_correlation_id, $x_avalara_client)
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
$x_correlation_id = 940f1838-bf00-4b82-beb0-91637069ab50; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $apiInstance->deleteW9Form($id, $avalara_version, $x_correlation_id, $x_avalara_client);
} catch (Exception $e) {
    echo 'Exception when calling FormsW9Api->deleteW9Form: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of the form to delete |
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

## `getW9Form()`

```php
getW9Form($id, $avalara_version, $x_correlation_id, $x_avalara_client): \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf
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
$x_correlation_id = 36856aac-b7ac-4cca-bcfb-34c16e9ce48f; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->getW9Form($id, $avalara_version, $x_correlation_id, $x_avalara_client);
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
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

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

## `listW9Forms()`

```php
listW9Forms($avalara_version, $filter, $top, $skip, $order_by, $count, $x_correlation_id, $x_avalara_client): \Avalara\SDK\Model\A1099\V2\PaginatedW9FormsModel
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
$filter = 'filter_example'; // string | A filter statement to identify specific records to retrieve. For more information on filtering, see <a href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</a>.
$top = 10; // int | If nonzero, return no more than this number of results. Used with skip to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 1,000 records.
$skip = 0; // int | If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets.
$order_by = 'order_by_example'; // string | A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC.
$count = True; // bool | When true, returns a @recordSetCount in the result set
$x_correlation_id = 550ca018-19ad-4b65-b294-96b1104c4370; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->listW9Forms($avalara_version, $filter, $top, $skip, $order_by, $count, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsW9Api->listW9Forms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **filter** | **string**| A filter statement to identify specific records to retrieve. For more information on filtering, see &lt;a href&#x3D;\&quot;https://developer.avalara.com/avatax/filtering-in-rest/\&quot;&gt;Filtering in REST&lt;/a&gt;. | [optional]
 **top** | **int**| If nonzero, return no more than this number of results. Used with skip to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 1,000 records. | [optional] [default to 10]
 **skip** | **int**| If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets. | [optional] [default to 0]
 **order_by** | **string**| A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC. | [optional]
 **count** | **bool**| When true, returns a @recordSetCount in the result set | [optional]
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

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
sendW9FormEmail($id, $avalara_version, $x_correlation_id, $x_avalara_client): \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf
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
$x_correlation_id = cc9d1e19-6e8b-4c68-8093-547d059e654c; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->sendW9FormEmail($id, $avalara_version, $x_correlation_id, $x_avalara_client);
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
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

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
updateW9Form($id, $avalara_version, $x_correlation_id, $x_avalara_client, $iw9_form_data_models_one_of): \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf
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
$x_correlation_id = 40fcd194-dcb4-4e98-b6fa-3e381c2ee462; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$iw9_form_data_models_one_of = new \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf(); // \Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf | Form to be updated

try {
    $result = $apiInstance->updateW9Form($id, $avalara_version, $x_correlation_id, $x_avalara_client, $iw9_form_data_models_one_of);
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
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
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
uploadW9Files($id, $avalara_version, $x_correlation_id, $x_avalara_client, $file): string
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
$x_correlation_id = d07eaee6-85a3-4cdf-8394-301509cf8b0c; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$file = "/path/to/file.txt"; // \SplFileObject

try {
    $result = $apiInstance->uploadW9Files($id, $avalara_version, $x_correlation_id, $x_avalara_client, $file);
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
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
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
