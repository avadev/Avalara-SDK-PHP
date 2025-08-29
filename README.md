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
*TaxIdentifiersApi* | [**taxIdentifierSchemaByCountry**](docs/EInvoicing/V1/TaxIdentifiersApi.md#taxidentifierschemabycountry) | **GET** /tax-identifiers/schema | Returns the tax identifier request & response schema for a specific country.
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

<a name="documentation-for-A1099-V2-api-endpoints"></a>
### A1099 V2 API Documentation

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*CompaniesW9Api* | [**createCompany**](docs/A1099/V2/CompaniesW9Api.md#createcompany) | **POST** /w9/companies | Create a company
*CompaniesW9Api* | [**deleteCompany**](docs/A1099/V2/CompaniesW9Api.md#deletecompany) | **DELETE** /w9/companies/{id} | Delete a company
*CompaniesW9Api* | [**getCompanies**](docs/A1099/V2/CompaniesW9Api.md#getcompanies) | **GET** /w9/companies | List companies
*CompaniesW9Api* | [**getCompany**](docs/A1099/V2/CompaniesW9Api.md#getcompany) | **GET** /w9/companies/{id} | Retrieve a company
*CompaniesW9Api* | [**updateCompany**](docs/A1099/V2/CompaniesW9Api.md#updatecompany) | **PUT** /w9/companies/{id} | Update a company
*Forms1099Api* | [**bulkUpsert1099Forms**](docs/A1099/V2/Forms1099Api.md#bulkupsert1099forms) | **POST** /1099/forms/$bulk-upsert | Create or update multiple 1099/1095/W2/1042S forms
*Forms1099Api* | [**create1099Form**](docs/A1099/V2/Forms1099Api.md#create1099form) | **POST** /1099/forms | Create a 1099/1095/W2/1042S form
*Forms1099Api* | [**delete1099Form**](docs/A1099/V2/Forms1099Api.md#delete1099form) | **DELETE** /1099/forms/{id} | Delete a 1099/1095/W2/1042S form
*Forms1099Api* | [**get1099Form**](docs/A1099/V2/Forms1099Api.md#get1099form) | **GET** /1099/forms/{id} | Retrieve a 1099/1095/W2/1042S form
*Forms1099Api* | [**get1099FormPdf**](docs/A1099/V2/Forms1099Api.md#get1099formpdf) | **GET** /1099/forms/{id}/pdf | Retrieve the PDF file for a 1099/1095/W2/1042S form
*Forms1099Api* | [**list1099Forms**](docs/A1099/V2/Forms1099Api.md#list1099forms) | **GET** /1099/forms | List 1099/1095/W2/1042S forms
*Forms1099Api* | [**update1099Form**](docs/A1099/V2/Forms1099Api.md#update1099form) | **PUT** /1099/forms/{id} | Update a 1099/1095/W2/1042S form
*FormsW9Api* | [**createAndSendW9FormEmail**](docs/A1099/V2/FormsW9Api.md#createandsendw9formemail) | **POST** /w9/forms/$create-and-send-email | Create a minimal W9/W4/W8 form and sends the e-mail request
*FormsW9Api* | [**createW9Form**](docs/A1099/V2/FormsW9Api.md#createw9form) | **POST** /w9/forms | Create a W9/W4/W8 form
*FormsW9Api* | [**deleteW9Form**](docs/A1099/V2/FormsW9Api.md#deletew9form) | **DELETE** /w9/forms/{id} | Delete a W9/W4/W8 form
*FormsW9Api* | [**getW9Form**](docs/A1099/V2/FormsW9Api.md#getw9form) | **GET** /w9/forms/{id} | Retrieve a W9/W4/W8 form
*FormsW9Api* | [**listW9Forms**](docs/A1099/V2/FormsW9Api.md#listw9forms) | **GET** /w9/forms | List W9/W4/W8 forms
*FormsW9Api* | [**sendW9FormEmail**](docs/A1099/V2/FormsW9Api.md#sendw9formemail) | **POST** /w9/forms/{id}/$send-email | Send an email to the vendor/payee requesting they fill out a W9/W4/W8 form
*FormsW9Api* | [**updateW9Form**](docs/A1099/V2/FormsW9Api.md#updatew9form) | **PUT** /w9/forms/{id} | Update a W9/W4/W8 form
*FormsW9Api* | [**uploadW9Files**](docs/A1099/V2/FormsW9Api.md#uploadw9files) | **POST** /w9/forms/{id}/attachment | Replace the PDF file for a W9/W4/W8 form
*Issuers1099Api* | [**createIssuer**](docs/A1099/V2/Issuers1099Api.md#createissuer) | **POST** /1099/issuers | Create an issuer
*Issuers1099Api* | [**deleteIssuer**](docs/A1099/V2/Issuers1099Api.md#deleteissuer) | **DELETE** /1099/issuers/{id} | Delete an issuer
*Issuers1099Api* | [**getIssuer**](docs/A1099/V2/Issuers1099Api.md#getissuer) | **GET** /1099/issuers/{id} | Retrieve an issuer
*Issuers1099Api* | [**getIssuers**](docs/A1099/V2/Issuers1099Api.md#getissuers) | **GET** /1099/issuers | List issuers
*Issuers1099Api* | [**updateIssuer**](docs/A1099/V2/Issuers1099Api.md#updateissuer) | **PUT** /1099/issuers/{id} | Update an issuer
*JobsApi* | [**getJob**](docs/A1099/V2/JobsApi.md#getjob) | **GET** /jobs/{id} | Retrieves information about the job

<a name="documentation-for-models"></a>
## Documentation for Models

<a name="documentation-for-EInvoicing-V1-models"></a>
### EInvoicing V1 Model Documentation

 - [AvalaraSDK\ModelEInvoicingV1\Address](docs/EInvoicing/V1/Address.md)
 - [AvalaraSDK\ModelEInvoicingV1\BadDownloadRequest](docs/EInvoicing/V1/BadDownloadRequest.md)
 - [AvalaraSDK\ModelEInvoicingV1\BadRequest](docs/EInvoicing/V1/BadRequest.md)
 - [AvalaraSDK\ModelEInvoicingV1\BatchErrorDetail](docs/EInvoicing/V1/BatchErrorDetail.md)
 - [AvalaraSDK\ModelEInvoicingV1\BatchSearch](docs/EInvoicing/V1/BatchSearch.md)
 - [AvalaraSDK\ModelEInvoicingV1\BatchSearchListResponse](docs/EInvoicing/V1/BatchSearchListResponse.md)
 - [AvalaraSDK\ModelEInvoicingV1\BatchSearchParticipants202Response](docs/EInvoicing/V1/BatchSearchParticipants202Response.md)
 - [AvalaraSDK\ModelEInvoicingV1\ConditionalForField](docs/EInvoicing/V1/ConditionalForField.md)
 - [AvalaraSDK\ModelEInvoicingV1\Consents](docs/EInvoicing/V1/Consents.md)
 - [AvalaraSDK\ModelEInvoicingV1\CreateTradingPartner201Response](docs/EInvoicing/V1/CreateTradingPartner201Response.md)
 - [AvalaraSDK\ModelEInvoicingV1\CreateTradingPartnersBatch200Response](docs/EInvoicing/V1/CreateTradingPartnersBatch200Response.md)
 - [AvalaraSDK\ModelEInvoicingV1\CreateTradingPartnersBatch200ResponseValueInner](docs/EInvoicing/V1/CreateTradingPartnersBatch200ResponseValueInner.md)
 - [AvalaraSDK\ModelEInvoicingV1\CreateTradingPartnersBatchRequest](docs/EInvoicing/V1/CreateTradingPartnersBatchRequest.md)
 - [AvalaraSDK\ModelEInvoicingV1\DataInputField](docs/EInvoicing/V1/DataInputField.md)
 - [AvalaraSDK\ModelEInvoicingV1\DataInputFieldNotUsedFor](docs/EInvoicing/V1/DataInputFieldNotUsedFor.md)
 - [AvalaraSDK\ModelEInvoicingV1\DataInputFieldOptionalFor](docs/EInvoicing/V1/DataInputFieldOptionalFor.md)
 - [AvalaraSDK\ModelEInvoicingV1\DataInputFieldRequiredFor](docs/EInvoicing/V1/DataInputFieldRequiredFor.md)
 - [AvalaraSDK\ModelEInvoicingV1\DataInputFieldsResponse](docs/EInvoicing/V1/DataInputFieldsResponse.md)
 - [AvalaraSDK\ModelEInvoicingV1\DocumentFetch](docs/EInvoicing/V1/DocumentFetch.md)
 - [AvalaraSDK\ModelEInvoicingV1\DocumentListResponse](docs/EInvoicing/V1/DocumentListResponse.md)
 - [AvalaraSDK\ModelEInvoicingV1\DocumentStatusResponse](docs/EInvoicing/V1/DocumentStatusResponse.md)
 - [AvalaraSDK\ModelEInvoicingV1\DocumentSubmissionError](docs/EInvoicing/V1/DocumentSubmissionError.md)
 - [AvalaraSDK\ModelEInvoicingV1\DocumentSubmitResponse](docs/EInvoicing/V1/DocumentSubmitResponse.md)
 - [AvalaraSDK\ModelEInvoicingV1\DocumentSummary](docs/EInvoicing/V1/DocumentSummary.md)
 - [AvalaraSDK\ModelEInvoicingV1\ErrorResponse](docs/EInvoicing/V1/ErrorResponse.md)
 - [AvalaraSDK\ModelEInvoicingV1\EventId](docs/EInvoicing/V1/EventId.md)
 - [AvalaraSDK\ModelEInvoicingV1\EventMessage](docs/EInvoicing/V1/EventMessage.md)
 - [AvalaraSDK\ModelEInvoicingV1\EventPayload](docs/EInvoicing/V1/EventPayload.md)
 - [AvalaraSDK\ModelEInvoicingV1\EventSubscription](docs/EInvoicing/V1/EventSubscription.md)
 - [AvalaraSDK\ModelEInvoicingV1\Extension](docs/EInvoicing/V1/Extension.md)
 - [AvalaraSDK\ModelEInvoicingV1\FetchDocumentsRequest](docs/EInvoicing/V1/FetchDocumentsRequest.md)
 - [AvalaraSDK\ModelEInvoicingV1\FetchDocumentsRequestDataInner](docs/EInvoicing/V1/FetchDocumentsRequestDataInner.md)
 - [AvalaraSDK\ModelEInvoicingV1\FetchDocumentsRequestMetadata](docs/EInvoicing/V1/FetchDocumentsRequestMetadata.md)
 - [AvalaraSDK\ModelEInvoicingV1\ForbiddenError](docs/EInvoicing/V1/ForbiddenError.md)
 - [AvalaraSDK\ModelEInvoicingV1\HmacSignature](docs/EInvoicing/V1/HmacSignature.md)
 - [AvalaraSDK\ModelEInvoicingV1\HmacSignatureValue](docs/EInvoicing/V1/HmacSignatureValue.md)
 - [AvalaraSDK\ModelEInvoicingV1\Id](docs/EInvoicing/V1/Id.md)
 - [AvalaraSDK\ModelEInvoicingV1\Identifier](docs/EInvoicing/V1/Identifier.md)
 - [AvalaraSDK\ModelEInvoicingV1\InputDataFormats](docs/EInvoicing/V1/InputDataFormats.md)
 - [AvalaraSDK\ModelEInvoicingV1\InternalServerError](docs/EInvoicing/V1/InternalServerError.md)
 - [AvalaraSDK\ModelEInvoicingV1\Mandate](docs/EInvoicing/V1/Mandate.md)
 - [AvalaraSDK\ModelEInvoicingV1\MandateDataInputField](docs/EInvoicing/V1/MandateDataInputField.md)
 - [AvalaraSDK\ModelEInvoicingV1\MandateDataInputFieldNamespace](docs/EInvoicing/V1/MandateDataInputFieldNamespace.md)
 - [AvalaraSDK\ModelEInvoicingV1\MandatesResponse](docs/EInvoicing/V1/MandatesResponse.md)
 - [AvalaraSDK\ModelEInvoicingV1\NotFoundError](docs/EInvoicing/V1/NotFoundError.md)
 - [AvalaraSDK\ModelEInvoicingV1\NotUsedForField](docs/EInvoicing/V1/NotUsedForField.md)
 - [AvalaraSDK\ModelEInvoicingV1\OutputDataFormats](docs/EInvoicing/V1/OutputDataFormats.md)
 - [AvalaraSDK\ModelEInvoicingV1\Pagination](docs/EInvoicing/V1/Pagination.md)
 - [AvalaraSDK\ModelEInvoicingV1\RequiredWhenField](docs/EInvoicing/V1/RequiredWhenField.md)
 - [AvalaraSDK\ModelEInvoicingV1\SearchParticipants200Response](docs/EInvoicing/V1/SearchParticipants200Response.md)
 - [AvalaraSDK\ModelEInvoicingV1\Signature](docs/EInvoicing/V1/Signature.md)
 - [AvalaraSDK\ModelEInvoicingV1\SignatureSignature](docs/EInvoicing/V1/SignatureSignature.md)
 - [AvalaraSDK\ModelEInvoicingV1\SignatureValue](docs/EInvoicing/V1/SignatureValue.md)
 - [AvalaraSDK\ModelEInvoicingV1\SignatureValueSignature](docs/EInvoicing/V1/SignatureValueSignature.md)
 - [AvalaraSDK\ModelEInvoicingV1\StatusEvent](docs/EInvoicing/V1/StatusEvent.md)
 - [AvalaraSDK\ModelEInvoicingV1\SubmitDocumentMetadata](docs/EInvoicing/V1/SubmitDocumentMetadata.md)
 - [AvalaraSDK\ModelEInvoicingV1\SubmitInteropDocument202Response](docs/EInvoicing/V1/SubmitInteropDocument202Response.md)
 - [AvalaraSDK\ModelEInvoicingV1\SubscriptionCommon](docs/EInvoicing/V1/SubscriptionCommon.md)
 - [AvalaraSDK\ModelEInvoicingV1\SubscriptionDetail](docs/EInvoicing/V1/SubscriptionDetail.md)
 - [AvalaraSDK\ModelEInvoicingV1\SubscriptionListResponse](docs/EInvoicing/V1/SubscriptionListResponse.md)
 - [AvalaraSDK\ModelEInvoicingV1\SubscriptionRegistration](docs/EInvoicing/V1/SubscriptionRegistration.md)
 - [AvalaraSDK\ModelEInvoicingV1\SuccessResponse](docs/EInvoicing/V1/SuccessResponse.md)
 - [AvalaraSDK\ModelEInvoicingV1\SupportedDocumentTypes](docs/EInvoicing/V1/SupportedDocumentTypes.md)
 - [AvalaraSDK\ModelEInvoicingV1\TaxIdentifierRequest](docs/EInvoicing/V1/TaxIdentifierRequest.md)
 - [AvalaraSDK\ModelEInvoicingV1\TaxIdentifierResponse](docs/EInvoicing/V1/TaxIdentifierResponse.md)
 - [AvalaraSDK\ModelEInvoicingV1\TaxIdentifierResponseValue](docs/EInvoicing/V1/TaxIdentifierResponseValue.md)
 - [AvalaraSDK\ModelEInvoicingV1\TaxIdentifierSchemaByCountry200Response](docs/EInvoicing/V1/TaxIdentifierSchemaByCountry200Response.md)
 - [AvalaraSDK\ModelEInvoicingV1\TradingPartner](docs/EInvoicing/V1/TradingPartner.md)
 - [AvalaraSDK\ModelEInvoicingV1\UpdateTradingPartner200Response](docs/EInvoicing/V1/UpdateTradingPartner200Response.md)
 - [AvalaraSDK\ModelEInvoicingV1\ValidationError](docs/EInvoicing/V1/ValidationError.md)
 - [AvalaraSDK\ModelEInvoicingV1\WebhookInvocation](docs/EInvoicing/V1/WebhookInvocation.md)
 - [AvalaraSDK\ModelEInvoicingV1\WebhooksErrorInfo](docs/EInvoicing/V1/WebhooksErrorInfo.md)
 - [AvalaraSDK\ModelEInvoicingV1\WebhooksErrorResponse](docs/EInvoicing/V1/WebhooksErrorResponse.md)
 - [AvalaraSDK\ModelEInvoicingV1\WorkflowIds](docs/EInvoicing/V1/WorkflowIds.md)


<a name="documentation-for-A1099-V2-models"></a>
### A1099 V2 Model Documentation

 - [AvalaraSDK\ModelA1099V2\AuthorizedApiRequestModel](docs/A1099/V2/AuthorizedApiRequestModel.md)
 - [AvalaraSDK\ModelA1099V2\AuthorizedApiRequestV2DataModel](docs/A1099/V2/AuthorizedApiRequestV2DataModel.md)
 - [AvalaraSDK\ModelA1099V2\CompanyCreateUpdateRequestModel](docs/A1099/V2/CompanyCreateUpdateRequestModel.md)
 - [AvalaraSDK\ModelA1099V2\CompanyResponse](docs/A1099/V2/CompanyResponse.md)
 - [AvalaraSDK\ModelA1099V2\CoveredIndividual](docs/A1099/V2/CoveredIndividual.md)
 - [AvalaraSDK\ModelA1099V2\CreateAndSendW9FormEmailRequest](docs/A1099/V2/CreateAndSendW9FormEmailRequest.md)
 - [AvalaraSDK\ModelA1099V2\CreateCompanyRequest](docs/A1099/V2/CreateCompanyRequest.md)
 - [AvalaraSDK\ModelA1099V2\CreateIssuerRequest](docs/A1099/V2/CreateIssuerRequest.md)
 - [AvalaraSDK\ModelA1099V2\CreateW9Form201Response](docs/A1099/V2/CreateW9Form201Response.md)
 - [AvalaraSDK\ModelA1099V2\CreateW9FormRequest](docs/A1099/V2/CreateW9FormRequest.md)
 - [AvalaraSDK\ModelA1099V2\EntryStatusResponse](docs/A1099/V2/EntryStatusResponse.md)
 - [AvalaraSDK\ModelA1099V2\ErrorModel](docs/A1099/V2/ErrorModel.md)
 - [AvalaraSDK\ModelA1099V2\ErrorResponse](docs/A1099/V2/ErrorResponse.md)
 - [AvalaraSDK\ModelA1099V2\ErrorResponseItem](docs/A1099/V2/ErrorResponseItem.md)
 - [AvalaraSDK\ModelA1099V2\Form1042S](docs/A1099/V2/Form1042S.md)
 - [AvalaraSDK\ModelA1099V2\Form1095B](docs/A1099/V2/Form1095B.md)
 - [AvalaraSDK\ModelA1099V2\Form1095C](docs/A1099/V2/Form1095C.md)
 - [AvalaraSDK\ModelA1099V2\Form1099Base](docs/A1099/V2/Form1099Base.md)
 - [AvalaraSDK\ModelA1099V2\Form1099Div](docs/A1099/V2/Form1099Div.md)
 - [AvalaraSDK\ModelA1099V2\Form1099Int](docs/A1099/V2/Form1099Int.md)
 - [AvalaraSDK\ModelA1099V2\Form1099K](docs/A1099/V2/Form1099K.md)
 - [AvalaraSDK\ModelA1099V2\Form1099ListRequest](docs/A1099/V2/Form1099ListRequest.md)
 - [AvalaraSDK\ModelA1099V2\Form1099Misc](docs/A1099/V2/Form1099Misc.md)
 - [AvalaraSDK\ModelA1099V2\Form1099Nec](docs/A1099/V2/Form1099Nec.md)
 - [AvalaraSDK\ModelA1099V2\Form1099R](docs/A1099/V2/Form1099R.md)
 - [AvalaraSDK\ModelA1099V2\Form1099StatusDetail](docs/A1099/V2/Form1099StatusDetail.md)
 - [AvalaraSDK\ModelA1099V2\Get1099Form200Response](docs/A1099/V2/Get1099Form200Response.md)
 - [AvalaraSDK\ModelA1099V2\IW9FormDataModelsOneOf](docs/A1099/V2/IW9FormDataModelsOneOf.md)
 - [AvalaraSDK\ModelA1099V2\IntermediaryOrFlowThrough](docs/A1099/V2/IntermediaryOrFlowThrough.md)
 - [AvalaraSDK\ModelA1099V2\IrsResponse](docs/A1099/V2/IrsResponse.md)
 - [AvalaraSDK\ModelA1099V2\IssuerCommand](docs/A1099/V2/IssuerCommand.md)
 - [AvalaraSDK\ModelA1099V2\IssuerResponse](docs/A1099/V2/IssuerResponse.md)
 - [AvalaraSDK\ModelA1099V2\JobResponse](docs/A1099/V2/JobResponse.md)
 - [AvalaraSDK\ModelA1099V2\OfferAndCoverage](docs/A1099/V2/OfferAndCoverage.md)
 - [AvalaraSDK\ModelA1099V2\PaginatedQueryResultModelCompanyResponse](docs/A1099/V2/PaginatedQueryResultModelCompanyResponse.md)
 - [AvalaraSDK\ModelA1099V2\PaginatedQueryResultModelForm1099Base](docs/A1099/V2/PaginatedQueryResultModelForm1099Base.md)
 - [AvalaraSDK\ModelA1099V2\PaginatedQueryResultModelIssuerResponse](docs/A1099/V2/PaginatedQueryResultModelIssuerResponse.md)
 - [AvalaraSDK\ModelA1099V2\PaginatedQueryResultModelW9FormBaseResponse](docs/A1099/V2/PaginatedQueryResultModelW9FormBaseResponse.md)
 - [AvalaraSDK\ModelA1099V2\PrimaryWithholdingAgent](docs/A1099/V2/PrimaryWithholdingAgent.md)
 - [AvalaraSDK\ModelA1099V2\StateAndLocalWithholding](docs/A1099/V2/StateAndLocalWithholding.md)
 - [AvalaraSDK\ModelA1099V2\StateEfileStatusDetail](docs/A1099/V2/StateEfileStatusDetail.md)
 - [AvalaraSDK\ModelA1099V2\SubstantialUsOwnerRequest](docs/A1099/V2/SubstantialUsOwnerRequest.md)
 - [AvalaraSDK\ModelA1099V2\SubstantialUsOwnerResponse](docs/A1099/V2/SubstantialUsOwnerResponse.md)
 - [AvalaraSDK\ModelA1099V2\TinMatchStatusResponse](docs/A1099/V2/TinMatchStatusResponse.md)
 - [AvalaraSDK\ModelA1099V2\ValidationError](docs/A1099/V2/ValidationError.md)
 - [AvalaraSDK\ModelA1099V2\W4FormDataModel](docs/A1099/V2/W4FormDataModel.md)
 - [AvalaraSDK\ModelA1099V2\W4FormMinimalRequest](docs/A1099/V2/W4FormMinimalRequest.md)
 - [AvalaraSDK\ModelA1099V2\W4FormRequest](docs/A1099/V2/W4FormRequest.md)
 - [AvalaraSDK\ModelA1099V2\W4FormResponse](docs/A1099/V2/W4FormResponse.md)
 - [AvalaraSDK\ModelA1099V2\W8BenEFormMinimalRequest](docs/A1099/V2/W8BenEFormMinimalRequest.md)
 - [AvalaraSDK\ModelA1099V2\W8BenEFormRequest](docs/A1099/V2/W8BenEFormRequest.md)
 - [AvalaraSDK\ModelA1099V2\W8BenEFormResponse](docs/A1099/V2/W8BenEFormResponse.md)
 - [AvalaraSDK\ModelA1099V2\W8BenESubstantialUsOwnerDataModel](docs/A1099/V2/W8BenESubstantialUsOwnerDataModel.md)
 - [AvalaraSDK\ModelA1099V2\W8BenFormDataModel](docs/A1099/V2/W8BenFormDataModel.md)
 - [AvalaraSDK\ModelA1099V2\W8BenFormMinimalRequest](docs/A1099/V2/W8BenFormMinimalRequest.md)
 - [AvalaraSDK\ModelA1099V2\W8BenFormRequest](docs/A1099/V2/W8BenFormRequest.md)
 - [AvalaraSDK\ModelA1099V2\W8BenFormResponse](docs/A1099/V2/W8BenFormResponse.md)
 - [AvalaraSDK\ModelA1099V2\W8BeneFormDataModel](docs/A1099/V2/W8BeneFormDataModel.md)
 - [AvalaraSDK\ModelA1099V2\W8ImyFormDataModel](docs/A1099/V2/W8ImyFormDataModel.md)
 - [AvalaraSDK\ModelA1099V2\W8ImyFormMinimalRequest](docs/A1099/V2/W8ImyFormMinimalRequest.md)
 - [AvalaraSDK\ModelA1099V2\W8ImyFormRequest](docs/A1099/V2/W8ImyFormRequest.md)
 - [AvalaraSDK\ModelA1099V2\W8ImyFormResponse](docs/A1099/V2/W8ImyFormResponse.md)
 - [AvalaraSDK\ModelA1099V2\W9FormBaseMinimalRequest](docs/A1099/V2/W9FormBaseMinimalRequest.md)
 - [AvalaraSDK\ModelA1099V2\W9FormBaseRequest](docs/A1099/V2/W9FormBaseRequest.md)
 - [AvalaraSDK\ModelA1099V2\W9FormBaseResponse](docs/A1099/V2/W9FormBaseResponse.md)
 - [AvalaraSDK\ModelA1099V2\W9FormDataModel](docs/A1099/V2/W9FormDataModel.md)
 - [AvalaraSDK\ModelA1099V2\W9FormMinimalRequest](docs/A1099/V2/W9FormMinimalRequest.md)
 - [AvalaraSDK\ModelA1099V2\W9FormRequest](docs/A1099/V2/W9FormRequest.md)
 - [AvalaraSDK\ModelA1099V2\W9FormResponse](docs/A1099/V2/W9FormResponse.md)
