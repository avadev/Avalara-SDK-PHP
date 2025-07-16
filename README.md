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
*DataInputFieldsApi* | [**getDataInputFields**](docs/EInvoicing/V1/DataInputFieldsApi.md#getdatainputfields) | **GET** /data-input-fields | Returns the optionality of document fields for different country mandates
*DocumentsApi* | [**downloadDocument**](docs/EInvoicing/V1/DocumentsApi.md#downloaddocument) | **GET** /documents/{documentId}/$download | Returns a copy of the document
*DocumentsApi* | [**fetchDocuments**](docs/EInvoicing/V1/DocumentsApi.md#fetchdocuments) | **POST** /documents/$fetch | Fetch the inbound document from a tax authority
*DocumentsApi* | [**getDocumentList**](docs/EInvoicing/V1/DocumentsApi.md#getdocumentlist) | **GET** /documents | Returns a summary of documents for a date range
*DocumentsApi* | [**getDocumentStatus**](docs/EInvoicing/V1/DocumentsApi.md#getdocumentstatus) | **GET** /documents/{documentId}/status | Checks the status of a document
*DocumentsApi* | [**submitDocument**](docs/EInvoicing/V1/DocumentsApi.md#submitdocument) | **POST** /documents | Submits a document to Avalara E-Invoicing API
*InteropApi* | [**submitInteropDocument**](docs/EInvoicing/V1/InteropApi.md#submitinteropdocument) | **POST** /interop/documents | Submit a document
*MandatesApi* | [**getMandateDataInputFields**](docs/EInvoicing/V1/MandatesApi.md#getmandatedatainputfields) | **GET** /mandates/{mandateId}/data-input-fields | Returns document field information for a country mandate, a selected document type, and its version
*MandatesApi* | [**getMandates**](docs/EInvoicing/V1/MandatesApi.md#getmandates) | **GET** /mandates | List country mandates that are supported by the Avalara E-Invoicing platform
*SubscriptionsApi* | [**createWebhookSubscription**](docs/EInvoicing/V1/SubscriptionsApi.md#createwebhooksubscription) | **POST** /webhooks/subscriptions | Create a subscription to events
*SubscriptionsApi* | [**deleteWebhookSubscription**](docs/EInvoicing/V1/SubscriptionsApi.md#deletewebhooksubscription) | **DELETE** /webhooks/subscriptions/{subscription-id} | Unsubscribe from events
*SubscriptionsApi* | [**getWebhookSubscription**](docs/EInvoicing/V1/SubscriptionsApi.md#getwebhooksubscription) | **GET** /webhooks/subscriptions/{subscription-id} | Get details of a subscription
*SubscriptionsApi* | [**listWebhookSubscriptions**](docs/EInvoicing/V1/SubscriptionsApi.md#listwebhooksubscriptions) | **GET** /webhooks/subscriptions | List all subscriptions
*TradingPartnersApi* | [**batchSearchParticipants**](docs/EInvoicing/V1/TradingPartnersApi.md#batchsearchparticipants) | **POST** /trading-partners/batch-searches | Creates a batch search and performs a batch search in the directory for participants in the background.
*TradingPartnersApi* | [**downloadBatchSearchReport**](docs/EInvoicing/V1/TradingPartnersApi.md#downloadbatchsearchreport) | **GET** /trading-partners/batch-searches/{id}/$download-results | Download batch search results in a csv file.
*TradingPartnersApi* | [**getBatchSearchDetail**](docs/EInvoicing/V1/TradingPartnersApi.md#getbatchsearchdetail) | **GET** /trading-partners/batch-searches/{id} | Get the batch search details for a given id.
*TradingPartnersApi* | [**listBatchSearches**](docs/EInvoicing/V1/TradingPartnersApi.md#listbatchsearches) | **GET** /trading-partners/batch-searches | List all batch searches that were previously submitted.
*TradingPartnersApi* | [**searchParticipants**](docs/EInvoicing/V1/TradingPartnersApi.md#searchparticipants) | **GET** /trading-partners | Returns a list of participants matching the input query.

<a name="documentation-for-A1099-V2-api-endpoints"></a>
### A1099 V2 API Documentation

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*CompaniesW9Api* | [**createCompany**](docs/A1099/V2/CompaniesW9Api.md#createcompany) | **POST** /w9/companies | Creates a new company
*CompaniesW9Api* | [**deleteCompany**](docs/A1099/V2/CompaniesW9Api.md#deletecompany) | **DELETE** /w9/companies/{id} | Deletes a company
*CompaniesW9Api* | [**getCompanies**](docs/A1099/V2/CompaniesW9Api.md#getcompanies) | **GET** /w9/companies | List companies
*CompaniesW9Api* | [**getCompany**](docs/A1099/V2/CompaniesW9Api.md#getcompany) | **GET** /w9/companies/{id} | Retrieve a company
*CompaniesW9Api* | [**updateCompany**](docs/A1099/V2/CompaniesW9Api.md#updatecompany) | **PUT** /w9/companies/{id} | Update a company
*Forms1099Api* | [**bulkUpsert1099Forms**](docs/A1099/V2/Forms1099Api.md#bulkupsert1099forms) | **POST** /1099/forms/$bulk-upsert | Creates or updates multiple 1099 forms.
*Forms1099Api* | [**create1099Form**](docs/A1099/V2/Forms1099Api.md#create1099form) | **POST** /1099/forms | Creates a 1099 form.
*Forms1099Api* | [**delete1099Form**](docs/A1099/V2/Forms1099Api.md#delete1099form) | **DELETE** /1099/forms/{id} | Deletes a 1099 form.
*Forms1099Api* | [**get1099Form**](docs/A1099/V2/Forms1099Api.md#get1099form) | **GET** /1099/forms/{id} | Retrieves a 1099 form.
*Forms1099Api* | [**get1099FormPdf**](docs/A1099/V2/Forms1099Api.md#get1099formpdf) | **GET** /1099/forms/{id}/pdf | Retrieves the PDF file for a single 1099 by form id.
*Forms1099Api* | [**list1099Forms**](docs/A1099/V2/Forms1099Api.md#list1099forms) | **GET** /1099/forms | Retrieves a list of 1099 forms based on query parameters.
*Forms1099Api* | [**update1099Form**](docs/A1099/V2/Forms1099Api.md#update1099form) | **PUT** /1099/forms/{id} | Updates a 1099 form.
*FormsW9Api* | [**createW9Form**](docs/A1099/V2/FormsW9Api.md#createw9form) | **POST** /w9/forms | Create a W9/W4/W8 form
*FormsW9Api* | [**deleteW9Form**](docs/A1099/V2/FormsW9Api.md#deletew9form) | **DELETE** /w9/forms/{id} | Delete a form
*FormsW9Api* | [**getW9Form**](docs/A1099/V2/FormsW9Api.md#getw9form) | **GET** /w9/forms/{id} | Retrieve a W9/W4/W8 form
*FormsW9Api* | [**listW9Forms**](docs/A1099/V2/FormsW9Api.md#listw9forms) | **GET** /w9/forms | List W9/W4/W8 forms.
*FormsW9Api* | [**sendW9FormEmail**](docs/A1099/V2/FormsW9Api.md#sendw9formemail) | **POST** /w9/forms/{id}/$send-email | Sends a W9 email request to a vendor/payee
*FormsW9Api* | [**updateW9Form**](docs/A1099/V2/FormsW9Api.md#updatew9form) | **PUT** /w9/forms/{id} | Update a W9/W4/W8 form
*FormsW9Api* | [**uploadW9Files**](docs/A1099/V2/FormsW9Api.md#uploadw9files) | **PUT** /w9/forms/{id}/attachment | Upload files for a W9/W4/W8 form
*Issuers1099Api* | [**createIssuer**](docs/A1099/V2/Issuers1099Api.md#createissuer) | **POST** /1099/issuers | Create an issuer
*Issuers1099Api* | [**deleteIssuer**](docs/A1099/V2/Issuers1099Api.md#deleteissuer) | **DELETE** /1099/issuers/{id} | Delete an issuer
*Issuers1099Api* | [**getIssuer**](docs/A1099/V2/Issuers1099Api.md#getissuer) | **GET** /1099/issuers/{id} | Get an issuer
*Issuers1099Api* | [**getIssuers**](docs/A1099/V2/Issuers1099Api.md#getissuers) | **GET** /1099/issuers | List issuers
*Issuers1099Api* | [**updateIssuer**](docs/A1099/V2/Issuers1099Api.md#updateissuer) | **PUT** /1099/issuers/{id} | Update an issuer
*Jobs1099Api* | [**getJob**](docs/A1099/V2/Jobs1099Api.md#getjob) | **GET** /1099/jobs/{id} | Retrieves information about the job

<a name="documentation-for-models"></a>
## Documentation for Models

<a name="documentation-for-EInvoicing-V1-models"></a>
### EInvoicing V1 Model Documentation

 - [Avalara\SDK\Model\EInvoicing\V1\BadDownloadRequest](docs/EInvoicing/V1/BadDownloadRequest.md)
 - [Avalara\SDK\Model\EInvoicing\V1\BadRequest](docs/EInvoicing/V1/BadRequest.md)
 - [Avalara\SDK\Model\EInvoicing\V1\BatchSearch](docs/EInvoicing/V1/BatchSearch.md)
 - [Avalara\SDK\Model\EInvoicing\V1\BatchSearchListResponse](docs/EInvoicing/V1/BatchSearchListResponse.md)
 - [Avalara\SDK\Model\EInvoicing\V1\BatchSearchParticipants202Response](docs/EInvoicing/V1/BatchSearchParticipants202Response.md)
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
 - [Avalara\SDK\Model\EInvoicing\V1\DocumentListResponse](docs/EInvoicing/V1/DocumentListResponse.md)
 - [Avalara\SDK\Model\EInvoicing\V1\DocumentStatusResponse](docs/EInvoicing/V1/DocumentStatusResponse.md)
 - [Avalara\SDK\Model\EInvoicing\V1\DocumentSubmissionError](docs/EInvoicing/V1/DocumentSubmissionError.md)
 - [Avalara\SDK\Model\EInvoicing\V1\DocumentSubmitResponse](docs/EInvoicing/V1/DocumentSubmitResponse.md)
 - [Avalara\SDK\Model\EInvoicing\V1\DocumentSummary](docs/EInvoicing/V1/DocumentSummary.md)
 - [Avalara\SDK\Model\EInvoicing\V1\ErrorResponse](docs/EInvoicing/V1/ErrorResponse.md)
 - [Avalara\SDK\Model\EInvoicing\V1\EventId](docs/EInvoicing/V1/EventId.md)
 - [Avalara\SDK\Model\EInvoicing\V1\EventMessage](docs/EInvoicing/V1/EventMessage.md)
 - [Avalara\SDK\Model\EInvoicing\V1\EventPayload](docs/EInvoicing/V1/EventPayload.md)
 - [Avalara\SDK\Model\EInvoicing\V1\EventSubscription](docs/EInvoicing/V1/EventSubscription.md)
 - [Avalara\SDK\Model\EInvoicing\V1\FetchDocumentsRequest](docs/EInvoicing/V1/FetchDocumentsRequest.md)
 - [Avalara\SDK\Model\EInvoicing\V1\FetchDocumentsRequestDataInner](docs/EInvoicing/V1/FetchDocumentsRequestDataInner.md)
 - [Avalara\SDK\Model\EInvoicing\V1\FetchDocumentsRequestMetadata](docs/EInvoicing/V1/FetchDocumentsRequestMetadata.md)
 - [Avalara\SDK\Model\EInvoicing\V1\ForbiddenError](docs/EInvoicing/V1/ForbiddenError.md)
 - [Avalara\SDK\Model\EInvoicing\V1\HmacSignature](docs/EInvoicing/V1/HmacSignature.md)
 - [Avalara\SDK\Model\EInvoicing\V1\HmacSignatureValue](docs/EInvoicing/V1/HmacSignatureValue.md)
 - [Avalara\SDK\Model\EInvoicing\V1\Id](docs/EInvoicing/V1/Id.md)
 - [Avalara\SDK\Model\EInvoicing\V1\InputDataFormats](docs/EInvoicing/V1/InputDataFormats.md)
 - [Avalara\SDK\Model\EInvoicing\V1\InternalServerError](docs/EInvoicing/V1/InternalServerError.md)
 - [Avalara\SDK\Model\EInvoicing\V1\Mandate](docs/EInvoicing/V1/Mandate.md)
 - [Avalara\SDK\Model\EInvoicing\V1\MandateDataInputField](docs/EInvoicing/V1/MandateDataInputField.md)
 - [Avalara\SDK\Model\EInvoicing\V1\MandateDataInputFieldNamespace](docs/EInvoicing/V1/MandateDataInputFieldNamespace.md)
 - [Avalara\SDK\Model\EInvoicing\V1\MandatesResponse](docs/EInvoicing/V1/MandatesResponse.md)
 - [Avalara\SDK\Model\EInvoicing\V1\NotFoundError](docs/EInvoicing/V1/NotFoundError.md)
 - [Avalara\SDK\Model\EInvoicing\V1\NotUsedForField](docs/EInvoicing/V1/NotUsedForField.md)
 - [Avalara\SDK\Model\EInvoicing\V1\OutputDataFormats](docs/EInvoicing/V1/OutputDataFormats.md)
 - [Avalara\SDK\Model\EInvoicing\V1\Pagination](docs/EInvoicing/V1/Pagination.md)
 - [Avalara\SDK\Model\EInvoicing\V1\RequiredWhenField](docs/EInvoicing/V1/RequiredWhenField.md)
 - [Avalara\SDK\Model\EInvoicing\V1\Signature](docs/EInvoicing/V1/Signature.md)
 - [Avalara\SDK\Model\EInvoicing\V1\SignatureSignature](docs/EInvoicing/V1/SignatureSignature.md)
 - [Avalara\SDK\Model\EInvoicing\V1\SignatureValue](docs/EInvoicing/V1/SignatureValue.md)
 - [Avalara\SDK\Model\EInvoicing\V1\SignatureValueSignature](docs/EInvoicing/V1/SignatureValueSignature.md)
 - [Avalara\SDK\Model\EInvoicing\V1\StatusEvent](docs/EInvoicing/V1/StatusEvent.md)
 - [Avalara\SDK\Model\EInvoicing\V1\SubmitDocumentMetadata](docs/EInvoicing/V1/SubmitDocumentMetadata.md)
 - [Avalara\SDK\Model\EInvoicing\V1\SubmitInteropDocument202Response](docs/EInvoicing/V1/SubmitInteropDocument202Response.md)
 - [Avalara\SDK\Model\EInvoicing\V1\SubscriptionCommon](docs/EInvoicing/V1/SubscriptionCommon.md)
 - [Avalara\SDK\Model\EInvoicing\V1\SubscriptionDetail](docs/EInvoicing/V1/SubscriptionDetail.md)
 - [Avalara\SDK\Model\EInvoicing\V1\SubscriptionListResponse](docs/EInvoicing/V1/SubscriptionListResponse.md)
 - [Avalara\SDK\Model\EInvoicing\V1\SubscriptionRegistration](docs/EInvoicing/V1/SubscriptionRegistration.md)
 - [Avalara\SDK\Model\EInvoicing\V1\SuccessResponse](docs/EInvoicing/V1/SuccessResponse.md)
 - [Avalara\SDK\Model\EInvoicing\V1\WebhookInvocation](docs/EInvoicing/V1/WebhookInvocation.md)
 - [Avalara\SDK\Model\EInvoicing\V1\WebhooksErrorInfo](docs/EInvoicing/V1/WebhooksErrorInfo.md)
 - [Avalara\SDK\Model\EInvoicing\V1\WebhooksErrorResponse](docs/EInvoicing/V1/WebhooksErrorResponse.md)
 - [Avalara\SDK\Model\EInvoicing\V1\WorkflowIds](docs/EInvoicing/V1/WorkflowIds.md)


<a name="documentation-for-A1099-V2-models"></a>
### A1099 V2 Model Documentation

 - [Avalara\SDK\Model\A1099\V2\Attribute](docs/A1099/V2/Attribute.md)
 - [Avalara\SDK\Model\A1099\V2\AuthorizedApiRequestModel](docs/A1099/V2/AuthorizedApiRequestModel.md)
 - [Avalara\SDK\Model\A1099\V2\AuthorizedApiRequestV2DataModel](docs/A1099/V2/AuthorizedApiRequestV2DataModel.md)
 - [Avalara\SDK\Model\A1099\V2\BaseCompanyModel](docs/A1099/V2/BaseCompanyModel.md)
 - [Avalara\SDK\Model\A1099\V2\BaseFormListRequest](docs/A1099/V2/BaseFormListRequest.md)
 - [Avalara\SDK\Model\A1099\V2\BulkUpsert1099FormsRequest](docs/A1099/V2/BulkUpsert1099FormsRequest.md)
 - [Avalara\SDK\Model\A1099\V2\CompanyCreateUpdateRequestModel](docs/A1099/V2/CompanyCreateUpdateRequestModel.md)
 - [Avalara\SDK\Model\A1099\V2\CompanyModel](docs/A1099/V2/CompanyModel.md)
 - [Avalara\SDK\Model\A1099\V2\CompanyResponse](docs/A1099/V2/CompanyResponse.md)
 - [Avalara\SDK\Model\A1099\V2\CompanyResponseModel](docs/A1099/V2/CompanyResponseModel.md)
 - [Avalara\SDK\Model\A1099\V2\CoveredIndividualReference](docs/A1099/V2/CoveredIndividualReference.md)
 - [Avalara\SDK\Model\A1099\V2\CoveredIndividualRequest](docs/A1099/V2/CoveredIndividualRequest.md)
 - [Avalara\SDK\Model\A1099\V2\Data](docs/A1099/V2/Data.md)
 - [Avalara\SDK\Model\A1099\V2\ErrorModel](docs/A1099/V2/ErrorModel.md)
 - [Avalara\SDK\Model\A1099\V2\ErrorResponse](docs/A1099/V2/ErrorResponse.md)
 - [Avalara\SDK\Model\A1099\V2\ErrorResponseErrorsInner](docs/A1099/V2/ErrorResponseErrorsInner.md)
 - [Avalara\SDK\Model\A1099\V2\Form1095B](docs/A1099/V2/Form1095B.md)
 - [Avalara\SDK\Model\A1099\V2\Form1095BList](docs/A1099/V2/Form1095BList.md)
 - [Avalara\SDK\Model\A1099\V2\Form1095BListItem](docs/A1099/V2/Form1095BListItem.md)
 - [Avalara\SDK\Model\A1099\V2\Form1095BRequest](docs/A1099/V2/Form1095BRequest.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099Base](docs/A1099/V2/Form1099Base.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099DivList](docs/A1099/V2/Form1099DivList.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099DivListItem](docs/A1099/V2/Form1099DivListItem.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099DivRequest](docs/A1099/V2/Form1099DivRequest.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099DivResponse](docs/A1099/V2/Form1099DivResponse.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099K](docs/A1099/V2/Form1099K.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099KList](docs/A1099/V2/Form1099KList.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099KListItem](docs/A1099/V2/Form1099KListItem.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099KRequest](docs/A1099/V2/Form1099KRequest.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099List](docs/A1099/V2/Form1099List.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099Misc](docs/A1099/V2/Form1099Misc.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099MiscList](docs/A1099/V2/Form1099MiscList.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099MiscListItem](docs/A1099/V2/Form1099MiscListItem.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099MiscRequest](docs/A1099/V2/Form1099MiscRequest.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099MiscResponse](docs/A1099/V2/Form1099MiscResponse.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099Nec](docs/A1099/V2/Form1099Nec.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099NecList](docs/A1099/V2/Form1099NecList.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099NecListItem](docs/A1099/V2/Form1099NecListItem.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099NecRequest](docs/A1099/V2/Form1099NecRequest.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099NecResponse](docs/A1099/V2/Form1099NecResponse.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099ProccessResult](docs/A1099/V2/Form1099ProccessResult.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099R](docs/A1099/V2/Form1099R.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099RList](docs/A1099/V2/Form1099RList.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099RListItem](docs/A1099/V2/Form1099RListItem.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099RRequest](docs/A1099/V2/Form1099RRequest.md)
 - [Avalara\SDK\Model\A1099\V2\Form1099StatusDetail](docs/A1099/V2/Form1099StatusDetail.md)
 - [Avalara\SDK\Model\A1099\V2\FormRequestBase](docs/A1099/V2/FormRequestBase.md)
 - [Avalara\SDK\Model\A1099\V2\FormRequestCsvBase](docs/A1099/V2/FormRequestCsvBase.md)
 - [Avalara\SDK\Model\A1099\V2\FormResponseBase](docs/A1099/V2/FormResponseBase.md)
 - [Avalara\SDK\Model\A1099\V2\FormSingleRequestBase](docs/A1099/V2/FormSingleRequestBase.md)
 - [Avalara\SDK\Model\A1099\V2\Get1099Form200Response](docs/A1099/V2/Get1099Form200Response.md)
 - [Avalara\SDK\Model\A1099\V2\HttpValidationProblemDetails](docs/A1099/V2/HttpValidationProblemDetails.md)
 - [Avalara\SDK\Model\A1099\V2\ICreateForm1099Request](docs/A1099/V2/ICreateForm1099Request.md)
 - [Avalara\SDK\Model\A1099\V2\IUpdateForm1099Request](docs/A1099/V2/IUpdateForm1099Request.md)
 - [Avalara\SDK\Model\A1099\V2\IW9FormDataModelsOneOf](docs/A1099/V2/IW9FormDataModelsOneOf.md)
 - [Avalara\SDK\Model\A1099\V2\IncludedBase](docs/A1099/V2/IncludedBase.md)
 - [Avalara\SDK\Model\A1099\V2\IssuerCommand](docs/A1099/V2/IssuerCommand.md)
 - [Avalara\SDK\Model\A1099\V2\IssuerResponse](docs/A1099/V2/IssuerResponse.md)
 - [Avalara\SDK\Model\A1099\V2\JobResult](docs/A1099/V2/JobResult.md)
 - [Avalara\SDK\Model\A1099\V2\Link](docs/A1099/V2/Link.md)
 - [Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModel](docs/A1099/V2/PaginatedQueryResultModel.md)
 - [Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelCompanyResponse](docs/A1099/V2/PaginatedQueryResultModelCompanyResponse.md)
 - [Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelIssuerResponse](docs/A1099/V2/PaginatedQueryResultModelIssuerResponse.md)
 - [Avalara\SDK\Model\A1099\V2\PaginatedW9FormsModel](docs/A1099/V2/PaginatedW9FormsModel.md)
 - [Avalara\SDK\Model\A1099\V2\ProblemDetails](docs/A1099/V2/ProblemDetails.md)
 - [Avalara\SDK\Model\A1099\V2\StateAndLocalWithholding](docs/A1099/V2/StateAndLocalWithholding.md)
 - [Avalara\SDK\Model\A1099\V2\StateAndLocalWithholdingRequest](docs/A1099/V2/StateAndLocalWithholdingRequest.md)
 - [Avalara\SDK\Model\A1099\V2\StateAndLocalWithholdingResponse](docs/A1099/V2/StateAndLocalWithholdingResponse.md)
 - [Avalara\SDK\Model\A1099\V2\StateEfileStatusDetail](docs/A1099/V2/StateEfileStatusDetail.md)
 - [Avalara\SDK\Model\A1099\V2\StateEfileStatusDetailApp](docs/A1099/V2/StateEfileStatusDetailApp.md)
 - [Avalara\SDK\Model\A1099\V2\StatusDetail](docs/A1099/V2/StatusDetail.md)
 - [Avalara\SDK\Model\A1099\V2\SubstantialUsOwnerResponse](docs/A1099/V2/SubstantialUsOwnerResponse.md)
 - [Avalara\SDK\Model\A1099\V2\Update1099Form200Response](docs/A1099/V2/Update1099Form200Response.md)
 - [Avalara\SDK\Model\A1099\V2\ValidationError](docs/A1099/V2/ValidationError.md)
 - [Avalara\SDK\Model\A1099\V2\ValidationErrorApp](docs/A1099/V2/ValidationErrorApp.md)
 - [Avalara\SDK\Model\A1099\V2\W4FormDataModel](docs/A1099/V2/W4FormDataModel.md)
 - [Avalara\SDK\Model\A1099\V2\W4FormResponse](docs/A1099/V2/W4FormResponse.md)
 - [Avalara\SDK\Model\A1099\V2\W8BenEFormResponse](docs/A1099/V2/W8BenEFormResponse.md)
 - [Avalara\SDK\Model\A1099\V2\W8BenESubstantialUsOwnerDataModel](docs/A1099/V2/W8BenESubstantialUsOwnerDataModel.md)
 - [Avalara\SDK\Model\A1099\V2\W8BenFormDataModel](docs/A1099/V2/W8BenFormDataModel.md)
 - [Avalara\SDK\Model\A1099\V2\W8BenFormResponse](docs/A1099/V2/W8BenFormResponse.md)
 - [Avalara\SDK\Model\A1099\V2\W8BeneFormDataModel](docs/A1099/V2/W8BeneFormDataModel.md)
 - [Avalara\SDK\Model\A1099\V2\W8ImyFormDataModel](docs/A1099/V2/W8ImyFormDataModel.md)
 - [Avalara\SDK\Model\A1099\V2\W8ImyFormResponse](docs/A1099/V2/W8ImyFormResponse.md)
 - [Avalara\SDK\Model\A1099\V2\W9FormBaseResponse](docs/A1099/V2/W9FormBaseResponse.md)
 - [Avalara\SDK\Model\A1099\V2\W9FormDataModel](docs/A1099/V2/W9FormDataModel.md)
 - [Avalara\SDK\Model\A1099\V2\W9FormResponse](docs/A1099/V2/W9FormResponse.md)
