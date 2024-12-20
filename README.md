# OpenAPIClient-php

API for evaluating transactions against direct-to-consumer Beverage Alcohol shipping regulations.

This API is currently in beta.



## Installation & Usage

### Requirements

PHP 7.3 and later.
Should also work with PHP 8.0 but has not been tested.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration();
$config->setBearerToken('YOUR_JWT_ACCESS_TOKEN');
$config->setAppName('YOUR_APP_NAME');
$config->setEnvironment('sandbox');
$config->setMachineName('YOUR_MACHINE_NAME');
$config->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\\SDK\Api\AddressesApi($client);

$x_avalara_client = 'Swagger UI; 22.7.0; Custom; 1.0'; // string | Identifies the software you are using to call this API.  For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$body = new \Avalara\\SDK\Model\\Avatax\AddressValidationInfo(); // \Avalara\\SDK\Model\\Avatax\AddressValidationInfo | The address to resolve

try {
    $result = $apiInstance->resolveAddressPost($x_avalara_client, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AddressesApi->resolveAddressPost: ', $e->getMessage(), PHP_EOL;
}

```

## Documentation for Authorization

Authentication schemes defined for the API:
<a name="OAuth Client Credentials Flow"></a>
### OAuth Client Credentials

- **Type**: OAuth
- **Flow**: client_credentials
- **Scopes**: 
  - avatax_api: avatax_api scope.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Client Credentials Flow and other config options
$config = new \Avalara\SDK\Configuration();
$config->setClientId('YOUR_CLIENT_ID');
$config->setClientSecret('YOUR_CLIENT_SECRET');
$config->setAppName('YOUR_APP_NAME');
$config->setEnvironment('sandbox');
$config->setMachineName('YOUR_MACHINE_NAME');
$config->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\\SDK\Api\AddressesApi($client);

$x_avalara_client = 'Swagger UI; 22.7.0; Custom; 1.0'; // string | Identifies the software you are using to call this API.  For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$body = new \Avalara\\SDK\Model\\Avatax\AddressValidationInfo(); // \Avalara\\SDK\Model\\Avatax\AddressValidationInfo | The address to resolve

try {
    $result = $apiInstance->resolveAddressPost($x_avalara_client, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AddressesApi->resolveAddressPost: ', $e->getMessage(), PHP_EOL;
}
```

<a name="OAuth Device Code Flow"></a>
### OAuth Device Code

- **Type**: OAuth
- **Flow**: device_code
- **Scopes**: 
  - avatax_api: avatax_api scope.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Device Code Flow and other config options
$config = new \Avalara\SDK\Configuration();
$config->setClientId('YOUR_CLIENT_ID');
$config->setAppName('YOUR_APP_NAME');
$config->setEnvironment('sandbox');
$config->setMachineName('YOUR_MACHINE_NAME');
$config->setAppVersion('YOUR_APP_VERSION');

// Fetch Device Code 
$result = \Avalara\SDK\Auth\OAuthHelper::initiateDeviceAuthorizationFlow('avatax_api', $config);
// User Interaction needs to happen here - some polling logic is needed to wait for offline user to authenticate to verification_uri through browser
$tokenResult = \Avalara\SDK\Auth\OAuthHelper::getAccessTokenForDeviceFlow($result->deviceCode, $config);
// Once user authenticates, tokenResult will contain Bearer token.
$config->setBearerToken($tokenResult->accessToken);

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\\SDK\Api\AddressesApi($client);

$x_avalara_client = 'Swagger UI; 22.7.0; Custom; 1.0'; // string | Identifies the software you are using to call this API.  For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$body = new \Avalara\\SDK\Model\\Avatax\AddressValidationInfo(); // \Avalara\\SDK\Model\\Avatax\AddressValidationInfo | The address to resolve

try {
    $result = $apiInstance->resolveAddressPost($x_avalara_client, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AddressesApi->resolveAddressPost: ', $e->getMessage(), PHP_EOL;
}
```

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Logging

All [PSR-3 compatible](https://www.php-fig.org/psr/psr-3/) loggers are supported by the SDK.

### Usage

Declare whichever PSR-3 logger that you desire and pass it in via the configuration object. The example below uses [Monolog](https://github.com/Seldaek/monolog)

```php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$config = new \Avalara\SDK\Configuration();
// Configure logger
$logger = new Logger('AddressLogger');
$logger->pushHandler(new StreamHandler(__DIR__ . '/../../app.log', Logger::DEBUG));
// Setup log options , first parameter is logRequestAndResponseBody, which can be true|false. Second parameter is the PSR-3 compatible logger.
$logOptions = new \Avalara\SDK\Utils\LogOptions(true, $logger);
$config->setLogOptions($logOptions);
$client =  new \Avalara\SDK\ApiClient($config);
```
## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `v2`
    - Package version: `2.5.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`

<a name="documentation-for-api-endpoints"></a>
## Documentation for API Endpoints

<a name="documentation-for-EInvoicing-V1-api-endpoints"></a>
### EInvoicing V1 API Documentation

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DataInputFieldsApi* | [**getDataInputFields**](docs/EInvoicing/V1/DataInputFieldsApi.md#getdatainputfields) | **GET** /data-input-fields | Returns the mandatory and conditional invoice or creditnote input fields for different country mandates
*DocumentsApi* | [**downloadDocument**](docs/EInvoicing/V1/DocumentsApi.md#downloaddocument) | **GET** /documents/{documentId}/$download | Returns a copy of the document
*DocumentsApi* | [**getDocumentList**](docs/EInvoicing/V1/DocumentsApi.md#getdocumentlist) | **GET** /documents | Returns a summary of documents for a date range
*DocumentsApi* | [**getDocumentStatus**](docs/EInvoicing/V1/DocumentsApi.md#getdocumentstatus) | **GET** /documents/{documentId}/status | Checks the status of a document
*DocumentsApi* | [**submitDocument**](docs/EInvoicing/V1/DocumentsApi.md#submitdocument) | **POST** /documents | Submits a document to Avalara E-Invoicing API
*MandatesApi* | [**getMandates**](docs/EInvoicing/V1/MandatesApi.md#getmandates) | **GET** /mandates | List country mandates that are supported by the Avalara E-Invoicing platform

<a name="documentation-for-EInvoicing-V1-api-endpoints"></a>
### EInvoicing V1 API Documentation

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DataInputFieldsApi* | [**getDataInputFields**](docs/EInvoicing/V1/DataInputFieldsApi.md#getdatainputfields) | **GET** /data-input-fields | Returns the optionality of document fields for different country mandates
*DocumentsApi* | [**downloadDocument**](docs/EInvoicing/V1/DocumentsApi.md#downloaddocument) | **GET** /documents/{documentId}/$download | Returns a copy of the document
*DocumentsApi* | [**fetchDocuments**](docs/EInvoicing/V1/DocumentsApi.md#fetchdocuments) | **POST** /documents/$fetch | Fetch the inbound document from a tax authority
*DocumentsApi* | [**getDocumentList**](docs/EInvoicing/V1/DocumentsApi.md#getdocumentlist) | **GET** /documents | Returns a summary of documents for a date range
*DocumentsApi* | [**getDocumentStatus**](docs/EInvoicing/V1/DocumentsApi.md#getdocumentstatus) | **GET** /documents/{documentId}/status | Checks the status of a document
*DocumentsApi* | [**submitDocument**](docs/EInvoicing/V1/DocumentsApi.md#submitdocument) | **POST** /documents | Submits a document to Avalara E-Invoicing API
*MandatesApi* | [**getMandateDataInputFields**](docs/EInvoicing/V1/MandatesApi.md#getmandatedatainputfields) | **GET** /mandates/{mandateId}/data-input-fields | Returns document field information for a country mandate, a selected document type, and its version
*MandatesApi* | [**getMandates**](docs/EInvoicing/V1/MandatesApi.md#getmandates) | **GET** /mandates | List country mandates that are supported by the Avalara E-Invoicing platform

<a name="documentation-for-EInvoicing-V1-api-endpoints"></a>
### EInvoicing V1 API Documentation

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DataInputFieldsApi* | [**getDataInputFields**](docs/EInvoicing/V1/DataInputFieldsApi.md#getdatainputfields) | **GET** /data-input-fields | Returns the optionality of document fields for different country mandates
*DocumentsApi* | [**downloadDocument**](docs/EInvoicing/V1/DocumentsApi.md#downloaddocument) | **GET** /documents/{documentId}/$download | Returns a copy of the document
*DocumentsApi* | [**fetchDocuments**](docs/EInvoicing/V1/DocumentsApi.md#fetchdocuments) | **POST** /documents/$fetch | Fetch the inbound document from a tax authority
*DocumentsApi* | [**getDocumentList**](docs/EInvoicing/V1/DocumentsApi.md#getdocumentlist) | **GET** /documents | Returns a summary of documents for a date range
*DocumentsApi* | [**getDocumentStatus**](docs/EInvoicing/V1/DocumentsApi.md#getdocumentstatus) | **GET** /documents/{documentId}/status | Checks the status of a document
*DocumentsApi* | [**submitDocument**](docs/EInvoicing/V1/DocumentsApi.md#submitdocument) | **POST** /documents | Submits a document to Avalara E-Invoicing API
*InteropApi* | [**submitInteropDocument**](docs/EInvoicing/V1/InteropApi.md#submitinteropdocument) | **POST** /interop/documents | Submit a document
*MandatesApi* | [**getMandateDataInputFields**](docs/EInvoicing/V1/MandatesApi.md#getmandatedatainputfields) | **GET** /mandates/{mandateId}/data-input-fields | Returns document field information for a country mandate, a selected document type, and its version
*MandatesApi* | [**getMandates**](docs/EInvoicing/V1/MandatesApi.md#getmandates) | **GET** /mandates | List country mandates that are supported by the Avalara E-Invoicing platform
*TradingPartnersApi* | [**batchSearchParticipants**](docs/EInvoicing/V1/TradingPartnersApi.md#batchsearchparticipants) | **POST** /trading-partners/batch-searches | Creates a batch search and performs a batch search in the directory for participants in the background.
*TradingPartnersApi* | [**downloadBatchSearchReport**](docs/EInvoicing/V1/TradingPartnersApi.md#downloadbatchsearchreport) | **GET** /trading-partners/batch-searches/{id}/$download-results | Download batch search results in a csv file.
*TradingPartnersApi* | [**getBatchSearchDetail**](docs/EInvoicing/V1/TradingPartnersApi.md#getbatchsearchdetail) | **GET** /trading-partners/batch-searches/{id} | Get the batch search details for a given id.
*TradingPartnersApi* | [**listBatchSearches**](docs/EInvoicing/V1/TradingPartnersApi.md#listbatchsearches) | **GET** /trading-partners/batch-searches | List all batch searches that were previously submitted.
*TradingPartnersApi* | [**searchParticipants**](docs/EInvoicing/V1/TradingPartnersApi.md#searchparticipants) | **GET** /trading-partners | Returns a list of participants matching the input query.

<a name="documentation-for-models"></a>
## Documentation for Models

<a name="documentation-for-EInvoicing-V1-models"></a>
### EInvoicing V1 Model Documentation

 - [Avalara\\SDK\Model\\EInvoicing\\V1\BadDownloadRequest](docs/EInvoicing/V1/BadDownloadRequest.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\BadRequest](docs/EInvoicing/V1/BadRequest.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\ConditionalForField](docs/EInvoicing/V1/ConditionalForField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputField](docs/EInvoicing/V1/DataInputField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputFieldNotUsedFor](docs/EInvoicing/V1/DataInputFieldNotUsedFor.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputFieldOptionalFor](docs/EInvoicing/V1/DataInputFieldOptionalFor.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputFieldRequiredFor](docs/EInvoicing/V1/DataInputFieldRequiredFor.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputFieldsResponse](docs/EInvoicing/V1/DataInputFieldsResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentListResponse](docs/EInvoicing/V1/DocumentListResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentStatusResponse](docs/EInvoicing/V1/DocumentStatusResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentSubmissionError](docs/EInvoicing/V1/DocumentSubmissionError.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentSubmitResponse](docs/EInvoicing/V1/DocumentSubmitResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentSummary](docs/EInvoicing/V1/DocumentSummary.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\ForbiddenError](docs/EInvoicing/V1/ForbiddenError.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\InputDataFormats](docs/EInvoicing/V1/InputDataFormats.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\InternalServerError](docs/EInvoicing/V1/InternalServerError.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\Mandate](docs/EInvoicing/V1/Mandate.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\MandatesResponse](docs/EInvoicing/V1/MandatesResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\NotFoundError](docs/EInvoicing/V1/NotFoundError.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\NotUsedForField](docs/EInvoicing/V1/NotUsedForField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\RequiredWhenField](docs/EInvoicing/V1/RequiredWhenField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\StatusEvent](docs/EInvoicing/V1/StatusEvent.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\SubmitDocumentMetadata](docs/EInvoicing/V1/SubmitDocumentMetadata.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\WorkflowIds](docs/EInvoicing/V1/WorkflowIds.md)


<a name="documentation-for-EInvoicing-V1-models"></a>
### EInvoicing V1 Model Documentation

 - [Avalara\\SDK\Model\\EInvoicing\\V1\BadDownloadRequest](docs/EInvoicing/V1/BadDownloadRequest.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\BadRequest](docs/EInvoicing/V1/BadRequest.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\ConditionalForField](docs/EInvoicing/V1/ConditionalForField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputField](docs/EInvoicing/V1/DataInputField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputFieldNotUsedFor](docs/EInvoicing/V1/DataInputFieldNotUsedFor.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputFieldOptionalFor](docs/EInvoicing/V1/DataInputFieldOptionalFor.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputFieldRequiredFor](docs/EInvoicing/V1/DataInputFieldRequiredFor.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputFieldsResponse](docs/EInvoicing/V1/DataInputFieldsResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentFetch](docs/EInvoicing/V1/DocumentFetch.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentListResponse](docs/EInvoicing/V1/DocumentListResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentStatusResponse](docs/EInvoicing/V1/DocumentStatusResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentSubmissionError](docs/EInvoicing/V1/DocumentSubmissionError.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentSubmitResponse](docs/EInvoicing/V1/DocumentSubmitResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentSummary](docs/EInvoicing/V1/DocumentSummary.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\FetchDocumentsRequest](docs/EInvoicing/V1/FetchDocumentsRequest.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\FetchDocumentsRequestDataInner](docs/EInvoicing/V1/FetchDocumentsRequestDataInner.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\FetchDocumentsRequestMetadata](docs/EInvoicing/V1/FetchDocumentsRequestMetadata.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\ForbiddenError](docs/EInvoicing/V1/ForbiddenError.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\InputDataFormats](docs/EInvoicing/V1/InputDataFormats.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\InternalServerError](docs/EInvoicing/V1/InternalServerError.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\Mandate](docs/EInvoicing/V1/Mandate.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\MandateDataInputField](docs/EInvoicing/V1/MandateDataInputField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\MandateDataInputFieldNamespace](docs/EInvoicing/V1/MandateDataInputFieldNamespace.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\MandatesResponse](docs/EInvoicing/V1/MandatesResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\NotFoundError](docs/EInvoicing/V1/NotFoundError.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\NotUsedForField](docs/EInvoicing/V1/NotUsedForField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\RequiredWhenField](docs/EInvoicing/V1/RequiredWhenField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\StatusEvent](docs/EInvoicing/V1/StatusEvent.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\SubmitDocumentMetadata](docs/EInvoicing/V1/SubmitDocumentMetadata.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\WorkflowIds](docs/EInvoicing/V1/WorkflowIds.md)


<a name="documentation-for-EInvoicing-V1-models"></a>
### EInvoicing V1 Model Documentation

 - [Avalara\\SDK\Model\\EInvoicing\\V1\BadDownloadRequest](docs/EInvoicing/V1/BadDownloadRequest.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\BadRequest](docs/EInvoicing/V1/BadRequest.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\BatchSearch](docs/EInvoicing/V1/BatchSearch.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\BatchSearchListResponse](docs/EInvoicing/V1/BatchSearchListResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\ConditionalForField](docs/EInvoicing/V1/ConditionalForField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputField](docs/EInvoicing/V1/DataInputField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputFieldNotUsedFor](docs/EInvoicing/V1/DataInputFieldNotUsedFor.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputFieldOptionalFor](docs/EInvoicing/V1/DataInputFieldOptionalFor.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputFieldRequiredFor](docs/EInvoicing/V1/DataInputFieldRequiredFor.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DataInputFieldsResponse](docs/EInvoicing/V1/DataInputFieldsResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DirectorySearchResponse](docs/EInvoicing/V1/DirectorySearchResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DirectorySearchResponseValueInner](docs/EInvoicing/V1/DirectorySearchResponseValueInner.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DirectorySearchResponseValueInnerAddressesInner](docs/EInvoicing/V1/DirectorySearchResponseValueInnerAddressesInner.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DirectorySearchResponseValueInnerIdentifiersInner](docs/EInvoicing/V1/DirectorySearchResponseValueInnerIdentifiersInner.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DirectorySearchResponseValueInnerSupportedDocumentTypesInner](docs/EInvoicing/V1/DirectorySearchResponseValueInnerSupportedDocumentTypesInner.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentFetch](docs/EInvoicing/V1/DocumentFetch.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentListResponse](docs/EInvoicing/V1/DocumentListResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentStatusResponse](docs/EInvoicing/V1/DocumentStatusResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentSubmissionError](docs/EInvoicing/V1/DocumentSubmissionError.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentSubmitResponse](docs/EInvoicing/V1/DocumentSubmitResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\DocumentSummary](docs/EInvoicing/V1/DocumentSummary.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\ErrorResponse](docs/EInvoicing/V1/ErrorResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\FetchDocumentsRequest](docs/EInvoicing/V1/FetchDocumentsRequest.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\FetchDocumentsRequestDataInner](docs/EInvoicing/V1/FetchDocumentsRequestDataInner.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\FetchDocumentsRequestMetadata](docs/EInvoicing/V1/FetchDocumentsRequestMetadata.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\ForbiddenError](docs/EInvoicing/V1/ForbiddenError.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\InputDataFormats](docs/EInvoicing/V1/InputDataFormats.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\InternalServerError](docs/EInvoicing/V1/InternalServerError.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\Mandate](docs/EInvoicing/V1/Mandate.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\MandateDataInputField](docs/EInvoicing/V1/MandateDataInputField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\MandateDataInputFieldNamespace](docs/EInvoicing/V1/MandateDataInputFieldNamespace.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\MandatesResponse](docs/EInvoicing/V1/MandatesResponse.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\NotFoundError](docs/EInvoicing/V1/NotFoundError.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\NotUsedForField](docs/EInvoicing/V1/NotUsedForField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\RequiredWhenField](docs/EInvoicing/V1/RequiredWhenField.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\StatusEvent](docs/EInvoicing/V1/StatusEvent.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\SubmitDocumentMetadata](docs/EInvoicing/V1/SubmitDocumentMetadata.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\SubmitInteropDocument202Response](docs/EInvoicing/V1/SubmitInteropDocument202Response.md)
 - [Avalara\\SDK\Model\\EInvoicing\\V1\WorkflowIds](docs/EInvoicing/V1/WorkflowIds.md)
