# # Form1099R

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
**first_year_of_designated_roth_contribution** | **string** | First year of designated Roth contribution | [optional]
**date_of_payment** | **\DateTime** | Date of payment | [optional]
**fatca_filing_requirement** | **bool** | FATCA filing requirement | [optional]
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
