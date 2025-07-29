# # Form1099DivRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**total_ordinary_dividends** | **string** | Total ordinary dividends | [optional]
**qualified_dividends** | **string** | Qualified dividends | [optional]
**total_capital_gain_distr** | **string** | Total capital gain distributions | [optional]
**unrecap_sec1250_gain** | **string** | Unrecaptured Section 1250 gain | [optional]
**section1202_gain** | **string** | Section 1202 gain | [optional]
**collectibles_gain** | **string** | Collectibles (28%) gain | [optional]
**section897_ordinary_dividends** | **string** | Section 897 ordinary dividends | [optional]
**section897_capital_gain** | **string** | Section 897 capital gain | [optional]
**nondividend_distributions** | **string** | Nondividend distributions | [optional]
**federal_income_tax_withheld** | **string** | Federal income tax withheld | [optional]
**section199_a_dividends** | **string** | Section 199A dividends | [optional]
**investment_expenses** | **string** | Investment expenses | [optional]
**foreign_tax_paid** | **string** | Foreign tax paid | [optional]
**foreign_country_or_us_possession** | **string** | Foreign country or U.S. possession | [optional]
**cash_liquidation_distributions** | **string** | Cash liquidation distributions | [optional]
**noncash_liquidation_distributions** | **string** | Noncash liquidation distributions | [optional]
**exempt_interest_dividends** | **string** | Exempt-interest dividends | [optional]
**specified_private_activity_bond_interest_dividends** | **string** | Specified private activity bond interest dividends | [optional]
**fatca_filing_requirement** | **string** | FATCA filing requirement | [optional]
**type** | **string** |  | [optional]
**issuer_id** | **string** | Issuer ID | [optional]
**reference_id** | **string** | Reference ID | [optional]
**recipient_tin** | **string** | Recipient Tax ID Number | [optional]
**recipient_name** | **string** | Recipient name |
**tin_type** | **string** | Type of TIN (Tax ID Number). Will be one of:  * SSN  * EIN  * ITIN  * ATIN | [optional]
**recipient_second_name** | **string** | Recipient second name | [optional]
**address** | **string** | Address |
**address2** | **string** | Address line 2 | [optional]
**city** | **string** | City |
**state** | **string** | US state. Required if CountryCode is \&quot;US\&quot;. | [optional]
**zip** | **string** | Zip/postal code | [optional]
**recipient_email** | **string** | Recipient email address | [optional]
**account_number** | **string** | Account number | [optional]
**office_code** | **string** | Office code | [optional]
**recipient_non_us_province** | **string** | Foreign province | [optional]
**country_code** | **string** | Country code, as defined at https://www.irs.gov/e-file-providers/country-codes |
**federal_e_file** | **bool** | Boolean indicating that federal e-filing should be scheduled for this form | [optional]
**postal_mail** | **bool** | Boolean indicating that postal mailing to the recipient should be scheduled for this form | [optional]
**state_e_file** | **bool** | Boolean indicating that state e-filing should be scheduled for this form | [optional]
**tin_match** | **bool** | Boolean indicating that TIN Matching should be scheduled for this form | [optional]
**address_verification** | **bool** | Boolean indicating that address verification should be scheduled for this form | [optional]
**state_and_local_withholding** | [**\Avalara\SDK\Model\A1099\V2\StateAndLocalWithholdingRequest**](StateAndLocalWithholdingRequest.md) | State and local withholding information | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
