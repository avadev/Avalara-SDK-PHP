# # Form1042SListItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**unique_form_id** | **string** | Unique form identifier | [optional]
**no_tin** | **bool** | No TIN indicator | [optional]
**recipient_date_of_birth** | **\DateTime** | Recipient&#39;s date of birth | [optional]
**recipient_giin** | **string** | Recipient&#39;s GIIN (Global Intermediary Identification Number) | [optional]
**recipient_foreign_tin** | **string** | Recipient&#39;s foreign TIN | [optional]
**lob_code** | **string** | Limitation on benefits code | [optional]
**income_code** | **string** | Income code | [optional]
**gross_income** | **float** | Gross income | [optional]
**withholding_indicator** | **string** | Withholding indicator | [optional]
**tax_country_code** | **string** | Country code | [optional]
**exemption_code_chap3** | **string** | Exemption code (Chapter 3) | [optional]
**exemption_code_chap4** | **string** | Exemption code (Chapter 4) | [optional]
**tax_rate_chap3** | **string** | Tax rate (Chapter 3) | [optional]
**withholding_allowance** | **float** | Withholding allowance | [optional]
**federal_tax_withheld** | **float** | Federal tax withheld | [optional]
**tax_not_deposited_indicator** | **bool** | Tax not deposited indicator | [optional]
**academic_indicator** | **bool** | Academic indicator | [optional]
**tax_withheld_other_agents** | **float** | Tax withheld by other agents | [optional]
**amount_repaid** | **float** | Amount repaid to recipient | [optional]
**tax_paid_agent** | **float** | Tax paid by withholding agent | [optional]
**chap3_status_code** | **string** | Chapter 3 status code | [optional]
**chap4_status_code** | **string** | Chapter 4 status code | [optional]
**primary_withholding_agent** | [**\Avalara\SDK\Model\A1099\V2\PrimaryWithholdingAgent**](PrimaryWithholdingAgent.md) | Primary withholding agent information | [optional]
**intermediary_or_flow_through** | [**\Avalara\SDK\Model\A1099\V2\IntermediaryOrFlowThrough**](IntermediaryOrFlowThrough.md) | Intermediary or flow-through entity information | [optional]
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
