# # CompanyBase

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Legal name. Not the DBA name. |
**dba_name** | **string** | Doing Business As (DBA) name or continuation of a long legal name. | [optional]
**email** | **string** | Contact email address. For inquiries by vendors/employees. |
**address** | **string** | Address. |
**city** | **string** | City. |
**state** | **string** | Two-letter US state or Canadian province code (required for US/CA addresses). | [optional]
**zip** | **string** | ZIP/postal code. |
**telephone** | **string** | Contact phone number (must contain at least 10 digits, max 15 characters). |
**tin** | **string** | Federal Tax Identification Number (TIN). EIN/Tax ID (required for US companies). |
**reference_id** | **string** | Internal reference ID. Never shown to any agency or recipient. | [optional]
**do_tin_match** | **bool** | Indicates whether the company authorizes IRS TIN matching. | [optional]
**group_name** | **string** | Group name for organizing companies (creates or finds group by name). | [optional]
**foreign_province** | **string** | Province or region for non-US/CA addresses. | [optional]
**country_code** | **string** | Two-letter IRS country code (e.g., &#39;US&#39;, &#39;CA&#39;), as defined at https://www.irs.gov/e-file-providers/country-codes. |
**resend_requests** | **bool** | Boolean to enable automatic reminder emails (default: false). | [optional]
**resend_interval_days** | **int** | Days between reminder emails (7-365, required if resendRequests is true). | [optional]
**max_reminder_attempts** | **int** | Maximum number of reminder attempts (1-52, required if resendRequests is true). | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
