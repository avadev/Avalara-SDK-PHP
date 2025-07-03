# AvalaraSDK\Forms1099Api

All URIs are relative to https://api-ava1099.eta.sbx.us-east-1.aws.avalara.io/avalara1099.

Method | HTTP request | Description
------------- | ------------- | -------------
[**bulkUpsert1099Forms()**](Forms1099Api.md#bulkUpsert1099Forms) | **POST** /1099/forms/$bulk-upsert | Creates or updates multiple 1099 forms.
[**create1099Form()**](Forms1099Api.md#create1099Form) | **POST** /1099/forms | Creates a 1099 form.
[**delete1099Form()**](Forms1099Api.md#delete1099Form) | **DELETE** /1099/forms/{id} | Deletes a 1099 form.
[**get1099Form()**](Forms1099Api.md#get1099Form) | **GET** /1099/forms/{id} | Retrieves a 1099 form.
[**get1099FormPdf()**](Forms1099Api.md#get1099FormPdf) | **GET** /1099/forms/{id}/pdf | Retrieves the PDF file for a single 1099 by form id.
[**list1099Forms()**](Forms1099Api.md#list1099Forms) | **GET** /1099/forms | Retrieves a list of 1099 forms based on query parameters.
[**update1099Form()**](Forms1099Api.md#update1099Form) | **PUT** /1099/forms/{id} | Updates a 1099 form.


## `bulkUpsert1099Forms()`

```php
bulkUpsert1099Forms($avalara_version, $x_correlation_id, $dry_run, $bulk_upsert1099_forms_request): \AvalaraSDK\ModelA1099V2\Form1099ProccessResult
```

Creates or updates multiple 1099 forms.

This endpoint allows you to create or update multiple 1099 forms.  You can use one of the following payload structures:                **Form 1099-MISC:**  ```json  {     \"formType\": \"1099-MISC\",     \"forms\": [         {             \"IssuerId\": \"123456\",             \"IssuerReferenceId\": \"REF123\",             \"IssuerTin\": \"12-3456789\",             \"TaxYear\": 2023,             \"ReferenceId\": \"FORM123456\",             \"RecipientName\": \"John Doe\",             \"RecipientTin\": \"987-65-4321\",             \"TinType\": \"IEN\",             \"RecipientSecondName\": \"Jane Doe\",             \"StreetAddress\": \"123 Main Street\",             \"StreetAddressLine2\": \"Apt 4B\",             \"City\": \"New York\",             \"State\": \"NY\",             \"Zip\": \"10001\",             \"RecipientEmail\": \"john.doe@email.com\",             \"AccountNumber\": \"ACC123456\",             \"OfficeCode\": \"NYC01\",             \"SecondTinNotice\": false,             \"RecipientNonUsProvince\": \"\",             \"CountryCode\": \"US\",             \"Rents\": 12000.00,             \"Royalties\": 5000.00,             \"OtherIncome\": 3000.00,             \"FishingBoatProceeds\": 0.00,             \"MedicalHealthCarePayments\": 15000.00,             \"SubstitutePayments\": 1000.00,             \"CropInsuranceProceeds\": 0.00,             \"GrossProceedsPaidToAttorney\": 7500.00,             \"FishPurchasedForResale\": 0.00,             \"FedIncomeTaxWithheld\": 5000.00,             \"Section409ADeferrals\": 0.00,             \"ExcessGoldenParachutePayments\": 0.00,             \"NonqualifiedDeferredCompensation\": 0.00,             \"PayerMadeDirectSales\": false,             \"FatcaFilingRequirement\": false,             \"StateAndLocalWithholding\": {               \"StateTaxWithheld\": 2500.00,               \"LocalTaxWithheld\": 1000.00,               \"State\": \"NY\",               \"StateIdNumber\": \"NY123456\",               \"Locality\": \"New York City\",               \"StateIncome\": 35000.00,               \"LocalIncome\": 35000.00             }         }     ]  }  ```                **Form 1099-NEC:**  ```json  {    \"formType\": \"1099-NEC\",    \"forms\": [      {        \"issuerID\": \"180337282\",        \"issuerReferenceId\": \"ISS123\",        \"issuerTin\": \"12-3000000\",        \"taxYear\": 2024,        \"referenceID\": \"REF-002\",        \"recipientName\": \"Jane Smith\",        \"recipientSecondName\": \"\",        \"recipientTin\": \"987-65-4321\",        \"tinType\": \"IEN\",        \"streetAddress\": \"123 Center St\",        \"streetAddressLine2\": \"\",        \"city\": \"Santa Monica\",        \"state\": \"CA\",        \"zip\": \"90401\",        \"countryCode\": \"US\",        \"recipientNonUsProvince\": \"\",        \"recipientEmail\": \"\",        \"accountNumber\": \"\",        \"officeCode\": \"\",        \"secondTinNotice\": false,        \"nonemployeeCompensation\": 123.45,        \"payerMadeDirectSales\": false,        \"federalIncomeTaxWithheld\": 12.34,        \"stateAndLocalWithholding\": {          \"state\": \"CA\",          \"stateIdNumber\": \"123123123\"          \"stateIncome\": 123.45,          \"stateTaxWithheld\": 12.34,          \"locality\": \"Santa Monica\",          \"localityIdNumber\": \"456456\",          \"localTaxWithheld\": 12.34          \"localIncome\": 50000.00         },        \"federalEFile\": true,        \"postalMail\": true,        \"stateEFile\": true,        \"tinMatch\": true,        \"addressVerification\": true       }     ]   }  ```  For the full version of the payload and its schema details, refer to the Swagger schemas section.

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

$avalara_version = 2.0; // string | API version
$x_correlation_id = c44a4769-68e2-4c6a-8a72-6ca740dacea9; // string | Unique correlation Id in a GUID format
$dry_run = false; // bool | 
$bulk_upsert1099_forms_request = new \AvalaraSDK\ModelA1099V2\BulkUpsert1099FormsRequest(); // \AvalaraSDK\ModelA1099V2\BulkUpsert1099FormsRequest | 

try {
    $result = $apiInstance->bulkUpsert1099Forms($avalara_version, $x_correlation_id, $dry_run, $bulk_upsert1099_forms_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->bulkUpsert1099Forms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **dry_run** | **bool**|  | [optional] [default to false]
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
create1099Form($avalara_version, $x_correlation_id, $i_create_form1099_request): \AvalaraSDK\ModelA1099V2\Get1099Form200Response
```

Creates a 1099 form.

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

$avalara_version = 2.0; // string | API version
$x_correlation_id = f140708f-84e1-4913-92a5-61194b6098e5; // string | Unique correlation Id in a GUID format
$i_create_form1099_request = new \AvalaraSDK\ModelA1099V2\ICreateForm1099Request(); // \AvalaraSDK\ModelA1099V2\ICreateForm1099Request

try {
    $result = $apiInstance->create1099Form($avalara_version, $x_correlation_id, $i_create_form1099_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->create1099Form: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **i_create_form1099_request** | [**\AvalaraSDK\ModelA1099V2\ICreateForm1099Request**](../Model/ICreateForm1099Request.md)|  | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\Get1099Form200Response**](../Model/Get1099Form200Response.md)

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
delete1099Form($id, $avalara_version, $x_correlation_id)
```

Deletes a 1099 form.

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
$avalara_version = 2.0; // string | API version
$x_correlation_id = 524fb3a4-0740-4e04-a396-62839ccf2c72; // string | Unique correlation Id in a GUID format

try {
    $apiInstance->delete1099Form($id, $avalara_version, $x_correlation_id);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->delete1099Form: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The unique identifier of the desired form to delete. |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |

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
get1099Form($id, $avalara_version, $x_correlation_id): \AvalaraSDK\ModelA1099V2\Get1099Form200Response
```

Retrieves a 1099 form.

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
$avalara_version = 2.0; // string | API version
$x_correlation_id = 0c755bc3-aa08-4178-ac35-b18132f5e9be; // string | Unique correlation Id in a GUID format

try {
    $result = $apiInstance->get1099Form($id, $avalara_version, $x_correlation_id);
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
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |

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
get1099FormPdf($id, $avalara_version, $x_correlation_id, $mark_edelivered): \AvalaraSDK\ModelA1099V2\FormResponseBase
```

Retrieves the PDF file for a single 1099 by form id.

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

$id = 'id_example'; // string | 
$avalara_version = 2.0; // string | API version
$x_correlation_id = d1137739-9ffd-4f10-b30d-63c9931066e1; // string | Unique correlation Id in a GUID format
$mark_edelivered = True; // bool | The parameter for marked e-delivered

try {
    $result = $apiInstance->get1099FormPdf($id, $avalara_version, $x_correlation_id, $mark_edelivered);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->get1099FormPdf: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **mark_edelivered** | **bool**| The parameter for marked e-delivered | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\FormResponseBase**](../Model/FormResponseBase.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `list1099Forms()`

```php
list1099Forms($avalara_version, $x_correlation_id, $filter, $top, $skip, $order_by): \AvalaraSDK\ModelA1099V2\Form1099List
```

Retrieves a list of 1099 forms based on query parameters.

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

$avalara_version = 2.0; // string | API version
$x_correlation_id = 1a3f5d5f-2c12-41e8-a1a5-8d454ff698a9; // string | Unique correlation Id in a GUID format
$filter = 'filter_example'; // string | A filter statement to identify specific records to retrieve. For more information on filtering, see <a href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</a>.    Collections support filtering only on certain fields. An attempt to filter on an unsupported field will receive a 400 Bad Request response.    Supported filtering fields are as follows:        issuerId      issuerReferenceId      taxYear      addressVerificationStatus - possible values are: unknown, pending, failed, incomplete, unchanged, verified      createdAt      edeliveryStatus - possible values are: sent, unscheduled, bad_verify, bad_verify_limit, scheduled, bounced, accepted      email      federalEfileStatus - possible values are: unscheduled, scheduled, sent, corrected_scheduled, accepted, corrected, corrected_accepted, held      recipientName      mailStatus - possible values are: sent, unscheduled, pending, delivered      referenceId      tinMatchStatus - possible values are: none, pending, matched, failed      type - possible values are: 940, 941, 943, 944, 945, 1042, 1042-S, 1095-B, 1095-C, 1097-BTC, 1098, 1098-C, 1098-E, 1098-Q, 1098-T, 3921, 3922, 5498, 5498-ESA, 5498-SA, 1099-MISC, 1099-A, 1099-B, 1099-C, 1099-CAP, 1099-DIV, 1099-G, 1099-INT, 1099-K, 1099-LS, 1099-LTC, 1099-NEC, 1099-OID, 1099-PATR, 1099-Q, 1099-R, 1099-S, 1099-SA, T4A, W-2, W-2G, 1099-HC      updatedAt      validity - possible values are: true, false
$top = 10; // int | If nonzero, return no more than this number of results.     Used with skip to provide pagination for large datasets.     Unless otherwise specified, the maximum number of records that can be returned from an API call is 1,000 records.
$skip = 0; // int | If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets.
$order_by = 'order_by_example'; // string | A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example issuerReferenceId ASC.    Supported sorting fields are:         issuerReferenceId       taxYear       createdAt       recipientName      updatedAt

try {
    $result = $apiInstance->list1099Forms($avalara_version, $x_correlation_id, $filter, $top, $skip, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->list1099Forms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **filter** | **string**| A filter statement to identify specific records to retrieve. For more information on filtering, see &lt;a href&#x3D;\&quot;https://developer.avalara.com/avatax/filtering-in-rest/\&quot;&gt;Filtering in REST&lt;/a&gt;.    Collections support filtering only on certain fields. An attempt to filter on an unsupported field will receive a 400 Bad Request response.    Supported filtering fields are as follows:        issuerId      issuerReferenceId      taxYear      addressVerificationStatus - possible values are: unknown, pending, failed, incomplete, unchanged, verified      createdAt      edeliveryStatus - possible values are: sent, unscheduled, bad_verify, bad_verify_limit, scheduled, bounced, accepted      email      federalEfileStatus - possible values are: unscheduled, scheduled, sent, corrected_scheduled, accepted, corrected, corrected_accepted, held      recipientName      mailStatus - possible values are: sent, unscheduled, pending, delivered      referenceId      tinMatchStatus - possible values are: none, pending, matched, failed      type - possible values are: 940, 941, 943, 944, 945, 1042, 1042-S, 1095-B, 1095-C, 1097-BTC, 1098, 1098-C, 1098-E, 1098-Q, 1098-T, 3921, 3922, 5498, 5498-ESA, 5498-SA, 1099-MISC, 1099-A, 1099-B, 1099-C, 1099-CAP, 1099-DIV, 1099-G, 1099-INT, 1099-K, 1099-LS, 1099-LTC, 1099-NEC, 1099-OID, 1099-PATR, 1099-Q, 1099-R, 1099-S, 1099-SA, T4A, W-2, W-2G, 1099-HC      updatedAt      validity - possible values are: true, false | [optional]
 **top** | **int**| If nonzero, return no more than this number of results.     Used with skip to provide pagination for large datasets.     Unless otherwise specified, the maximum number of records that can be returned from an API call is 1,000 records. | [optional] [default to 10]
 **skip** | **int**| If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets. | [optional] [default to 0]
 **order_by** | **string**| A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example issuerReferenceId ASC.    Supported sorting fields are:         issuerReferenceId       taxYear       createdAt       recipientName      updatedAt | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\Form1099List**](../Model/Form1099List.md)

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
update1099Form($id, $avalara_version, $x_correlation_id, $i_update_form1099_request): \AvalaraSDK\ModelA1099V2\FormResponseBase
```

Updates a 1099 form.

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
$avalara_version = 2.0; // string | API version
$x_correlation_id = a163f816-6003-4e0a-854a-b6b105f26d9f; // string | Unique correlation Id in a GUID format
$i_update_form1099_request = new \AvalaraSDK\ModelA1099V2\IUpdateForm1099Request(); // \AvalaraSDK\ModelA1099V2\IUpdateForm1099Request

try {
    $result = $apiInstance->update1099Form($id, $avalara_version, $x_correlation_id, $i_update_form1099_request);
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
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format |
 **i_update_form1099_request** | [**\AvalaraSDK\ModelA1099V2\IUpdateForm1099Request**](../Model/IUpdateForm1099Request.md)|  | [optional]

### Return type

[**\AvalaraSDK\ModelA1099V2\FormResponseBase**](../Model/FormResponseBase.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
