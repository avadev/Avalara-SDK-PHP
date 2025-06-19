# # FormRequestModel

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  | [optional]
**type** | **string** |  | [optional]
**form_type** | **string** | \&quot;W9\&quot; is currently the only supported value | [optional]
**company_id** | **int** | Track1099&#39;s ID of your company, found in the W-9 UI | [optional]
**company_name** | **string** | Name of your company, set in the W-9 UI | [optional]
**company_email** | **string** | Contact email of your company, set in the W-9 UI | [optional]
**reference_id** | **string** | Your internal identifier for the vendor from whom you are requesting a form | [optional]
**signed_at** | **\DateTime** | The timestamp this vendor (identified by your ReferenceId) last signed a complete W-9, null if you did not include a ReferenceId or the vendor has not yet signed a W-9 in Track1099 | [optional]
**tin_match_status** | **string** | Result of IRS TIN match query for name and TIN in the last signed form, null if signed_at is null | [optional]
**expires_at** | **\DateTime** | Timestamp when this FormRequest will expire, ttl (or 3600) seconds from creation | [optional]
**signed_pdf** | **string** | URL of PDF representation of just-signed form, otherwise null. Integrations may use this value to offer a \&quot;download for your records\&quot; function after a vendor completes and signs a form. Link expires at the same time as this FormRequest. Treat the format of this URL as opaque and expect it to change in the future. | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
