# # IssuerBase

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Legal name. Not the DBA name. |
**dba_name** | **string** | Doing Business As (DBA) name or continuation of a long legal name. Use either this or &#39;transferAgentName&#39;. | [optional]
**tin** | **string** | Federal Tax Identification Number (TIN). | [optional]
**reference_id** | **string** | Internal reference ID. Never shown to any agency or recipient. If present, it will prefix download filenames. Allowed characters: letters, numbers, dashes, underscores, and spaces. | [optional]
**telephone** | **string** | Contact phone number (must contain at least 10 digits, max 15 characters). For recipient inquiries. |
**tax_year** | **int** | Tax year for which the forms are being filed (e.g., 2024). Must be within current tax year and current tax year - 4. It&#39;s only required on creation, and cannot be modified on update. |
**country_code** | **string** | Two-letter IRS country code (e.g., &#39;US&#39;, &#39;CA&#39;), as defined at https://www.irs.gov/e-file-providers/country-codes. If there is a transfer agent, use the transfer agent&#39;s shipping address. |
**email** | **string** | Contact email address. For recipient inquiries. Phone will be used on communications if you don&#39;t specify an email | [optional]
**address** | **string** | Address. |
**city** | **string** | City. |
**state** | **string** | Two-letter US state or Canadian province code (required for US/CA addresses). |
**zip** | **string** | ZIP/postal code. |
**foreign_province** | **string** | Province or region for non-US/CA addresses. | [optional]
**transfer_agent_name** | **string** | Name of the transfer agent, if applicable — optional; use either this or &#39;dbaName&#39;. | [optional]
**last_filing** | **bool** | Indicates if this is the issuer&#39;s final year filing. |

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
