# Avalara\SDK\DocumentsApi

All URIs are relative to https://api.sbx.avalara.com/einvoicing.

Method | HTTP request | Description
------------- | ------------- | -------------
[**downloadDocument()**](DocumentsApi.md#downloadDocument) | **GET** /documents/{documentId}/$download | Returns a copy of the document
[**fetchDocuments()**](DocumentsApi.md#fetchDocuments) | **POST** /documents/$fetch | Fetch the inbound document from a tax authority
[**getDocumentList()**](DocumentsApi.md#getDocumentList) | **GET** /documents | Returns a summary of documents for a date range
[**getDocumentStatus()**](DocumentsApi.md#getDocumentStatus) | **GET** /documents/{documentId}/status | Checks the status of a document
[**submitDocument()**](DocumentsApi.md#submitDocument) | **POST** /documents | Submits a document to Avalara E-Invoicing API


## `downloadDocument()`

```php
downloadDocument($avalara_version, $accept, $document_id, $x_avalara_client): \SplFileObject
```

Returns a copy of the document

Downloads the document when it is available. Specify the output format in the Accept header. Returns 404 if the file has not been created.

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

$apiInstance = new Avalara\SDK\Api\DocumentsApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$accept = application/pdf; // string | Header that specifies the MIME type of the returned document.
$document_id = 'document_id_example'; // string | The unique documentId returned in the POST /documents response body.
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").

try {
    $result = $apiInstance->downloadDocument($avalara_version, $accept, $document_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsApi->downloadDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **accept** | **string**| Header that specifies the MIME type of the returned document. |
 **document_id** | **string**| The unique documentId returned in the POST /documents response body. |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]

### Return type

**\SplFileObject**

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/pdf`, `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `fetchDocuments()`

```php
fetchDocuments($avalara_version, $fetch_documents_request, $x_avalara_client): \Avalara\SDK\Model\EInvoicing\V1\DocumentFetch
```

Fetch the inbound document from a tax authority

Retrieves an inbound document. Provide key-value pairs as request parameters. Supported parameters vary by tax authority and country.

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

$apiInstance = new Avalara\SDK\Api\DocumentsApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$fetch_documents_request = new \Avalara\SDK\Model\EInvoicing\V1\FetchDocumentsRequest(); // \Avalara\SDK\Model\EInvoicing\V1\FetchDocumentsRequest
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").

try {
    $result = $apiInstance->fetchDocuments($avalara_version, $fetch_documents_request, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsApi->fetchDocuments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **fetch_documents_request** | [**\Avalara\SDK\Model\EInvoicing\V1\FetchDocumentsRequest**](../Model/FetchDocumentsRequest.md)|  |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\DocumentFetch**](../Model/DocumentFetch.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getDocumentList()`

```php
getDocumentList($avalara_version, $x_avalara_client, $start_date, $end_date, $flow, $count, $count_only, $filter, $include, $top, $skip): \Avalara\SDK\Model\EInvoicing\V1\DocumentListResponse
```

Returns a summary of documents for a date range

Returns a list of document summaries with a processing date within the specified date range.

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

$apiInstance = new Avalara\SDK\Api\DocumentsApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").
$start_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Start date for documents to return. Defaults to the previous month. Format: \"YYYY-MM-DDThh:mm:ss\".
$end_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | End date for documents to return. Defaults to the current date. Format: \"YYYY-MM-DDThh:mm:ss\".
$flow = out; // string | Optional filter for document direction: issued uses \"out\" and received uses \"in\".
$count = true; // string | When set to true, the response body also includes the count of items in the collection.
$count_only = false; // string | When set to true, the response returns only the count of items in the collection.
$filter = id eq 52f60401-44d0-4667-ad47-4afe519abb53; // string | Filter by field name and value. This filter supports only eq. For more information, refer to the Avalara filtering guide.
$include = events; // string | When set to `events`, each document in the response includes its events array. Omit this parameter or use any other value to exclude events from the response.
$top = 56; // int | The number of items to include in the result.
$skip = 56; // int | The number of items to skip in the result.

try {
    $result = $apiInstance->getDocumentList($avalara_version, $x_avalara_client, $start_date, $end_date, $flow, $count, $count_only, $filter, $include, $top, $skip);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsApi->getDocumentList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]
 **start_date** | **\DateTime**| Start date for documents to return. Defaults to the previous month. Format: \&quot;YYYY-MM-DDThh:mm:ss\&quot;. | [optional]
 **end_date** | **\DateTime**| End date for documents to return. Defaults to the current date. Format: \&quot;YYYY-MM-DDThh:mm:ss\&quot;. | [optional]
 **flow** | **string**| Optional filter for document direction: issued uses \&quot;out\&quot; and received uses \&quot;in\&quot;. | [optional]
 **count** | **string**| When set to true, the response body also includes the count of items in the collection. | [optional]
 **count_only** | **string**| When set to true, the response returns only the count of items in the collection. | [optional]
 **filter** | **string**| Filter by field name and value. This filter supports only eq. For more information, refer to the Avalara filtering guide. | [optional]
 **include** | **string**| When set to &#x60;events&#x60;, each document in the response includes its events array. Omit this parameter or use any other value to exclude events from the response. | [optional]
 **top** | **int**| The number of items to include in the result. | [optional]
 **skip** | **int**| The number of items to skip in the result. | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\DocumentListResponse**](../Model/DocumentListResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getDocumentStatus()`

```php
getDocumentStatus($avalara_version, $document_id, $x_avalara_client): \Avalara\SDK\Model\EInvoicing\V1\DocumentStatusResponse
```

Checks the status of a document

Uses the documentId from the POST /documents response body to return the current status of a document.

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

$apiInstance = new Avalara\SDK\Api\DocumentsApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$document_id = 'document_id_example'; // string | The unique documentId returned in the POST /documents response body.
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").

try {
    $result = $apiInstance->getDocumentStatus($avalara_version, $document_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsApi->getDocumentStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **document_id** | **string**| The unique documentId returned in the POST /documents response body. |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\DocumentStatusResponse**](../Model/DocumentStatusResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `submitDocument()`

```php
submitDocument($avalara_version, $metadata, $data, $x_avalara_client): \Avalara\SDK\Model\EInvoicing\V1\DocumentSubmitResponse
```

Submits a document to Avalara E-Invoicing API

When a UBL document is sent to this endpoint, it generates a document in the required format as mandated by the specified country. Additionally, it initiates the workflow to transmit the generated document to the relevant tax authority, if necessary.<br><br>The response from the endpoint contains a unique document ID, which can be used to request the status of the document and verify if it was successfully accepted at the destination.<br><br>Furthermore, the unique ID enables the download of a copy of the generated document for reference purposes.

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

$apiInstance = new Avalara\SDK\Api\DocumentsApi($client);

$avalara_version = 1.6; // string | Header that specifies the API version to use (for example \"1.6\").
$metadata = new \Avalara\SDK\Model\EInvoicing\V1\SubmitDocumentMetadata(); // \Avalara\SDK\Model\EInvoicing\V1\SubmitDocumentMetadata
$data = array('key' => new \stdClass); // object | The document to be submitted, as indicated by the metadata fields 'dataFormat' and 'dataFormatVersion'
$x_avalara_client = John's E-Invoicing-API Client; // string | Optional header for a client identifier string used for diagnostics (for example \"Fingerprint\").

try {
    $result = $apiInstance->submitDocument($avalara_version, $metadata, $data, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsApi->submitDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| Header that specifies the API version to use (for example \&quot;1.6\&quot;). |
 **metadata** | [**\Avalara\SDK\Model\EInvoicing\V1\SubmitDocumentMetadata**](../Model/SubmitDocumentMetadata.md)|  |
 **data** | [**object**](../Model/object.md)| The document to be submitted, as indicated by the metadata fields &#39;dataFormat&#39; and &#39;dataFormatVersion&#39; |
 **x_avalara_client** | **string**| Optional header for a client identifier string used for diagnostics (for example \&quot;Fingerprint\&quot;). | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\DocumentSubmitResponse**](../Model/DocumentSubmitResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`, `text/xml`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
