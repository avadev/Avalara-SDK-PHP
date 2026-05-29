# Avalara\SDK\InteropApi

All URIs are relative to https://api.sbx.avalara.com/einvoicing.

Method | HTTP request | Description
------------- | ------------- | -------------
[**submitInteropDocument()**](InteropApi.md#submitInteropDocument) | **POST** /interop/documents | Submit a document


## `submitInteropDocument()`

```php
submitInteropDocument($document_type, $interchange_type, $avalara_version, $x_avalara_client, $x_correlation_id, $file_name): \Avalara\SDK\Model\EInvoicing\V1\SubmitInteropDocument202Response
```

Submit a document

Upload documents on behalf of interoperability partners and submit them to trading partners through the Avalara platform.

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

$apiInstance = new Avalara\SDK\Api\InteropApi($client);

$document_type = 'document_type_example'; // string | Type of the document being uploaded. Partners will be configured in Avalara system to send only certain types of documents.
$interchange_type = 'interchange_type_example'; // string | Type of interchange (codes in Avalara system that uniquely identifies a type of interchange). Partners will be configured in Avalara system to send documents belonging to certain types of interchanges.
$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$x_correlation_id = f3f0d19a-01a1-4748-8a58-f000d0424f43; // string | Optional correlation identifier provided by the caller to trace the call (for example \"f3f0d19a-01a1-4748-8a58-f000d0424f43\").
$file_name = "/path/to/file.txt"; // \SplFileObject | The file to be uploaded (e.g., UBL XML, CII XML).

try {
    $result = $apiInstance->submitInteropDocument($document_type, $interchange_type, $avalara_version, $x_avalara_client, $x_correlation_id, $file_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InteropApi->submitInteropDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **document_type** | **string**| Type of the document being uploaded. Partners will be configured in Avalara system to send only certain types of documents. |
 **interchange_type** | **string**| Type of interchange (codes in Avalara system that uniquely identifies a type of interchange). Partners will be configured in Avalara system to send documents belonging to certain types of interchanges. |
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **x_correlation_id** | **string**| Optional correlation identifier provided by the caller to trace the call (for example \&quot;f3f0d19a-01a1-4748-8a58-f000d0424f43\&quot;). | [optional]
 **file_name** | **\SplFileObject****\SplFileObject**| The file to be uploaded (e.g., UBL XML, CII XML). | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\SubmitInteropDocument202Response**](../Model/SubmitInteropDocument202Response.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
