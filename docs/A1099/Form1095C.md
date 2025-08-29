# # Form1095C

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**employee_first_name** | **string** | Employee&#39;s first name |
**employee_middle_name** | **string** | Employee&#39;s middle name | [optional]
**employee_last_name** | **string** | Employee&#39;s last name |
**employee_name_suffix** | **string** | Employee&#39;s name suffix | [optional]
**recipient_date_of_birth** | **\DateTime** | Recipient&#39;s date of birth | [optional]
**plan_start_month** | **string** | Plan start month.  The calendar month during which the plan year begins of the health plan in which the employee is offered coverage (or would be offered coverage if the employee were eligible to participate in the plan).  Available values:  - 00: None  - 01: January  - 02: February  - 03: March  - 04: April  - 05: May  - 06: June  - 07: July  - 08: August  - 09: September  - 10: October  - 11: November  - 12: December |
**employer_provided_si_coverage** | **bool** | Employer provided self-insured coverage | [optional]
**offer_and_coverages** | [**\AvalaraSDK\ModelA1099V2\OfferAndCoverage[]**](OfferAndCoverage.md) | Offer and coverage information |
**covered_individuals** | [**\AvalaraSDK\ModelA1099V2\CoveredIndividual[]**](CoveredIndividual.md) | Covered individuals information | [optional]
**type** | **string** | Form type |
**id** | **string** | Form ID. Unique identifier set when the record is created. | [optional] [readonly]
**issuer_id** | **string** | Issuer ID - only required when creating forms | [optional]
**issuer_reference_id** | **string** | Issuer Reference ID - only required when creating forms | [optional]
**issuer_tin** | **string** | Issuer TIN - readonly | [optional]
**tax_year** | **int** | Tax Year - only required when creating forms | [optional]
**reference_id** | **string** | Internal reference ID. Never shown to any agency or recipient. | [optional]
**tin** | **string** | Recipient&#39;s Federal Tax Identification Number (TIN). | [optional]
**recipient_name** | **string** | Recipient name |
**tin_type** | **string** | Type of TIN (Tax ID Number) | [optional]
**recipient_second_name** | **string** | Recipient second name | [optional]
**address** | **string** | Address. |
**address2** | **string** | Address line 2. | [optional]
**city** | **string** | City. |
**state** | **string** | Two-letter US state or Canadian province code (required for US/CA addresses). | [optional]
**zip** | **string** | ZIP/postal code. | [optional]
**email** | **string** | Recipient&#39;s Contact email address. | [optional]
**account_number** | **string** | Account number | [optional]
**office_code** | **string** | Office code | [optional]
**non_us_province** | **string** | Province or region for non-US/CA addresses. | [optional]
**country_code** | **string** | Two-letter IRS country code (e.g., &#39;US&#39;, &#39;CA&#39;), as defined at https://www.irs.gov/e-file-providers/country-codes. |
**federal_efile_date** | **\DateTime** | Date when federal e-filing should be scheduled for this form | [optional]
**postal_mail** | **bool** | Boolean indicating that postal mailing to the recipient should be scheduled for this form | [optional]
**state_efile_date** | **\DateTime** | Date when state e-filing should be scheduled for this form | [optional]
**recipient_edelivery_date** | **\DateTime** | Date when recipient e-delivery should be scheduled for this form | [optional]
**tin_match** | **bool** | Boolean indicating that TIN Matching should be scheduled for this form | [optional]
**no_tin** | **bool** | No TIN indicator | [optional]
**address_verification** | **bool** | Boolean indicating that address verification should be scheduled for this form | [optional]
**state_and_local_withholding** | [**\AvalaraSDK\ModelA1099V2\StateAndLocalWithholding**](StateAndLocalWithholding.md) | State and local withholding information | [optional]
**second_tin_notice** | **bool** | Second TIN notice | [optional]
**federal_efile_status** | [**\AvalaraSDK\ModelA1099V2\Form1099StatusDetail**](Form1099StatusDetail.md) | Federal e-file status | [optional] [readonly]
**state_efile_status** | [**\AvalaraSDK\ModelA1099V2\StateEfileStatusDetail[]**](StateEfileStatusDetail.md) | State e-file status | [optional] [readonly]
**postal_mail_status** | [**\AvalaraSDK\ModelA1099V2\Form1099StatusDetail**](Form1099StatusDetail.md) | Postal mail to recipient status | [optional] [readonly]
**tin_match_status** | [**\AvalaraSDK\ModelA1099V2\Form1099StatusDetail**](Form1099StatusDetail.md) | TIN Match status | [optional] [readonly]
**address_verification_status** | [**\AvalaraSDK\ModelA1099V2\Form1099StatusDetail**](Form1099StatusDetail.md) | Address verification status | [optional] [readonly]
**e_delivery_status** | [**\AvalaraSDK\ModelA1099V2\Form1099StatusDetail**](Form1099StatusDetail.md) | EDelivery status | [optional] [readonly]
**validation_errors** | [**\AvalaraSDK\ModelA1099V2\ValidationError[]**](ValidationError.md) | Validation errors | [optional] [readonly]
**created_at** | **\DateTime** | Date time when the record was created. | [optional] [readonly]
**updated_at** | **\DateTime** | Date time when the record was last updated. | [optional] [readonly]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
