# Avalara\SDK\DocumentsApi

All URIs are relative to https://api.sbx.avalara.com/einvoicing.

Method | HTTP request | Description
------------- | ------------- | -------------
[**downloadDocument()**](DocumentsApi.md#downloadDocument) | **GET** /documents/{documentId}/$download | Returns a copy of the document
[**getDocumentList()**](DocumentsApi.md#getDocumentList) | **GET** /documents | Returns a summary of documents for a date range
[**getDocumentStatus()**](DocumentsApi.md#getDocumentStatus) | **GET** /document/{documentId}/status | Checks the status of a document
[**submitDocument()**](DocumentsApi.md#submitDocument) | **POST** /documents | Submits a document to Avalara E-Invoicing API


## `downloadDocument()`

```php
downloadDocument($avalara_version, $accept, $document_id, $x_avalara_client): \SplFileObject
```

Returns a copy of the document

When the document is available, use this endpoint to download it as text, XML, or PDF. The output format needs to be specified in the Accept header and it will vary depending on the mandate. If the file has not yet been created, then status code 404 (not found) is returned.

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

$avalara_version = 1.0; // string | The HTTP Header meant to specify the version of the API intended to be used
$accept = application/pdf; // string | This header indicates the MIME type of the document
$document_id = 'document_id_example'; // string | The unique ID for this document that was returned in the POST /einvoicing/document response body
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\"

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
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot; | [optional]

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

## `getDocumentList()`

```php
getDocumentList($avalara_version, $x_avalara_client, $start_date, $end_date, $flow, $count, $count_only, $filter, $top, $skip): \Avalara\SDK\Model\EInvoicing\V1\DocumentListResponse
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

$apiInstance = new Avalara\SDK\Api\DocumentsApi($client);

$avalara_version = 1.0; // string | The HTTP Header meant to specify the version of the API intended to be used
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\"
$start_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Start date of documents to return. This defaults to the previous month.
$end_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | End date of documents to return. This defaults to the current date.
$flow = out; // string | Optionally filter by document direction, where issued = `out` and received = `in`
$count = true; // string | When set to true, the count of the collection is also returned in the response body
$count_only = false; // string | When set to true, only the count of the collection is returned
$filter = id eq 2023-02-000016; // string | Filter by field name and value. This filter only supports <code>eq</code> . Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering. Filtering will be done over the provided startDate and endDate. If no startDate or endDate is provided, defaults will be assumed.
$top = 10; // float | If nonzero, return no more than this number of results. Used with <code>$skip</code> to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 200 records.
$skip = 10; // string | If nonzero, skip this number of results before returning data. Used with <code>$top</code> to provide pagination for large datasets.

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
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot; | [optional]
 **start_date** | **\DateTime**| Start date of documents to return. This defaults to the previous month. | [optional]
 **end_date** | **\DateTime**| End date of documents to return. This defaults to the current date. | [optional]
 **flow** | **string**| Optionally filter by document direction, where issued &#x3D; &#x60;out&#x60; and received &#x3D; &#x60;in&#x60; | [optional]
 **count** | **string**| When set to true, the count of the collection is also returned in the response body | [optional]
 **count_only** | **string**| When set to true, only the count of the collection is returned | [optional]
 **filter** | **string**| Filter by field name and value. This filter only supports &lt;code&gt;eq&lt;/code&gt; . Refer to [https://developer.avalara.com/avatax/filtering-in-rest/](https://developer.avalara.com/avatax/filtering-in-rest/) for more information on filtering. Filtering will be done over the provided startDate and endDate. If no startDate or endDate is provided, defaults will be assumed. | [optional]
 **top** | **float**| If nonzero, return no more than this number of results. Used with &lt;code&gt;$skip&lt;/code&gt; to provide pagination for large datasets. Unless otherwise specified, the maximum number of records that can be returned from an API call is 200 records. | [optional]
 **skip** | **string**| If nonzero, skip this number of results before returning data. Used with &lt;code&gt;$top&lt;/code&gt; to provide pagination for large datasets. | [optional]

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

$apiInstance = new Avalara\SDK\Api\DocumentsApi($client);

$avalara_version = 1.0; // string | The HTTP Header meant to specify the version of the API intended to be used
$document_id = 'document_id_example'; // string | The unique ID for this document that was returned in the POST /einvoicing/documents response body
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\"

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
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot; | [optional]

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

For both e-invoices and credit notes, when a document is sent to this endpoint, it generates an invoice or credit note in the required format as mandated by the specified country. Additionally, it initiates the workflow to transmit the generated document to the relevant tax authority, if necessary.<br><br>The response from the endpoint contains a unique document ID, which can be used to request the status of the document and verify if it was successfully accepted at the destination.<br><br>Furthermore, the unique ID enables the download of a copy of the e-invoice or credit note for reference purposes.

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

$avalara_version = 1.0; // string | The HTTP Header meant to specify the version of the API intended to be used
$metadata = new \Avalara\SDK\Model\EInvoicing\V1\SubmitDocumentMetadata(); // \Avalara\SDK\Model\EInvoicing\V1\SubmitDocumentMetadata
$data = new \Avalara\SDK\Model\EInvoicing\V1\SubmitDocumentData(); // \Avalara\SDK\Model\EInvoicing\V1\SubmitDocumentData
$x_avalara_client = John's E-Invoicing-API Client; // string | You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \"Fingerprint\"

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
 **metadata** | [**\Avalara\SDK\Model\EInvoicing\V1\SubmitDocumentMetadata**](../Model/SubmitDocumentMetadata.md)|  |
 **data** | [**\Avalara\SDK\Model\EInvoicing\V1\SubmitDocumentData**](../Model/SubmitDocumentData.md)|  |
 **x_avalara_client** | **string**| You can freely use any text you wish for this value. This feature can help you diagnose and solve problems with your software. The header can be treated like a \&quot;Fingerprint\&quot; | [optional]

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
