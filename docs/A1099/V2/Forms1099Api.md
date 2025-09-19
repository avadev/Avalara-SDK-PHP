# Avalara\SDK\Forms1099Api

All URIs are relative to https://api.sbx.avalara.com/avalara1099.

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
bulkUpsert1099Forms($avalara_version, $dry_run, $x_correlation_id, $x_avalara_client, $form1099_list_request): \Avalara\SDK\Model\A1099\V2\JobResponse
```

Create or update multiple 1099/1095/W2/1042S forms

This endpoint allows you to create or update multiple 1099/1095/W2/1042S forms.  Maximum of 5000 forms can be processed in a single bulk request.    **Date Scheduling Rules:**    If federalEfileDate, stateEfileDate, or recipientEdeliveryDate are between current date and beginning of blackout period, scheduled to that date.  If dates are in the past or blackout period, scheduled to next available date.  For blackout period information, see https://www.track1099.com/info/IRS_info.  StateEfileDate must be on or after federalEfileDate.  Set dates to null to leave unscheduled.

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

$apiInstance = new Avalara\SDK\Api\Forms1099Api($client);

$avalara_version = 2.0.0; // string | API version
$dry_run = false; // bool | defaults to false. If true, it will NOT change the DB. It will just return a report of what would've have been changed in the DB
$x_correlation_id = 5ef65de0-c394-4aa2-b249-d8bfcbe9b23a; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$form1099_list_request = {"type":"1042-S","forms":[{"type":"1042-S","issuerId":"12345","issuerReferenceId":"issuer-001","issuerTin":"94-2765431","taxYear":2024,"referenceId":"1042S-REF-001","tin":"112233445","recipientName":"Michael Jackson","recipientSecondName":"SuperStart","address":"1234 Corporate Blvd","address2":"Suite 500","city":"Anytown","state":"MA","zip":"12345","email":"email@example.com","accountNumber":"ACC01","nonUsProvince":null,"countryCode":"US","federalEfileDate":"2024-03-15","postalMail":true,"stateEfileDate":null,"recipientEdeliveryDate":"2024-03-25","tinMatch":false,"noTin":false,"addressVerification":true,"stateAndLocalWithholding":{"stateTaxWithheld":50,"state":"CA","stateIdNumber":"CA98765432"},"secondTinNotice":true,"uniqueFormId":"1234567890","recipientDateOfBirth":"1990-01-01","recipientGiin":"748291.59302.US.001","recipientForeignTin":"920456.38475.GM.002","lobCode":"06","incomeCode":"16","grossIncome":10000.5,"withholdingIndicator":"3","taxCountryCode":"GM","exemptionCodeChap3":"00","exemptionCodeChap4":"13","taxRateChap3":"30.00","withholdingAllowance":15,"federalTaxWithheld":1500.25,"taxNotDepositedIndicator":true,"academicIndicator":true,"taxWithheldOtherAgents":100,"amountRepaid":200,"taxPaidAgent":50.5,"chap3StatusCode":"06","chap4StatusCode":"02","primaryWithholdingAgent":{"name":"Primary Agent Name","ein":"98-3456789"},"intermediaryOrFlowThrough":{"ein":"98-7654321","chap3StatusCode":"03","chap4StatusCode":"04","name":"Intermediary Name","giin":"748291.59302.US.002","countryCode":"US","foreignTin":"123-45-6789","address":"123 Main St.","city":"Cityville","state":"CA","zip":"98765"}}]}; // \Avalara\SDK\Model\A1099\V2\Form1099ListRequest | 

try {
    $result = $apiInstance->bulkUpsert1099Forms($avalara_version, $dry_run, $x_correlation_id, $x_avalara_client, $form1099_list_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->bulkUpsert1099Forms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **dry_run** | **bool**| defaults to false. If true, it will NOT change the DB. It will just return a report of what would&#39;ve have been changed in the DB | [optional] [default to false]
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]
 **form1099_list_request** | [**\Avalara\SDK\Model\A1099\V2\Form1099ListRequest**](../Model/Form1099ListRequest.md)|  | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\JobResponse**](../Model/JobResponse.md)

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
create1099Form($avalara_version, $x_correlation_id, $x_avalara_client, $get1099_form200_response): \Avalara\SDK\Model\A1099\V2\Get1099Form200Response
```

Create a 1099/1095/W2/1042S form

Create a 1099/1095/W2/1042S form.    **Date Scheduling Rules:**    If federalEfileDate, stateEfileDate, or recipientEdeliveryDate are between current date and beginning of blackout period, scheduled to that date.  If dates are in the past or blackout period, scheduled to next available date.  For blackout period information, see https://www.track1099.com/info/IRS_info.  StateEfileDate must be on or after federalEfileDate.  Set dates to null to leave unscheduled.

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

$apiInstance = new Avalara\SDK\Api\Forms1099Api($client);

$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 5b55b569-4e1e-44d3-920c-65153461c426; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$get1099_form200_response = {"type":"1042-S","issuerId":"12345","referenceId":"1042S-REF-001","tin":"112233445","recipientName":"Michael Jackson","recipientSecondName":"SuperStart","address":"1234 Corporate Blvd","address2":"Suite 500","city":"Anytown","state":"MA","zip":"12345","email":"email@example.com","accountNumber":"ACC01","nonUsProvince":null,"countryCode":"US","federalEfileDate":"2024-03-15","postalMail":true,"stateEfileDate":null,"recipientEdeliveryDate":"2024-03-25","tinMatch":false,"noTin":false,"addressVerification":true,"stateAndLocalWithholding":{"stateTaxWithheld":50,"state":"CA","stateIdNumber":"CA98765432"},"secondTinNotice":true,"uniqueFormId":"1234567890","recipientDateOfBirth":"1990-01-01","recipientGiin":"748291.59302.US.001","recipientForeignTin":"920456.38475.GM.002","lobCode":"06","incomeCode":"16","grossIncome":10000.5,"withholdingIndicator":"3","taxCountryCode":"GM","exemptionCodeChap3":"00","exemptionCodeChap4":"13","taxRateChap3":"30.00","withholdingAllowance":15,"federalTaxWithheld":1500.25,"taxNotDepositedIndicator":true,"academicIndicator":true,"taxWithheldOtherAgents":100,"amountRepaid":200,"taxPaidAgent":50.5,"chap3StatusCode":"06","chap4StatusCode":"02","primaryWithholdingAgent":{"name":"Primary Agent Name","ein":"98-3456789"},"intermediaryOrFlowThrough":{"ein":"98-7654321","chap3StatusCode":"03","chap4StatusCode":"04","name":"Intermediary Name","giin":"748291.59302.US.002","countryCode":"US","foreignTin":"123-45-6789","address":"123 Main St.","city":"Cityville","state":"CA","zip":"98765"}}; // \Avalara\SDK\Model\A1099\V2\Get1099Form200Response

try {
    $result = $apiInstance->create1099Form($avalara_version, $x_correlation_id, $x_avalara_client, $get1099_form200_response);
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
 **get1099_form200_response** | [**\Avalara\SDK\Model\A1099\V2\Get1099Form200Response**](../Model/Get1099Form200Response.md)|  | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\Get1099Form200Response**](../Model/Get1099Form200Response.md)

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

$apiInstance = new Avalara\SDK\Api\Forms1099Api($client);

$id = 'id_example'; // string | The unique identifier of the desired form to delete.
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = e82ee14f-7146-41a5-b856-28f403d65e29; // string | Unique correlation Id in a GUID format
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
get1099Form($id, $avalara_version, $x_correlation_id, $x_avalara_client): \Avalara\SDK\Model\A1099\V2\Get1099Form200Response
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

$apiInstance = new Avalara\SDK\Api\Forms1099Api($client);

$id = 'id_example'; // string
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = f5198e72-fc87-4a4d-a09a-b2aa6cf70c38; // string | Unique correlation Id in a GUID format
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

[**\Avalara\SDK\Model\A1099\V2\Get1099Form200Response**](../Model/Get1099Form200Response.md)

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

$apiInstance = new Avalara\SDK\Api\Forms1099Api($client);

$id = 'id_example'; // string | The ID of the form
$avalara_version = 2.0.0; // string | API version
$mark_edelivered = True; // bool | Optional boolean that if set indicates that the form should be marked as having been successfully edelivered
$x_correlation_id = 7fdfd0b2-cebf-4f25-8a65-6dd03811e77d; // string | Unique correlation Id in a GUID format
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
list1099Forms($avalara_version, $filter, $top, $skip, $order_by, $count, $count_only, $x_correlation_id, $x_avalara_client): \Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelForm1099Base
```

List 1099/1095/W2/1042S forms

List 1099/1095/W2/1042S forms.                Collections support filtering only on certain fields. An attempt to filter on an unsupported field will receive a 400 Bad Request response.                Supported filtering fields are as follows:                - issuerId  - issuerReferenceId  - taxYear  - addressVerificationStatus - possible values are: unknown, pending, failed, incomplete, unchanged, verified  - createdAt  - edeliveryStatus - possible values are: sent, unscheduled, bad_verify, bad_verify_limit, scheduled, bounced, accepted  - email  - federalEfileStatus - possible values are: unscheduled, scheduled, sent, corrected_scheduled, accepted, corrected, corrected_accepted, held  - recipientName  - mailStatus - possible values are: sent, unscheduled, pending, delivered  - referenceId  - tinMatchStatus - possible values are: none, pending, matched, failed  - type - possible values are: 940, 941, 943, 944, 945, 1042, 1042-S, 1095-B, 1095-C, 1097-BTC, 1098, 1098-C, 1098-E, 1098-Q, 1098-T, 3921, 3922, 5498, 5498-ESA, 5498-SA, 1099-MISC, 1099-A, 1099-B, 1099-C, 1099-CAP, 1099-DIV, 1099-G, 1099-INT, 1099-K, 1099-LS, 1099-LTC, 1099-NEC, 1099-OID, 1099-PATR, 1099-Q, 1099-R, 1099-S, 1099-SA, T4A, W-2, W-2G, 1099-HC  - updatedAt  - validity - possible values are: true, false                For more information on filtering, see <see href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</see>.

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

$apiInstance = new Avalara\SDK\Api\Forms1099Api($client);

$avalara_version = 2.0.0; // string | API version
$filter = issuerId eq 884781823; // string | A filter statement to identify specific records to retrieve.  For more information on filtering, see <a href=\"https://developer.avalara.com/avatax/filtering-in-rest/\">Filtering in REST</a>.
$top = 56; // int | If zero or greater than 1000, return at most 1000 results.  Otherwise, return this number of results.  Used with skip to provide pagination for large datasets.
$skip = 56; // int | If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets.
$order_by = 'order_by_example'; // string | A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC.
$count = True; // bool | If true, return the global count of elements in the collection.
$count_only = True; // bool | If true, return ONLY the global count of elements in the collection.  It only applies when count=true.
$x_correlation_id = 97f7596c-99c0-4879-b47c-57df572a32c9; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .

try {
    $result = $apiInstance->list1099Forms($avalara_version, $filter, $top, $skip, $order_by, $count, $count_only, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Forms1099Api->list1099Forms: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| API version |
 **filter** | **string**| A filter statement to identify specific records to retrieve.  For more information on filtering, see &lt;a href&#x3D;\&quot;https://developer.avalara.com/avatax/filtering-in-rest/\&quot;&gt;Filtering in REST&lt;/a&gt;. | [optional]
 **top** | **int**| If zero or greater than 1000, return at most 1000 results.  Otherwise, return this number of results.  Used with skip to provide pagination for large datasets. | [optional]
 **skip** | **int**| If nonzero, skip this number of results before returning data. Used with top to provide pagination for large datasets. | [optional]
 **order_by** | **string**| A comma separated list of sort statements in the format (fieldname) [ASC|DESC], for example id ASC. | [optional]
 **count** | **bool**| If true, return the global count of elements in the collection. | [optional]
 **count_only** | **bool**| If true, return ONLY the global count of elements in the collection.  It only applies when count&#x3D;true. | [optional]
 **x_correlation_id** | **string**| Unique correlation Id in a GUID format | [optional]
 **x_avalara_client** | **string**| Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) . | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\PaginatedQueryResultModelForm1099Base**](../Model/PaginatedQueryResultModelForm1099Base.md)

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
update1099Form($id, $avalara_version, $x_correlation_id, $x_avalara_client, $get1099_form200_response): \Avalara\SDK\Model\A1099\V2\Get1099Form200Response
```

Update a 1099/1095/W2/1042S form

Update a 1099/1095/W2/1042S form.    **Date Update Rules:**    Possible to update scheduled dates (same validation rules apply).  Cannot change from scheduled to unscheduled status - must delete form and create new one.  If dates are between current date and blackout period, scheduled to that date.  If dates are in past or blackout period, scheduled to next available date.  For blackout period information, see https://www.track1099.com/info/IRS_info.  StateEfileDate must be on or after federalEfileDate.

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

$apiInstance = new Avalara\SDK\Api\Forms1099Api($client);

$id = 'id_example'; // string
$avalara_version = 2.0.0; // string | API version
$x_correlation_id = 560aa857-d5ba-484b-9375-a14e9e57d7a8; // string | Unique correlation Id in a GUID format
$x_avalara_client = Swagger UI; 22.1.0; // string | Identifies the software you are using to call this API. For more information on the client header, see [Client Headers](https://developer.avalara.com/avatax/client-headers/) .
$get1099_form200_response = {"type":"1042-S","issuerId":"12345","referenceId":"1042S-REF-001","tin":"112233445","recipientName":"Michael Jackson","recipientSecondName":"SuperStart","address":"1234 Corporate Blvd","address2":"Suite 500","city":"Anytown","state":"MA","zip":"12345","email":"email@example.com","accountNumber":"ACC01","nonUsProvince":null,"countryCode":"US","federalEfileDate":"2024-03-15","postalMail":true,"stateEfileDate":null,"recipientEdeliveryDate":"2024-03-25","tinMatch":false,"noTin":false,"addressVerification":true,"stateAndLocalWithholding":{"stateTaxWithheld":50,"state":"CA","stateIdNumber":"CA98765432"},"secondTinNotice":true,"uniqueFormId":"1234567890","recipientDateOfBirth":"1990-01-01","recipientGiin":"748291.59302.US.001","recipientForeignTin":"920456.38475.GM.002","lobCode":"06","incomeCode":"16","grossIncome":10000.5,"withholdingIndicator":"3","taxCountryCode":"GM","exemptionCodeChap3":"00","exemptionCodeChap4":"13","taxRateChap3":"30.00","withholdingAllowance":15,"federalTaxWithheld":1500.25,"taxNotDepositedIndicator":true,"academicIndicator":true,"taxWithheldOtherAgents":100,"amountRepaid":200,"taxPaidAgent":50.5,"chap3StatusCode":"06","chap4StatusCode":"02","primaryWithholdingAgent":{"name":"Primary Agent Name","ein":"98-3456789"},"intermediaryOrFlowThrough":{"ein":"98-7654321","chap3StatusCode":"03","chap4StatusCode":"04","name":"Intermediary Name","giin":"748291.59302.US.002","countryCode":"US","foreignTin":"123-45-6789","address":"123 Main St.","city":"Cityville","state":"CA","zip":"98765"}}; // \Avalara\SDK\Model\A1099\V2\Get1099Form200Response

try {
    $result = $apiInstance->update1099Form($id, $avalara_version, $x_correlation_id, $x_avalara_client, $get1099_form200_response);
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
 **get1099_form200_response** | [**\Avalara\SDK\Model\A1099\V2\Get1099Form200Response**](../Model/Get1099Form200Response.md)|  | [optional]

### Return type

[**\Avalara\SDK\Model\A1099\V2\Get1099Form200Response**](../Model/Get1099Form200Response.md)

### Authorization

[bearer](../../../README.md#bearer)

### HTTP request headers

- **Content-Type**: `application/json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
