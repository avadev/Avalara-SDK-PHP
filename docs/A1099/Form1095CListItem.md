# # Form1095CListItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**employee_first_name** | **string** | Employee&#39;s first name | [optional]
**employee_middle_name** | **string** | Employee&#39;s middle name | [optional]
**employee_last_name** | **string** | Employee&#39;s last name | [optional]
**employee_name_suffix** | **string** | Employee&#39;s name suffix | [optional]
**recipient_date_of_birth** | **\DateTime** | Recipient&#39;s date of birth | [optional]
**plan_start_month** | **string** | Plan start month | [optional]
**offer_and_coverages** | [**\Avalara\SDK\Model\A1099\V2\OfferAndCoverageRequest[]**](OfferAndCoverageRequest.md) | Offer and coverage information | [optional]
**employer_provided_si_coverage** | **bool** | Employer provided self-insured coverage | [optional]
**covered_individuals** | [**\Avalara\SDK\Model\A1099\V2\CoveredIndividualRequest[]**](CoveredIndividualRequest.md) | Covered individuals information | [optional]
**issuer_reference_id** | **string** | Issuer Reference ID. One of &#x60;issuerReferenceId&#x60; or &#x60;issuerTin&#x60; is required. | [optional]
**issuer_tin** | **string** | Issuer TIN. One of &#x60;issuerReferenceId&#x60; or &#x60;issuerTin&#x60; is required. | [optional]
**tax_year** | **int** | Tax year |
**issuer_id** | **string** | Issuer ID | [optional]
**reference_id** | **string** | Reference ID | [optional]
**recipient_tin** | **string** | Recipient Tax ID Number | [optional]
**recipient_name** | **string** | Recipient name | [optional]
**tin_type** | **string** | Type of TIN (Tax ID Number). Will be one of:  * SSN  * EIN  * ITIN  * ATIN | [optional]
**recipient_second_name** | **string** | Recipient second name | [optional]
**address** | **string** | Address |
**address2** | **string** | Address line 2 | [optional]
**city** | **string** | City |
**state** | **string** | US state. Required if CountryCode is \&quot;US\&quot;. | [optional]
**zip** | **string** | Zip/postal code | [optional]
**email** | **string** | Recipient email address | [optional]
**account_number** | **string** | Account number | [optional]
**office_code** | **string** | Office code | [optional]
**non_us_province** | **string** | Foreign province | [optional]
**country_code** | **string** | Country code, as defined at https://www.irs.gov/e-file-providers/country-codes |
**federal_e_file** | **bool** | Boolean indicating that federal e-filing should be scheduled for this form | [optional]
**postal_mail** | **bool** | Boolean indicating that postal mailing to the recipient should be scheduled for this form | [optional]
**state_e_file** | **bool** | Boolean indicating that state e-filing should be scheduled for this form | [optional]
**tin_match** | **bool** | Boolean indicating that TIN Matching should be scheduled for this form | [optional]
**no_tin** | **bool** | Indicates whether the recipient has no TIN | [optional]
**second_tin_notice** | **bool** | Second TIN notice in three years | [optional]
**address_verification** | **bool** | Boolean indicating that address verification should be scheduled for this form | [optional]
**state_and_local_withholding** | [**\Avalara\SDK\Model\A1099\V2\StateAndLocalWithholdingRequest**](StateAndLocalWithholdingRequest.md) | State and local withholding information | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
