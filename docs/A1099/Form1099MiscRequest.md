# # Form1099MiscRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**rents** | **float** | Rents | [optional]
**royalties** | **float** | Royalties | [optional]
**other_income** | **float** | Other income | [optional]
**fed_income_tax_withheld** | **float** | Federal income tax withheld | [optional]
**fishing_boat_proceeds** | **float** | Fishing boat proceeds | [optional]
**medical_and_health_care_payments** | **float** | Medical and health care payments | [optional]
**direct_sales_indicator** | **bool** | Payer made direct sales totaling $5,000 or more of consumer products to recipient for resale | [optional]
**substitute_payments** | **float** | Substitute payments in lieu of dividends or interest | [optional]
**crop_insurance_proceeds** | **float** | Crop insurance proceeds | [optional]
**gross_proceeds_paid_to_attorney** | **float** | Gross proceeds paid to an attorney | [optional]
**fish_purchased_for_resale** | **float** | Fish purchased for resale | [optional]
**section409_a_deferrals** | **float** | Section 409A deferrals | [optional]
**fatca_filing_requirement** | **bool** | FATCA filing requirement | [optional]
**excess_golden_parachute_payments** | **float** | (Legacy field) Excess golden parachute payments | [optional]
**nonqualified_deferred_compensation** | **float** | Nonqualified deferred compensation | [optional]
**type** | **string** |  | [optional]
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
