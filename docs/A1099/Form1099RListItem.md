# # Form1099RListItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**gross_distribution** | **float** | Gross distribution | [optional]
**taxable_amount** | **float** | Taxable amount | [optional]
**taxable_amount_not_determined** | **bool** | Taxable amount not determined | [optional]
**total_distribution_determined** | **bool** | Total distribution | [optional]
**capital_gain** | **float** | Capital gain (included in Box 2a) | [optional]
**federal_income_tax_withheld** | **float** | Federal income tax withheld | [optional]
**employee_contributions_or_designated_roth_or_insurance_premiums** | **float** | Employee contributions/Designated Roth contributions or insurance premiums | [optional]
**net_unrealized_appreciation_in_employer_securities** | **float** | Net unrealized appreciation in employer&#39;s securities | [optional]
**distribution_code** | **string** | Distribution code | [optional]
**second_distribution_code** | **string** | Second distribution code | [optional]
**ira_sep_simple** | **bool** | IRA/SEP/SIMPLE | [optional]
**traditional_ira_sep_simple_or_roth_conversion_amount** | **float** | Traditional IRA/SEP/SIMPLE or Roth conversion amount | [optional]
**other_amount** | **float** | Other amount | [optional]
**other_percentage** | **string** | Other percentage | [optional]
**total_distribution_percentage** | **string** | Total distribution percentage | [optional]
**total_employee_contributions** | **float** | Total employee contributions | [optional]
**amount_allocable_to_irr_within5_years** | **float** | Amount allocable to IRR within 5 years | [optional]
**first_year_of_designated_roth_contribution** | **int** | First year of designated Roth contribution | [optional]
**fatca_filing_requirement** | **bool** | FATCA filing requirement | [optional]
**date_of_payment** | **\DateTime** | Date of payment | [optional]
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
