# AvalaraSDK\DocumentsApi

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

When the document is available, use this endpoint to download it as text, XML, or PDF. The output format needs to be specified in the Accept header, and it will vary depending on the mandate. If the file has not yet been created, then status code 404 (not found) is returned.

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

$apiInstance = new AvalaraSDK\Api\DocumentsApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used
$accept = application/pdf; // string | This header indicates the MIME type of the document
$document_id = 'document_id_example'; // string | The unique ID for this document that was returned in the POST /einvoicing/document response body
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint.

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
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **accept** | **string**| This header indicates the MIME type of the document |
 **document_id** | **string**| The unique ID for this document that was returned in the POST /einvoicing/document response body |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint. | [optional]

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
fetchDocuments($avalara_version, $fetch_documents_request, $x_avalara_client): \AvalaraSDK\ModelEInvoicingV1\DocumentFetch
```

Fetch the inbound document from a tax authority

This API allows you to retrieve an inbound document. Pass key-value pairs as parameters in the request, such as the confirmation number, supplier number, and buyer VAT number.

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

$apiInstance = new AvalaraSDK\Api\DocumentsApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used
$fetch_documents_request = new \AvalaraSDK\ModelEInvoicingV1\FetchDocumentsRequest(); // \AvalaraSDK\ModelEInvoicingV1\FetchDocumentsRequest
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint.

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
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **fetch_documents_request** | [**\AvalaraSDK\ModelEInvoicingV1\FetchDocumentsRequest**](../Model/FetchDocumentsRequest.md)|  |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint. | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\DocumentFetch**](../Model/DocumentFetch.md)

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
getDocumentList($avalara_version, $x_avalara_client, $start_date, $end_date, $flow, $count, $count_only, $filter, $top, $skip): \AvalaraSDK\ModelEInvoicingV1\DocumentListResponse
```

Returns a summary of documents for a date range

Get a list of documents on the Avalara E-Invoicing platform that have a processing date within the specified date range.

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

$apiInstance = new AvalaraSDK\Api\DocumentsApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint.
$start_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Start date of documents to return. This defaults to the previous month.
$end_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | End date of documents to return. This defaults to the current date.
$flow = out; // string | Optionally filter by document direction, where issued = `out` and received = `in`
$count = true; // string | When set to true, the count of the collection is also returned in the response body
$count_only = false; // string | When set to true, only the count of the collection is returned
$filter = id eq 52f60401-44d0-4667-ad47-4afe519abb53; // string | Filter by field name and value. This filter only supports <code>eq</code> . Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering. Filtering will be done over the provided startDate and endDate. If no startDate or endDate is provided, defaults will be assumed.
$top = 56; // int | The number of items to include in the result.
$skip = 56; // int | The number of items to skip in the result.

try {
    $result = $apiInstance->getDocumentList($avalara_version, $x_avalara_client, $start_date, $end_date, $flow, $count, $count_only, $filter, $top, $skip);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsApi->getDocumentList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint. | [optional]
 **start_date** | **\DateTime**| Start date of documents to return. This defaults to the previous month. | [optional]
 **end_date** | **\DateTime**| End date of documents to return. This defaults to the current date. | [optional]
 **flow** | **string**| Optionally filter by document direction, where issued &#x3D; &#x60;out&#x60; and received &#x3D; &#x60;in&#x60; | [optional]
 **count** | **string**| When set to true, the count of the collection is also returned in the response body | [optional]
 **count_only** | **string**| When set to true, only the count of the collection is returned | [optional]
 **filter** | **string**| Filter by field name and value. This filter only supports &lt;code&gt;eq&lt;/code&gt; . Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering. Filtering will be done over the provided startDate and endDate. If no startDate or endDate is provided, defaults will be assumed. | [optional]
 **top** | **int**| The number of items to include in the result. | [optional]
 **skip** | **int**| The number of items to skip in the result. | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\DocumentListResponse**](../Model/DocumentListResponse.md)

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
getDocumentStatus($avalara_version, $document_id, $x_avalara_client): \AvalaraSDK\ModelEInvoicingV1\DocumentStatusResponse
```

Checks the status of a document

Using the unique ID from POST /einvoicing/documents response body, request the current status of a document.

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

$apiInstance = new AvalaraSDK\Api\DocumentsApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used
$document_id = 'document_id_example'; // string | The unique ID for this document that was returned in the POST /einvoicing/documents response body
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint.

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
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **document_id** | **string**| The unique ID for this document that was returned in the POST /einvoicing/documents response body |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint. | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\DocumentStatusResponse**](../Model/DocumentStatusResponse.md)

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
submitDocument($avalara_version, $metadata, $data, $x_avalara_client): \AvalaraSDK\ModelEInvoicingV1\DocumentSubmitResponse
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

$apiInstance = new AvalaraSDK\Api\DocumentsApi($client);

$avalara_version = 1.4; // string | The HTTP Header meant to specify the version of the API intended to be used
$metadata = new \AvalaraSDK\ModelEInvoicingV1\SubmitDocumentMetadata(); // \AvalaraSDK\ModelEInvoicingV1\SubmitDocumentMetadata
$data = array('key' => new \stdClass); // object | The document to be submitted, as indicated by the metadata fields 'dataFormat' and 'dataFormatVersion'
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint.

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
 **avalara_version** | **string**| The HTTP Header meant to specify the version of the API intended to be used |
 **metadata** | [**\AvalaraSDK\ModelEInvoicingV1\SubmitDocumentMetadata**](../Model/SubmitDocumentMetadata.md)|  |
 **data** | [**object**](../Model/object.md)| The document to be submitted, as indicated by the metadata fields &#39;dataFormat&#39; and &#39;dataFormatVersion&#39; |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a fingerprint. | [optional]

### Return type

[**\AvalaraSDK\ModelEInvoicingV1\DocumentSubmitResponse**](../Model/DocumentSubmitResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`, `text/xml`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
