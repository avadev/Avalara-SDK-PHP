# # Form1099Misc

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**rents** | **float** | Rents | [optional]
**royalties** | **float** | Royalties | [optional]
**other_income** | **float** | Other income | [optional]
**federal_income_tax_withheld** | **float** | Federal income tax withheld | [optional]
**fishing_boat_proceeds** | **float** | Fishing boat proceeds | [optional]
**medical_and_health_care_payments** | **float** | Medical and health care payments | [optional]
**direct_sales_indicator** | **bool** | Payer made direct sales totaling $5,000 or more of consumer products to recipient for resale | [optional]
**substitute_payments** | **float** | Substitute payments in lieu of dividends or interest | [optional]
**crop_insurance_proceeds** | **float** | Crop insurance proceeds | [optional]
**gross_proceeds_paid_to_attorney** | **float** | Gross proceeds paid to an attorney | [optional]
**fish_purchased_for_resale** | **float** | Fish purchased for resale | [optional]
**section409_a_deferrals** | **float** | Section 409A deferrals | [optional]
**excess_golden_parachute_payments** | **float** | (Legacy field) Excess golden parachute payments | [optional]
**nonqualified_deferred_compensation** | **float** | Nonqualified deferred compensation | [optional]
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
**state_and_local_withholding** | [**\Avalara\SDK\Model\A1099\V2\StateAndLocalWithholding**](StateAndLocalWithholding.md) | State and local withholding information | [optional]
**second_tin_notice** | **bool** | Second TIN notice | [optional]
**federal_efile_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail**](Form1099StatusDetail.md) | Federal e-file status | [optional] [readonly]
**state_efile_status** | [**\Avalara\SDK\Model\A1099\V2\StateEfileStatusDetail[]**](StateEfileStatusDetail.md) | State e-file status | [optional] [readonly]
**postal_mail_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail**](Form1099StatusDetail.md) | Postal mail to recipient status | [optional] [readonly]
**tin_match_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail**](Form1099StatusDetail.md) | TIN Match status | [optional] [readonly]
**address_verification_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail**](Form1099StatusDetail.md) | Address verification status | [optional] [readonly]
**e_delivery_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail**](Form1099StatusDetail.md) | EDelivery status | [optional] [readonly]
**validation_errors** | [**\Avalara\SDK\Model\A1099\V2\ValidationError[]**](ValidationError.md) | Validation errors | [optional] [readonly]
**created_at** | **\DateTime** | Date time when the record was created. | [optional] [readonly]
**updated_at** | **\DateTime** | Date time when the record was last updated. | [optional] [readonly]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
