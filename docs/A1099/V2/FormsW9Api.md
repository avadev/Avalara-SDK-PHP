# Avalara\SDK\FormsW9Api

All URIs are relative to https://api-ava1099.eta.sbx.us-east-1.aws.avalara.io/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createW9Form()**](FormsW9Api.md#createW9Form) | **POST** /w9/forms | Create a W9/W4/W8 form
[**deleteW9Form()**](FormsW9Api.md#deleteW9Form) | **DELETE** /w9/forms/{id} | Delete a W9/W4/W8 form
[**getW9Form()**](FormsW9Api.md#getW9Form) | **GET** /w9/forms/{id} | Retrieve a W9/W4/W8 form
[**listW9Forms()**](FormsW9Api.md#listW9Forms) | **GET** /w9/forms | List W9/W4/W8 forms
[**sendW9FormEmail()**](FormsW9Api.md#sendW9FormEmail) | **POST** /w9/forms/{id}/$send-email | Send an email to the vendor/payee requesting they fill out a W9/W4/W8 form
[**updateW9Form()**](FormsW9Api.md#updateW9Form) | **PUT** /w9/forms/{id} | Update a W9/W4/W8 form
[**uploadW9Files()**](FormsW9Api.md#uploadW9Files) | **POST** /w9/forms/{id}/attachment | Replace the PDF file for a W9/W4/W8 form


## `createW9Form()`

```php
createW9Form($avalara_version, $x_correlation_id, $x_avalara_client, $create_w9_form_request): \Avalara\SDK\Model\A1099\V2\CreateW9Form201Response
```

Create a W9/W4/W8 form

Create a W9/W4/W8 form.

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

$avalara_version = 2.0.0; // string | API version
$x_correlation_id = a80d4171-c58b-440c-8cc7-4093fd542b00; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$create_w9_form_request = {"type":"W9","name":"John Doe","businessName":"Acme Inc.","businessClassification":"Individual","businessOther":null,"foreignPartnerOwnerOrBeneficiary":false,"exemptPayeeCode":null,"exemptFatcaCode":null,"foreignCountryIndicator":false,"address":"123 Main St.","foreignAddress":null,"city":"Anytown","state":"CA","zip":"12345","accountNumber":null,"tinType":"SSN","tin":"543456789","backupWithholding":false,"is1099able":true,"companyId":"32553266","referenceId":null,"email":null,"eDeliveryConsentedAt":null,"signature":null}; // \Avalara\SDK\Model\A1099\V2\CreateW9FormRequest | Form to be created

try {
    $result = $apiInstance->createW9Form($avalara_version, $x_correlation_id, $x_avalara_client, $create_w9_form_request);
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
 **create_w9_form_request** | [**\Avalara\SDK\Model\A1099\V2\CreateW9FormRequest**](../Model/CreateW9FormRequest.md)| Form to be created | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\CreateW9Form201Response**](../Model/CreateW9Form201Response.md)

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

Delete a W9/W4/W8 form

Delete a W9/W4/W8 form.

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

$id = 'id_example'; // string | ID of the form to delete
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 458bae89-b373-4297-b5eb-0e7a18838af3; // string | Unique correlation Id in a GUID format
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
 **id** | **string**| ID of the form to delete |
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
getW9Form($id, $avalara_version, $x_correlation_id, $x_avalara_client): \Avalara\SDK\Model\A1099\V2\CreateW9Form201Response
```

Retrieve a W9/W4/W8 form

Retrieve a W9/W4/W8 form.

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

$id = 'id_example'; // string | ID of the form
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = fcd3a4fb-da5b-4195-a470-97567434f46c; // string | Unique correlation Id in a GUID format
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
 **id** | **string**| ID of the form |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\CreateW9Form201Response**](../Model/CreateW9Form201Response.md)

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

List W9/W4/W8 forms

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

$avalara_version = 2.0.0; // string | API version
$filter = 'filter_example'; // string | A filter statement to identify specific records to retrieve. For more information on filtering, see <a href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</a>.
$top = 10; // int | If nonzero, return no more than this number of results. Used with skip to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 1,000 records.
$skip = 0; // int | If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets.
$order_by = 'order_by_example'; // string | A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC.
$count = True; // bool | When true, returns a @recordSetCount in the result set
$x_correlation_id = a4990941-fbe5-45f9-8495-43ed73f8334e; // string | Unique correlation Id in a GUID format
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

Send an email to the vendor/payee requesting they fill out a W9/W4/W8 form

Send an email to the vendor/payee requesting they fill out a W9/W4/W8 form.

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
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 72cf9106-878e-4643-9b5a-440f89a7b20d; // string | Unique correlation Id in a GUID format
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

Update a W9/W4/W8 form.

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

$id = 'id_example'; // string | ID of the form to update
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 38f0a02f-83cf-4142-b6ed-6b29474177df; // string | Unique correlation Id in a GUID format
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
 **id** | **string**| ID of the form to update |
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
uploadW9Files($id, $avalara_version, $x_correlation_id, $x_avalara_client, $file)
```

Replace the PDF file for a W9/W4/W8 form

Replaces the PDF file for a W9/W4/W8 form.

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
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 4fee6fea-2e64-4911-bb75-0931dd2875be; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$file = "/path/to/file.txt"; // \SplFileObject

try {
    $apiInstance->uploadW9Files($id, $avalara_version, $x_correlation_id, $x_avalara_client, $file);
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

void (empty response body)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
