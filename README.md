# Avalara.SDK - the Unified Java SDK for next gen Avalara services.

Unified SDK consists of services on top of which the Avalara Compliance Cloud platform is built. These services are foundational and provide functionality such as einvoicing.

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
      "url": "https://github.com/avadev/Avalara-SDK-PHP.git"
    }
  ],
  "require": {
    "avalara/avalara_sdk": "24.12.1"
  }
}
```

Then run `composer install`

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

$apiInstance = new \Avalara\SDK\API\EInvoicing\V1\MandatesApi($client);

$request_options = new \Avalara\SDK\API\EInvoicing\V1\GetMandatesRequest();
$request_options->setXAvalaraClient('Swagger UI; 22.7.0; Custom; 1.0'); // string | Identifies the software you are using to call this API.  For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
try {
    $result = $apiInstance->getMandates($request_options);
    print_r("Result: ". $result);
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

## Documentation for API Endpoints

<a name="documentation-for-EInvoicing-V1-api-endpoints"></a>

### EInvoicing V1 API Documentation

| Class                | Method                                                                                              | HTTP request                                                    | Description                                                                                             |
| -------------------- | --------------------------------------------------------------------------------------------------- | --------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- |
| _DataInputFieldsApi_ | [**getDataInputFields**](docs/EInvoicing/V1/DataInputFieldsApi.md#getdatainputfields)               | **GET** /data-input-fields                                      | Returns the optionality of document fields for different country mandates                               |
| _DocumentsApi_       | [**downloadDocument**](docs/EInvoicing/V1/DocumentsApi.md#downloaddocument)                         | **GET** /documents/{documentId}/$download                       | Returns a copy of the document                                                                          |
| _DocumentsApi_       | [**fetchDocuments**](docs/EInvoicing/V1/DocumentsApi.md#fetchdocuments)                             | **POST** /documents/$fetch                                      | Fetch the inbound document from a tax authority                                                         |
| _DocumentsApi_       | [**getDocumentList**](docs/EInvoicing/V1/DocumentsApi.md#getdocumentlist)                           | **GET** /documents                                              | Returns a summary of documents for a date range                                                         |
| _DocumentsApi_       | [**getDocumentStatus**](docs/EInvoicing/V1/DocumentsApi.md#getdocumentstatus)                       | **GET** /documents/{documentId}/status                          | Checks the status of a document                                                                         |
| _DocumentsApi_       | [**submitDocument**](docs/EInvoicing/V1/DocumentsApi.md#submitdocument)                             | **POST** /documents                                             | Submits a document to Avalara E-Invoicing API                                                           |
| _InteropApi_         | [**submitInteropDocument**](docs/EInvoicing/V1/InteropApi.md#submitinteropdocument)                 | **POST** /interop/documents                                     | Submit a document                                                                                       |
| _MandatesApi_        | [**getMandateDataInputFields**](docs/EInvoicing/V1/MandatesApi.md#getmandatedatainputfields)        | **GET** /mandates/{mandateId}/data-input-fields                 | Returns document field information for a country mandate, a selected document type, and its version     |
| _MandatesApi_        | [**getMandates**](docs/EInvoicing/V1/MandatesApi.md#getmandates)                                    | **GET** /mandates                                               | List country mandates that are supported by the Avalara E-Invoicing platform                            |
| _TradingPartnersApi_ | [**batchSearchParticipants**](docs/EInvoicing/V1/TradingPartnersApi.md#batchsearchparticipants)     | **POST** /trading-partners/batch-searches                       | Creates a batch search and performs a batch search in the directory for participants in the background. |
| _TradingPartnersApi_ | [**downloadBatchSearchReport**](docs/EInvoicing/V1/TradingPartnersApi.md#downloadbatchsearchreport) | **GET** /trading-partners/batch-searches/{id}/$download-results | Download batch search results in a csv file.                                                            |
| _TradingPartnersApi_ | [**getBatchSearchDetail**](docs/EInvoicing/V1/TradingPartnersApi.md#getbatchsearchdetail)           | **GET** /trading-partners/batch-searches/{id}                   | Get the batch search details for a given id.                                                            |
| _TradingPartnersApi_ | [**listBatchSearches**](docs/EInvoicing/V1/TradingPartnersApi.md#listbatchsearches)                 | **GET** /trading-partners/batch-searches                        | List all batch searches that were previously submitted.                                                 |
| _TradingPartnersApi_ | [**searchParticipants**](docs/EInvoicing/V1/TradingPartnersApi.md#searchparticipants)               | **GET** /trading-partners                                       | Returns a list of participants matching the input query.                                                |

<a name="documentation-for-models"></a>

## Documentation for Models

<a name="documentation-for-EInvoicing-V1-models"></a>

### EInvoicing V1 Model Documentation

- [Avalara\SDK\Model\EInvoicing\V1\BadDownloadRequest](docs/EInvoicing/V1/BadDownloadRequest.md)
- [Avalara\SDK\Model\EInvoicing\V1\BadRequest](docs/EInvoicing/V1/BadRequest.md)
- [Avalara\SDK\Model\EInvoicing\V1\BatchSearch](docs/EInvoicing/V1/BatchSearch.md)
- [Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse](docs/EInvoicing/V1/BatchSearchListResponse.md)
- [Avalara\SDK\Model\EInvoicing\V1\ConditionalForField](docs/EInvoicing/V1/ConditionalForField.md)
- [Avalara\SDK\Model\EInvoicing\V1\DataInputField](docs/EInvoicing/V1/DataInputField.md)
- [Avalara\SDK\Model\EInvoicing\V1\DataInputFieldNotUsedFor](docs/EInvoicing/V1/DataInputFieldNotUsedFor.md)
- [Avalara\SDK\Model\EInvoicing\V1\DataInputFieldOptionalFor](docs/EInvoicing/V1/DataInputFieldOptionalFor.md)
- [Avalara\SDK\Model\EInvoicing\V1\DataInputFieldRequiredFor](docs/EInvoicing/V1/DataInputFieldRequiredFor.md)
- [Avalara\SDK\Model\EInvoicing\V1\DataInputFieldsResponse](docs/EInvoicing/V1/DataInputFieldsResponse.md)
- [Avalara\SDK\Model\EInvoicing\V1\DirectorySearchResponse](docs/EInvoicing/V1/DirectorySearchResponse.md)
- [Avalara\SDK\Model\EInvoicing\V1\DirectorySearchResponseValueInner](docs/EInvoicing/V1/DirectorySearchResponseValueInner.md)
- [Avalara\SDK\Model\EInvoicing\V1\DirectorySearchResponseValueInnerAddressesInner](docs/EInvoicing/V1/DirectorySearchResponseValueInnerAddressesInner.md)
- [Avalara\SDK\Model\EInvoicing\V1\DirectorySearchResponseValueInnerIdentifiersInner](docs/EInvoicing/V1/DirectorySearchResponseValueInnerIdentifiersInner.md)
- [Avalara\SDK\Model\EInvoicing\V1\DirectorySearchResponseValueInnerSupportedDocumentTypesInner](docs/EInvoicing/V1/DirectorySearchResponseValueInnerSupportedDocumentTypesInner.md)
- [Avalara\SDK\Model\EInvoicing\V1\DocumentFetch](docs/EInvoicing/V1/DocumentFetch.md)
- [Avalara\SDK\Model\EInvoicing\V1\DocumentFetchRequest](docs/EInvoicing/V1/DocumentFetchRequest.md)
- [Avalara\SDK\Model\EInvoicing\V1\DocumentFetchRequestDataInner](docs/EInvoicing/V1/DocumentFetchRequestDataInner.md)
- [Avalara\SDK\Model\EInvoicing\V1\DocumentFetchRequestMetadata](docs/EInvoicing/V1/DocumentFetchRequestMetadata.md)
- [Avalara\SDK\Model\EInvoicing\V1\DocumentListResponse](docs/EInvoicing/V1/DocumentListResponse.md)
- [Avalara\SDK\Model\EInvoicing\V1\DocumentStatusResponse](docs/EInvoicing/V1/DocumentStatusResponse.md)
- [Avalara\SDK\Model\EInvoicing\V1\DocumentSubmissionError](docs/EInvoicing/V1/DocumentSubmissionError.md)
- [Avalara\SDK\Model\EInvoicing\V1\DocumentSubmitResponse](docs/EInvoicing/V1/DocumentSubmitResponse.md)
- [Avalara\SDK\Model\EInvoicing\V1\DocumentSummary](docs/EInvoicing/V1/DocumentSummary.md)
- [Avalara\SDK\Model\EInvoicing\V1\ErrorResponse](docs/EInvoicing/V1/ErrorResponse.md)
- [Avalara\SDK\Model\EInvoicing\V1\ForbiddenError](docs/EInvoicing/V1/ForbiddenError.md)
- [Avalara\SDK\Model\EInvoicing\V1\InputDataFormats](docs/EInvoicing/V1/InputDataFormats.md)
- [Avalara\SDK\Model\EInvoicing\V1\InternalServerError](docs/EInvoicing/V1/InternalServerError.md)
- [Avalara\SDK\Model\EInvoicing\V1\Mandate](docs/EInvoicing/V1/Mandate.md)
- [Avalara\SDK\Model\EInvoicing\V1\MandateDataInputField](docs/EInvoicing/V1/MandateDataInputField.md)
- [Avalara\SDK\Model\EInvoicing\V1\MandateDataInputFieldNamespace](docs/EInvoicing/V1/MandateDataInputFieldNamespace.md)
- [Avalara\SDK\Model\EInvoicing\V1\MandatesResponse](docs/EInvoicing/V1/MandatesResponse.md)
- [Avalara\SDK\Model\EInvoicing\V1\NotFoundError](docs/EInvoicing/V1/NotFoundError.md)
- [Avalara\SDK\Model\EInvoicing\V1\NotUsedForField](docs/EInvoicing/V1/NotUsedForField.md)
- [Avalara\SDK\Model\EInvoicing\V1\RequiredWhenField](docs/EInvoicing/V1/RequiredWhenField.md)
- [Avalara\SDK\Model\EInvoicing\V1\StatusEvent](docs/EInvoicing/V1/StatusEvent.md)
- [Avalara\SDK\Model\EInvoicing\V1\SubmitDocumentMetadata](docs/EInvoicing/V1/SubmitDocumentMetadata.md)
- [Avalara\SDK\Model\EInvoicing\V1\SubmitInteropDocument202Response](docs/EInvoicing/V1/SubmitInteropDocument202Response.md)
- [Avalara\SDK\Model\EInvoicing\V1\WorkflowIds](docs/EInvoicing/V1/WorkflowIds.md)
<a name="documentation-for-api-endpoints"></a>
## Documentation for API Endpoints

<a name="documentation-for-EInvoicing-V1-api-endpoints"></a>
### EInvoicing V1 API Documentation

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*CodeListsApi* | [**getCodeList**](docs/EInvoicing/V1/CodeListsApi.md#getcodelist) | **GET** /codelists/{codelistId} | Retrieves a code list by ID for a specific country
*CodeListsApi* | [**getCodeListList**](docs/EInvoicing/V1/CodeListsApi.md#getcodelistlist) | **GET** /codelists | Returns a list of code lists for a specific country
*DataInputFieldsApi* | [**getDataInputFields**](docs/EInvoicing/V1/DataInputFieldsApi.md#getdatainputfields) | **GET** /data-input-fields | Returns the optionality of document fields for different country mandates
*DocumentsApi* | [**downloadDocument**](docs/EInvoicing/V1/DocumentsApi.md#downloaddocument) | **GET** /documents/{documentId}/$download | Returns a copy of the document
*DocumentsApi* | [**fetchDocuments**](docs/EInvoicing/V1/DocumentsApi.md#fetchdocuments) | **POST** /documents/$fetch | Fetch the inbound document from a tax authority
*DocumentsApi* | [**getDocumentList**](docs/EInvoicing/V1/DocumentsApi.md#getdocumentlist) | **GET** /documents | Returns a summary of documents for a date range
*DocumentsApi* | [**getDocumentStatus**](docs/EInvoicing/V1/DocumentsApi.md#getdocumentstatus) | **GET** /documents/{documentId}/status | Checks the status of a document
*DocumentsApi* | [**submitDocument**](docs/EInvoicing/V1/DocumentsApi.md#submitdocument) | **POST** /documents | Submits a document to Avalara E-Invoicing API
*InteropApi* | [**submitInteropDocument**](docs/EInvoicing/V1/InteropApi.md#submitinteropdocument) | **POST** /interop/documents | Submit a document
*MandatesApi* | [**getMandateDataInputFields**](docs/EInvoicing/V1/MandatesApi.md#getmandatedatainputfields) | **GET** /mandates/{mandateId}/data-input-fields | Returns document field information for a country mandate, a selected document type, and its version
*MandatesApi* | [**getMandates**](docs/EInvoicing/V1/MandatesApi.md#getmandates) | **GET** /mandates | List country mandates that are supported by the Avalara E-Invoicing platform
*ReportsApi* | [**downloadReport**](docs/EInvoicing/V1/ReportsApi.md#downloadreport) | **GET** /reports/{reportId}/$download | Returns a pre-signed download URL for a report
*ReportsApi* | [**getReportById**](docs/EInvoicing/V1/ReportsApi.md#getreportbyid) | **GET** /reports/{reportId}/status | Retrieves a report by its unique ID
*ReportsApi* | [**getReports**](docs/EInvoicing/V1/ReportsApi.md#getreports) | **GET** /reports | Returns a list of reports
*SubscriptionsApi* | [**createWebhookSubscription**](docs/EInvoicing/V1/SubscriptionsApi.md#createwebhooksubscription) | **POST** /webhooks/subscriptions | Create a subscription to events
*SubscriptionsApi* | [**deleteWebhookSubscription**](docs/EInvoicing/V1/SubscriptionsApi.md#deletewebhooksubscription) | **DELETE** /webhooks/subscriptions/{subscriptionId} | Unsubscribe from events
*SubscriptionsApi* | [**getWebhookSubscription**](docs/EInvoicing/V1/SubscriptionsApi.md#getwebhooksubscription) | **GET** /webhooks/subscriptions/{subscriptionId} | Get details of a subscription
*SubscriptionsApi* | [**listWebhookSubscriptions**](docs/EInvoicing/V1/SubscriptionsApi.md#listwebhooksubscriptions) | **GET** /webhooks/subscriptions | List all subscriptions
*TaxIdentifiersApi* | [**taxIdentifierSchemaByCountry**](docs/EInvoicing/V1/TaxIdentifiersApi.md#taxidentifierschemabycountry) | **GET** /tax-identifiers/schema | Returns the tax identifier request and response schema for a specific country.
*TaxIdentifiersApi* | [**validateTaxIdentifier**](docs/EInvoicing/V1/TaxIdentifiersApi.md#validatetaxidentifier) | **POST** /tax-identifiers/validate | Validates a tax identifier.
*TradingPartnersApi* | [**batchSearchParticipants**](docs/EInvoicing/V1/TradingPartnersApi.md#batchsearchparticipants) | **POST** /trading-partners/batch-searches | Handles batch search requests by uploading a file containing search parameters.
*TradingPartnersApi* | [**createTradingPartner**](docs/EInvoicing/V1/TradingPartnersApi.md#createtradingpartner) | **POST** /trading-partners | Creates a new trading partner.
*TradingPartnersApi* | [**createTradingPartnersBatch**](docs/EInvoicing/V1/TradingPartnersApi.md#createtradingpartnersbatch) | **POST** /trading-partners/batch | Creates a batch of multiple trading partners.
*TradingPartnersApi* | [**deleteTradingPartner**](docs/EInvoicing/V1/TradingPartnersApi.md#deletetradingpartner) | **DELETE** /trading-partners/{id} | Deletes a trading partner using ID.
*TradingPartnersApi* | [**downloadBatchSearchReport**](docs/EInvoicing/V1/TradingPartnersApi.md#downloadbatchsearchreport) | **GET** /trading-partners/batch-searches/{id}/$download-results | Downloads batch search results in a csv file.
*TradingPartnersApi* | [**getBatchSearchDetail**](docs/EInvoicing/V1/TradingPartnersApi.md#getbatchsearchdetail) | **GET** /trading-partners/batch-searches/{id} | Returns the batch search details using ID.
*TradingPartnersApi* | [**listBatchSearches**](docs/EInvoicing/V1/TradingPartnersApi.md#listbatchsearches) | **GET** /trading-partners/batch-searches | Lists all batch searches that were previously submitted.
*TradingPartnersApi* | [**searchParticipants**](docs/EInvoicing/V1/TradingPartnersApi.md#searchparticipants) | **GET** /trading-partners | Returns a list of participants matching the input query.
*TradingPartnersApi* | [**updateTradingPartner**](docs/EInvoicing/V1/TradingPartnersApi.md#updatetradingpartner) | **PUT** /trading-partners/{id} | Updates a trading partner using ID.

<a name="documentation-for-models"></a>
## Documentation for Models

<a name="documentation-for-EInvoicing-V1-models"></a>
### EInvoicing V1 Model Documentation

 - [AvalaraSDK\Model\EInvoicing\V1\Address](docs/EInvoicing/V1/Address.md)
 - [AvalaraSDK\Model\EInvoicing\V1\BadDownloadRequest](docs/EInvoicing/V1/BadDownloadRequest.md)
 - [AvalaraSDK\Model\EInvoicing\V1\BadRequest](docs/EInvoicing/V1/BadRequest.md)
 - [AvalaraSDK\Model\EInvoicing\V1\BatchErrorDetail](docs/EInvoicing/V1/BatchErrorDetail.md)
 - [AvalaraSDK\Model\EInvoicing\V1\BatchSearch](docs/EInvoicing/V1/BatchSearch.md)
 - [AvalaraSDK\Model\EInvoicing\V1\BatchSearchListResponse](docs/EInvoicing/V1/BatchSearchListResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\BatchSearchParticipants202Response](docs/EInvoicing/V1/BatchSearchParticipants202Response.md)
 - [AvalaraSDK\Model\EInvoicing\V1\CodeListListResponse](docs/EInvoicing/V1/CodeListListResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\CodeListResponse](docs/EInvoicing/V1/CodeListResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\CodeListSummary](docs/EInvoicing/V1/CodeListSummary.md)
 - [AvalaraSDK\Model\EInvoicing\V1\CodeListValue](docs/EInvoicing/V1/CodeListValue.md)
 - [AvalaraSDK\Model\EInvoicing\V1\CodeListVersion](docs/EInvoicing/V1/CodeListVersion.md)
 - [AvalaraSDK\Model\EInvoicing\V1\ConditionalForField](docs/EInvoicing/V1/ConditionalForField.md)
 - [AvalaraSDK\Model\EInvoicing\V1\Consents](docs/EInvoicing/V1/Consents.md)
 - [AvalaraSDK\Model\EInvoicing\V1\CreateTradingPartner201Response](docs/EInvoicing/V1/CreateTradingPartner201Response.md)
 - [AvalaraSDK\Model\EInvoicing\V1\CreateTradingPartnersBatch200Response](docs/EInvoicing/V1/CreateTradingPartnersBatch200Response.md)
 - [AvalaraSDK\Model\EInvoicing\V1\CreateTradingPartnersBatch200ResponseValueInner](docs/EInvoicing/V1/CreateTradingPartnersBatch200ResponseValueInner.md)
 - [AvalaraSDK\Model\EInvoicing\V1\CreateTradingPartnersBatchRequest](docs/EInvoicing/V1/CreateTradingPartnersBatchRequest.md)
 - [AvalaraSDK\Model\EInvoicing\V1\DataInputField](docs/EInvoicing/V1/DataInputField.md)
 - [AvalaraSDK\Model\EInvoicing\V1\DataInputFieldNotUsedFor](docs/EInvoicing/V1/DataInputFieldNotUsedFor.md)
 - [AvalaraSDK\Model\EInvoicing\V1\DataInputFieldOptionalFor](docs/EInvoicing/V1/DataInputFieldOptionalFor.md)
 - [AvalaraSDK\Model\EInvoicing\V1\DataInputFieldRequiredFor](docs/EInvoicing/V1/DataInputFieldRequiredFor.md)
 - [AvalaraSDK\Model\EInvoicing\V1\DataInputFieldsResponse](docs/EInvoicing/V1/DataInputFieldsResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\DocumentFetch](docs/EInvoicing/V1/DocumentFetch.md)
 - [AvalaraSDK\Model\EInvoicing\V1\DocumentListResponse](docs/EInvoicing/V1/DocumentListResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\DocumentStatusResponse](docs/EInvoicing/V1/DocumentStatusResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\DocumentSubmissionError](docs/EInvoicing/V1/DocumentSubmissionError.md)
 - [AvalaraSDK\Model\EInvoicing\V1\DocumentSubmitResponse](docs/EInvoicing/V1/DocumentSubmitResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\DocumentSummary](docs/EInvoicing/V1/DocumentSummary.md)
 - [AvalaraSDK\Model\EInvoicing\V1\ErrorResponse](docs/EInvoicing/V1/ErrorResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\EventId](docs/EInvoicing/V1/EventId.md)
 - [AvalaraSDK\Model\EInvoicing\V1\EventMessage](docs/EInvoicing/V1/EventMessage.md)
 - [AvalaraSDK\Model\EInvoicing\V1\EventPayload](docs/EInvoicing/V1/EventPayload.md)
 - [AvalaraSDK\Model\EInvoicing\V1\EventSubscription](docs/EInvoicing/V1/EventSubscription.md)
 - [AvalaraSDK\Model\EInvoicing\V1\Extension](docs/EInvoicing/V1/Extension.md)
 - [AvalaraSDK\Model\EInvoicing\V1\FetchDocumentsRequest](docs/EInvoicing/V1/FetchDocumentsRequest.md)
 - [AvalaraSDK\Model\EInvoicing\V1\FetchDocumentsRequestDataInner](docs/EInvoicing/V1/FetchDocumentsRequestDataInner.md)
 - [AvalaraSDK\Model\EInvoicing\V1\FetchDocumentsRequestMetadata](docs/EInvoicing/V1/FetchDocumentsRequestMetadata.md)
 - [AvalaraSDK\Model\EInvoicing\V1\ForbiddenError](docs/EInvoicing/V1/ForbiddenError.md)
 - [AvalaraSDK\Model\EInvoicing\V1\HmacSignature](docs/EInvoicing/V1/HmacSignature.md)
 - [AvalaraSDK\Model\EInvoicing\V1\HmacSignatureValue](docs/EInvoicing/V1/HmacSignatureValue.md)
 - [AvalaraSDK\Model\EInvoicing\V1\Id](docs/EInvoicing/V1/Id.md)
 - [AvalaraSDK\Model\EInvoicing\V1\Identifier](docs/EInvoicing/V1/Identifier.md)
 - [AvalaraSDK\Model\EInvoicing\V1\InputDataFormats](docs/EInvoicing/V1/InputDataFormats.md)
 - [AvalaraSDK\Model\EInvoicing\V1\InternalServerError](docs/EInvoicing/V1/InternalServerError.md)
 - [AvalaraSDK\Model\EInvoicing\V1\Mandate](docs/EInvoicing/V1/Mandate.md)
 - [AvalaraSDK\Model\EInvoicing\V1\MandateDataInputField](docs/EInvoicing/V1/MandateDataInputField.md)
 - [AvalaraSDK\Model\EInvoicing\V1\MandateDataInputFieldNamespace](docs/EInvoicing/V1/MandateDataInputFieldNamespace.md)
 - [AvalaraSDK\Model\EInvoicing\V1\MandatesResponse](docs/EInvoicing/V1/MandatesResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\NotFoundError](docs/EInvoicing/V1/NotFoundError.md)
 - [AvalaraSDK\Model\EInvoicing\V1\NotUsedForField](docs/EInvoicing/V1/NotUsedForField.md)
 - [AvalaraSDK\Model\EInvoicing\V1\OutputDataFormats](docs/EInvoicing/V1/OutputDataFormats.md)
 - [AvalaraSDK\Model\EInvoicing\V1\Pagination](docs/EInvoicing/V1/Pagination.md)
 - [AvalaraSDK\Model\EInvoicing\V1\ReportDownloadResponse](docs/EInvoicing/V1/ReportDownloadResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\ReportItem](docs/EInvoicing/V1/ReportItem.md)
 - [AvalaraSDK\Model\EInvoicing\V1\ReportListResponse](docs/EInvoicing/V1/ReportListResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\RequiredWhenField](docs/EInvoicing/V1/RequiredWhenField.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SearchParticipants200Response](docs/EInvoicing/V1/SearchParticipants200Response.md)
 - [AvalaraSDK\Model\EInvoicing\V1\Signature](docs/EInvoicing/V1/Signature.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SignatureSignature](docs/EInvoicing/V1/SignatureSignature.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SignatureValue](docs/EInvoicing/V1/SignatureValue.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SignatureValueSignature](docs/EInvoicing/V1/SignatureValueSignature.md)
 - [AvalaraSDK\Model\EInvoicing\V1\StatusEvent](docs/EInvoicing/V1/StatusEvent.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SubmitDocumentMetadata](docs/EInvoicing/V1/SubmitDocumentMetadata.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SubmitInteropDocument202Response](docs/EInvoicing/V1/SubmitInteropDocument202Response.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SubscriptionCommon](docs/EInvoicing/V1/SubscriptionCommon.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SubscriptionDetail](docs/EInvoicing/V1/SubscriptionDetail.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SubscriptionListResponse](docs/EInvoicing/V1/SubscriptionListResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SubscriptionRegistration](docs/EInvoicing/V1/SubscriptionRegistration.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SuccessResponse](docs/EInvoicing/V1/SuccessResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SupportedDocumentStatuses](docs/EInvoicing/V1/SupportedDocumentStatuses.md)
 - [AvalaraSDK\Model\EInvoicing\V1\SupportedDocumentTypes](docs/EInvoicing/V1/SupportedDocumentTypes.md)
 - [AvalaraSDK\Model\EInvoicing\V1\TaxIdentifierRequest](docs/EInvoicing/V1/TaxIdentifierRequest.md)
 - [AvalaraSDK\Model\EInvoicing\V1\TaxIdentifierResponse](docs/EInvoicing/V1/TaxIdentifierResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\TaxIdentifierResponseValue](docs/EInvoicing/V1/TaxIdentifierResponseValue.md)
 - [AvalaraSDK\Model\EInvoicing\V1\TaxIdentifierSchemaByCountry200Response](docs/EInvoicing/V1/TaxIdentifierSchemaByCountry200Response.md)
 - [AvalaraSDK\Model\EInvoicing\V1\TradingPartner](docs/EInvoicing/V1/TradingPartner.md)
 - [AvalaraSDK\Model\EInvoicing\V1\UpdateTradingPartner200Response](docs/EInvoicing/V1/UpdateTradingPartner200Response.md)
 - [AvalaraSDK\Model\EInvoicing\V1\ValidationError](docs/EInvoicing/V1/ValidationError.md)
 - [AvalaraSDK\Model\EInvoicing\V1\WebhookInvocation](docs/EInvoicing/V1/WebhookInvocation.md)
 - [AvalaraSDK\Model\EInvoicing\V1\WebhooksErrorInfo](docs/EInvoicing/V1/WebhooksErrorInfo.md)
 - [AvalaraSDK\Model\EInvoicing\V1\WebhooksErrorResponse](docs/EInvoicing/V1/WebhooksErrorResponse.md)
 - [AvalaraSDK\Model\EInvoicing\V1\WorkflowIds](docs/EInvoicing/V1/WorkflowIds.md)
