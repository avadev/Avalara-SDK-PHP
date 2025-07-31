# # Form1099DivListItemResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**total_ordinary_dividends** | **string** | Total ordinary dividends | [optional]
**qualified_dividends** | **string** | Qualified dividends | [optional]
**total_capital_gain_distributions** | **string** | Total capital gain distributions | [optional]
**unrecaptured_section1250_gain** | **string** | Unrecaptured Section 1250 gain | [optional]
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
**fatca_filing_requirement** | **bool** | FATCA filing requirement | [optional]
**id** | **string** | ID of the form | [readonly]
**type** | **string** | Type of the form. Will be one of:  * 940  * 941  * 943  * 944  * 945  * 1042  * 1042-S  * 1095-B  * 1095-C  * 1097-BTC  * 1098  * 1098-C  * 1098-E  * 1098-Q  * 1098-T  * 3921  * 3922  * 5498  * 5498-ESA  * 5498-SA  * 1099-MISC  * 1099-A  * 1099-B  * 1099-C  * 1099-CAP  * 1099-DIV  * 1099-G  * 1099-INT  * 1099-K  * 1099-LS  * 1099-LTC  * 1099-NEC  * 1099-OID  * 1099-PATR  * 1099-Q  * 1099-R  * 1099-S  * 1099-SA  * T4A  * W-2  * W-2G  * 1099-HC |
**issuer_id** | **int** | Issuer ID |
**issuer_reference_id** | **string** | Issuer Reference ID | [optional]
**issuer_tin** | **string** | Issuer TIN | [optional]
**tax_year** | **int** | Tax year | [optional]
**federal_efile** | **bool** | Boolean indicating that federal e-filing has been scheduled for this form |
**federal_efile_status** | [**\Avalara\SDK\Model\A1099\V2\StatusDetail**](StatusDetail.md) | Federal e-file status | [optional] [readonly]
**state_efile** | **bool** | Boolean indicating that state e-filing has been scheduled for this form |
**state_efile_status** | [**\Avalara\SDK\Model\A1099\V2\StateEfileStatusDetailResponse[]**](StateEfileStatusDetailResponse.md) | State e-file status | [optional] [readonly]
**postal_mail** | **bool** | Boolean indicating that postal mailing to the recipient has been scheduled for this form |
**postal_mail_status** | [**\Avalara\SDK\Model\A1099\V2\StatusDetail**](StatusDetail.md) | Postal mail to recipient status | [optional] [readonly]
**tin_match** | **bool** | Boolean indicating that TIN Matching has been scheduled for this form |
**tin_match_status** | [**\Avalara\SDK\Model\A1099\V2\StatusDetail**](StatusDetail.md) | TIN Match status | [optional] [readonly]
**address_verification** | **bool** | Boolean indicating that address verification has been scheduled for this form |
**address_verification_status** | [**\Avalara\SDK\Model\A1099\V2\StatusDetail**](StatusDetail.md) | Address verification status | [optional] [readonly]
**e_delivery_status** | [**\Avalara\SDK\Model\A1099\V2\StatusDetail**](StatusDetail.md) | EDelivery status | [optional] [readonly]
**reference_id** | **string** | Reference ID | [optional]
**email** | **string** | Recipient email address | [optional]
**tin_type** | **string** | Type of TIN (Tax ID Number). Will be one of:  * SSN  * EIN  * ITIN  * ATIN | [optional]
**tin** | **string** | Recipient Tax ID Number | [optional]
**no_tin** | **bool** | Indicates whether the recipient has no TIN | [optional]
**second_tin_notice** | **bool** | Second Tin Notice | [optional]
**recipient_name** | **string** | Recipient name | [optional]
**recipient_second_name** | **string** | Recipient second name | [optional]
**address** | **string** | Address | [optional]
**address2** | **string** | Address line 2 | [optional]
**city** | **string** | City | [optional]
**state** | **string** | US state | [optional]
**zip** | **string** | Zip/postal code | [optional]
**non_us_province** | **string** | Foreign province | [optional]
**country_code** | **string** | Country code, as defined at https://www.irs.gov/e-file-providers/country-codes | [optional]
**account_number** | **string** | Account Number | [optional]
**office_code** | **string** | Office Code | [optional]
**validation_errors** | [**\Avalara\SDK\Model\A1099\V2\ValidationErrorResponse[]**](ValidationErrorResponse.md) | Validation errors | [optional] [readonly]
**created_at** | **\DateTime** | Creation time | [optional] [readonly]
**updated_at** | **\DateTime** | Update time | [optional] [readonly]
**state_and_local_withholding** | [**\Avalara\SDK\Model\A1099\V2\StateAndLocalWithholdingResponse**](StateAndLocalWithholdingResponse.md) |  | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
