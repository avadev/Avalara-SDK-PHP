# AvalaraSDK\Forms1099Api

All URIs are relative to https://api-ava1099.eta.sbx.us-east-1.aws.avalara.io/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**bulkUpsert1099Forms()**](Forms1099Api.md#bulkUpsert1099Forms) | **POST** /1099/forms/$bulk-upsert | Create or update multiple 1099/1095/W2/1042S forms
[**create1099Form()**](Forms1099Api.md#create1099Form) | **POST** /1099/forms | Create a 1099/1095/W2/1042S form
[**delete1099Form()**](Forms1099Api.md#delete1099Form) | **DELETE** /1099/forms/{id} | Delete a 1099/1095/W2/1042S form
[**get1099Form()**](Forms1099Api.md#get1099Form) | **GET** /1099/forms/{id} | Retrieve a 1099/1095/W2/1042S form
[**get1099FormPdf()**](Forms1099Api.md#get1099FormPdf) | **GET** /1099/forms/{id}/pdf | Retrieve the PDF file for a 1099/1095/W2/1042S form
[**list1099Forms()**](Forms1099Api.md#list1099Forms) | **GET** /1099/forms | List 1099/1095/W2/1042S forms
[**update1099Form()**](Forms1099Api.md#update1099Form) | **PUT** /1099/forms/{id} | Update a 1099/1095/W2/1042S form


## `bulkUpsert1099Forms()`

```php
bulkUpsert1099Forms($avalara_version, $dry_run, $x_correlation_id, $x_avalara_client, $bulk_upsert1099_forms_request): \AvalaraSDK\ModelA1099V2\Form1099ProccessResult
```

Create or update multiple 1099/1095/W2/1042S forms

This endpoint allows you to create or update multiple 1099/1095/W2/1042S forms.  You can use one of the following payload structures:                **Form 1099-MISC:**  ```json  {     \"formType\": \"1099-MISC\",     \"forms\": [         {             \"IssuerId\": \"123456\",             \"IssuerReferenceId\": \"REF123\",             \"IssuerTin\": \"12-3456789\",             \"TaxYear\": 2023,             \"ReferenceId\": \"FORM123456\",             \"RecipientName\": \"John Doe\",             \"RecipientTin\": \"587-65-4321\",             \"TinType\": \"SSN\",             \"RecipientSecondName\": \"Jane Doe\",             \"Address\": \"123 Main Street\",             \"Address2\": \"Apt 4B\",             \"City\": \"New York\",             \"State\": \"NY\",             \"Zip\": \"10001\",             \"Email\": \"john.doe@email.com\",             \"AccountNumber\": \"ACC123456\",             \"OfficeCode\": \"NYC01\",             \"SecondTinNotice\": false,             \"NonUsProvince\": \"\",             \"CountryCode\": \"US\",             \"Rents\": 12000.00,             \"Royalties\": 5000.00,             \"OtherIncome\": 3000.00,             \"FishingBoatProceeds\": 0.00,             \"MedicalAndHealthCarePayments\": 15000.00,             \"SubstitutePayments\": 1000.00,             \"CropInsuranceProceeds\": 0.00,             \"GrossProceedsPaidToAttorney\": 7500.00,             \"FishPurchasedForResale\": 0.00,             \"FedIncomeTaxWithheld\": 5000.00,             \"Section409ADeferrals\": 0.00,             \"ExcessGoldenParachutePayments\": 0.00,             \"NonqualifiedDeferredCompensation\": 0.00,             \"DirectSalesIndicator\": false,             \"FatcaFilingRequirement\": false,             \"StateAndLocalWithholding\": {               \"StateTaxWithheld\": 2500.00,               \"LocalTaxWithheld\": 1000.00,               \"State\": \"NY\",               \"StateIdNumber\": \"NY123456\",               \"Locality\": \"New York City\",               \"StateIncome\": 35000.00,               \"LocalIncome\": 35000.00             }         }     ]  }  ```                **Form 1099-NEC:**  ```json  {    \"formType\": \"1099-NEC\",    \"forms\": [      {        \"issuerID\": \"180337282\",        \"issuerReferenceId\": \"ISS123\",        \"issuerTin\": \"12-3000000\",        \"taxYear\": 2024,        \"referenceID\": \"REF-002\",        \"recipientName\": \"Jane Smith\",        \"recipientSecondName\": \"\",        \"recipientTin\": \"587-65-4321\",        \"tinType\": \"SSN\",        \"address\": \"123 Center St\",        \"address2\": \"\",        \"city\": \"Santa Monica\",        \"state\": \"CA\",        \"zip\": \"90401\",        \"countryCode\": \"US\",        \"nonUsProvince\": \"\",        \"email\": \"\",        \"accountNumber\": \"\",        \"officeCode\": \"\",        \"secondTinNotice\": false,        \"nonemployeeCompensation\": 123.45,        \"directSalesIndicator\": false,        \"federalIncomeTaxWithheld\": 12.34,        \"stateAndLocalWithholding\": {          \"state\": \"CA\",          \"stateIdNumber\": \"123123123\",          \"stateIncome\": 123.45,          \"stateTaxWithheld\": 12.34,          \"locality\": \"Santa Monica\",          \"localityIdNumber\": \"456456\",          \"localTaxWithheld\": 12.34,          \"localIncome\": 50000.00         },        \"federalEFile\": true,        \"postalMail\": true,        \"stateEFile\": true,        \"tinMatch\": true,        \"addressVerification\": true       }     ]   }  ```  For the full version of the payload and its schema details, refer to the Swagger schemas section.

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

$apiInstance = new AvalaraSDK\Api\Forms1099Api($client);

$avalara_version = 2.0.0; // string | API version
$dry_run = false; // bool | 
$x_correlation_id = fc005c04-52f7-44d6-bf16-6551603a8324; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$bulk_upsert1099_forms_request = new \AvalaraSDK\ModelA1099V2\BulkUpsert1099FormsRequest(); // \AvalaraSDK\ModelA1099V2\BulkUpsert1099FormsRequest | 

try {
    $result = $apiInstance->bulkUpsert1099Forms($avalara_version, $dry_run, $x_correlation_id, $x_avalara_client, $bulk_upsert1099_forms_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->bulkUpsert1099Forms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **dry_run** | **bool**|  | [optional] [default to false]
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
 **bulk_upsert1099_forms_request** | [**\AvalaraSDK\ModelA1099V2\BulkUpsert1099FormsRequest**](../Model/BulkUpsert1099FormsRequest.md)|  | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\Form1099ProccessResult**](../Model/Form1099ProccessResult.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `create1099Form()`

```php
create1099Form($avalara_version, $x_correlation_id, $x_avalara_client, $i_create_form1099_request): \AvalaraSDK\ModelA1099V2\Create1099Form201Response
```

Create a 1099/1095/W2/1042S form

Create a 1099/1095/W2/1042S form.

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

$apiInstance = new AvalaraSDK\Api\Forms1099Api($client);

$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 13eb4eb0-0e7d-41e3-adf3-61b131c1a92c; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$i_create_form1099_request = new \AvalaraSDK\ModelA1099V2\ICreateForm1099Request(); // \AvalaraSDK\ModelA1099V2\ICreateForm1099Request

try {
    $result = $apiInstance->create1099Form($avalara_version, $x_correlation_id, $x_avalara_client, $i_create_form1099_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->create1099Form: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
 **i_create_form1099_request** | [**\AvalaraSDK\ModelA1099V2\ICreateForm1099Request**](../Model/ICreateForm1099Request.md)|  | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\Create1099Form201Response**](../Model/Create1099Form201Response.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `delete1099Form()`

```php
delete1099Form($id, $avalara_version, $x_correlation_id, $x_avalara_client)
```

Delete a 1099/1095/W2/1042S form

Delete a 1099/1095/W2/1042S form.

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

$apiInstance = new AvalaraSDK\Api\Forms1099Api($client);

$id = 'id_example'; // string | The unique identifier of the desired form to delete.
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 2bcc9cf0-9638-46d5-a792-be61566e0651; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $apiInstance->delete1099Form($id, $avalara_version, $x_correlation_id, $x_avalara_client);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->delete1099Form: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The unique identifier of the desired form to delete. |
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

## `get1099Form()`

```php
get1099Form($id, $avalara_version, $x_correlation_id, $x_avalara_client): \AvalaraSDK\ModelA1099V2\Get1099Form200Response
```

Retrieve a 1099/1095/W2/1042S form

Retrieve a 1099/1095/W2/1042S form.

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

$apiInstance = new AvalaraSDK\Api\Forms1099Api($client);

$id = 'id_example'; // string
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 6e842a03-8b64-4b02-8c5e-7073bf4e8a8c; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->get1099Form($id, $avalara_version, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->get1099Form: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\Get1099Form200Response**](../Model/Get1099Form200Response.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `get1099FormPdf()`

```php
get1099FormPdf($id, $avalara_version, $mark_edelivered, $x_correlation_id, $x_avalara_client): \SplFileObject
```

Retrieve the PDF file for a 1099/1095/W2/1042S form

Retrieve the PDF file for a 1099/1095/W2/1042S form.

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

$apiInstance = new AvalaraSDK\Api\Forms1099Api($client);

$id = 'id_example'; // string | The ID of the form
$avalara_version = 2.0.0; // string | API version
$mark_edelivered = True; // bool | Optional boolean that if set indicates that the form should be marked as having been successfully edelivered
$x_correlation_id = 7b4aa70b-3a10-4fa0-bf19-7592170409b7; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->get1099FormPdf($id, $avalara_version, $mark_edelivered, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->get1099FormPdf: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The ID of the form |
 **avalara_version** | **string**| API version |
 **mark_edelivered** | **bool**| Optional boolean that if set indicates that the form should be marked as having been successfully edelivered | [optional]
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

### Return type

**\SplFileObject**

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/pdf`, `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `list1099Forms()`

```php
list1099Forms($avalara_version, $filter, $top, $skip, $order_by, $x_correlation_id, $x_avalara_client): \AvalaraSDK\ModelA1099V2\Form1099ListResponse
```

List 1099/1095/W2/1042S forms

List 1099/1095/W2/1042S forms. Filterable fields are name, referenceId and taxYear.

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

$apiInstance = new AvalaraSDK\Api\Forms1099Api($client);

$avalara_version = 2.0.0; // string | API version
$filter = issuerId eq 884781823; // string | A filter statement to identify specific records to retrieve. For more information on filtering, see <a href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</a>.    Collections support filtering only on certain fields. An attempt to filter on an unsupported field will receive a 400 Bad Request response.    Supported filtering fields are as follows:        issuerId      issuerReferenceId      taxYear      addressVerificationStatus - possible values are: unknown, pending, failed, incomplete, unchanged, verified      createdAt      edeliveryStatus - possible values are: sent, unscheduled, bad_verify, bad_verify_limit, scheduled, bounced, accepted      email      federalEfileStatus - possible values are: unscheduled, scheduled, sent, corrected_scheduled, accepted, corrected, corrected_accepted, held      recipientName      mailStatus - possible values are: sent, unscheduled, pending, delivered      referenceId      tinMatchStatus - possible values are: none, pending, matched, failed      type - possible values are: 940, 941, 943, 944, 945, 1042, 1042-S, 1095-B, 1095-C, 1097-BTC, 1098, 1098-C, 1098-E, 1098-Q, 1098-T, 3921, 3922, 5498, 5498-ESA, 5498-SA, 1099-MISC, 1099-A, 1099-B, 1099-C, 1099-CAP, 1099-DIV, 1099-G, 1099-INT, 1099-K, 1099-LS, 1099-LTC, 1099-NEC, 1099-OID, 1099-PATR, 1099-Q, 1099-R, 1099-S, 1099-SA, T4A, W-2, W-2G, 1099-HC      updatedAt      validity - possible values are: true, false
$top = 10; // int | If nonzero, return no more than this number of results.     Used with skip to provide pagination for large datasets.     Unless otherwise specified, the maximum number of records that can be returned from an API call is 1,000 records.
$skip = 0; // int | If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets.
$order_by = 'order_by_example'; // string | A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example issuerReferenceId ASC.    Supported sorting fields are:         issuerReferenceId       taxYear       createdAt       recipientName      updatedAt
$x_correlation_id = 7766bce5-4834-4907-81e9-dd0fd6c13079; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->list1099Forms($avalara_version, $filter, $top, $skip, $order_by, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->list1099Forms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **filter** | **string**| A filter statement to identify specific records to retrieve. For more information on filtering, see &lt;a href&#x3D;\&quot;https://developer.avalara.com/avatax/filtering-in-rest/\&quot;&gt;Filtering in REST&lt;/a&gt;.    Collections support filtering only on certain fields. An attempt to filter on an unsupported field will receive a 400 Bad Request response.    Supported filtering fields are as follows:        issuerId      issuerReferenceId      taxYear      addressVerificationStatus - possible values are: unknown, pending, failed, incomplete, unchanged, verified      createdAt      edeliveryStatus - possible values are: sent, unscheduled, bad_verify, bad_verify_limit, scheduled, bounced, accepted      email      federalEfileStatus - possible values are: unscheduled, scheduled, sent, corrected_scheduled, accepted, corrected, corrected_accepted, held      recipientName      mailStatus - possible values are: sent, unscheduled, pending, delivered      referenceId      tinMatchStatus - possible values are: none, pending, matched, failed      type - possible values are: 940, 941, 943, 944, 945, 1042, 1042-S, 1095-B, 1095-C, 1097-BTC, 1098, 1098-C, 1098-E, 1098-Q, 1098-T, 3921, 3922, 5498, 5498-ESA, 5498-SA, 1099-MISC, 1099-A, 1099-B, 1099-C, 1099-CAP, 1099-DIV, 1099-G, 1099-INT, 1099-K, 1099-LS, 1099-LTC, 1099-NEC, 1099-OID, 1099-PATR, 1099-Q, 1099-R, 1099-S, 1099-SA, T4A, W-2, W-2G, 1099-HC      updatedAt      validity - possible values are: true, false | [optional]
 **top** | **int**| If nonzero, return no more than this number of results.     Used with skip to provide pagination for large datasets.     Unless otherwise specified, the maximum number of records that can be returned from an API call is 1,000 records. | [optional] [default to 10]
 **skip** | **int**| If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets. | [optional] [default to 0]
 **order_by** | **string**| A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example issuerReferenceId ASC.    Supported sorting fields are:         issuerReferenceId       taxYear       createdAt       recipientName      updatedAt | [optional]
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\Form1099ListResponse**](../Model/Form1099ListResponse.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `update1099Form()`

```php
update1099Form($id, $avalara_version, $x_correlation_id, $x_avalara_client, $i_update_form1099_request): \AvalaraSDK\ModelA1099V2\Update1099Form200Response
```

Update a 1099/1095/W2/1042S form

Update a 1099/1095/W2/1042S form.

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

$apiInstance = new AvalaraSDK\Api\Forms1099Api($client);

$id = 'id_example'; // string
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 9f622e4f-7992-4e4f-8e24-e628c5339402; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$i_update_form1099_request = new \AvalaraSDK\ModelA1099V2\IUpdateForm1099Request(); // \AvalaraSDK\ModelA1099V2\IUpdateForm1099Request

try {
    $result = $apiInstance->update1099Form($id, $avalara_version, $x_correlation_id, $x_avalara_client, $i_update_form1099_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->update1099Form: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
 **i_update_form1099_request** | [**\AvalaraSDK\ModelA1099V2\IUpdateForm1099Request**](../Model/IUpdateForm1099Request.md)|  | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\Update1099Form200Response**](../Model/Update1099Form200Response.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
