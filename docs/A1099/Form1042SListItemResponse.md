# # Form1042SListItemResponse

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
**primary_withholding_agent** | [**\Avalara\SDK\Model\A1099\V2\PrimaryWithholdingAgentResponse**](PrimaryWithholdingAgentResponse.md) | Primary withholding agent information | [optional]
**intermediary_or_flow_through** | [**\Avalara\SDK\Model\A1099\V2\IntermediaryOrFlowThroughResponse**](IntermediaryOrFlowThroughResponse.md) | Intermediary or flow-through entity information | [optional]
**id** | **string** | ID of the form | [readonly]
**type** | **string** | Type of the form. Will be one of:  * 940  * 941  * 943  * 944  * 945  * 1042  * 1042-S  * 1095-B  * 1095-C  * 1097-BTC  * 1098  * 1098-C  * 1098-E  * 1098-Q  * 1098-T  * 3921  * 3922  * 5498  * 5498-ESA  * 5498-SA  * 1099-MISC  * 1099-A  * 1099-B  * 1099-C  * 1099-CAP  * 1099-DIV  * 1099-G  * 1099-INT  * 1099-K  * 1099-LS  * 1099-LTC  * 1099-NEC  * 1099-OID  * 1099-PATR  * 1099-Q  * 1099-R  * 1099-S  * 1099-SA  * T4A  * W-2  * W-2G  * 1099-HC |
**issuer_id** | **int** | Issuer ID |
**issuer_reference_id** | **string** | Issuer Reference ID | [optional]
**issuer_tin** | **string** | Issuer TIN | [optional]
**tax_year** | **int** | Tax year | [optional]
**federal_efile** | **bool** | Boolean indicating that federal e-filing has been scheduled for this form |
**federal_efile_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetailResponse**](Form1099StatusDetailResponse.md) | Federal e-file status | [optional] [readonly]
**state_efile** | **bool** | Boolean indicating that state e-filing has been scheduled for this form |
**state_efile_status** | [**\Avalara\SDK\Model\A1099\V2\StateEfileStatusDetailResponse[]**](StateEfileStatusDetailResponse.md) | State e-file status | [optional] [readonly]
**postal_mail** | **bool** | Boolean indicating that postal mailing to the recipient has been scheduled for this form |
**postal_mail_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetailResponse**](Form1099StatusDetailResponse.md) | Postal mail to recipient status | [optional] [readonly]
**tin_match** | **bool** | Boolean indicating that TIN Matching has been scheduled for this form |
**tin_match_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetailResponse**](Form1099StatusDetailResponse.md) | TIN Match status | [optional] [readonly]
**address_verification** | **bool** | Boolean indicating that address verification has been scheduled for this form |
**address_verification_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetailResponse**](Form1099StatusDetailResponse.md) | Address verification status | [optional] [readonly]
**reference_id** | **string** | Reference ID | [optional]
**email** | **string** | Recipient email address | [optional]
**tin_type** | **string** | Type of TIN (Tax ID Number). Will be one of:  * SSN  * EIN  * ITIN  * ATIN | [optional]
**tin** | **string** | Recipient Tax ID Number | [optional]
**recipient_name** | **string** | Recipient name | [optional]
**recipient_second_name** | **string** | Recipient second name | [optional]
**address** | **string** | Address | [optional]
**address2** | **string** | Address line 2 | [optional]
**city** | **string** | City | [optional]
**state** | **string** | US state | [optional]
**zip** | **string** | Zip/postal code | [optional]
**foreign_province** | **string** | Foreign province | [optional]
**country_code** | **string** | Country code, as defined at https://www.irs.gov/e-file-providers/country-codes | [optional]
**validation_errors** | [**\Avalara\SDK\Model\A1099\V2\ValidationErrorResponse[]**](ValidationErrorResponse.md) | Validation errors | [optional] [readonly]
**created_at** | **\DateTime** | Creation time | [optional] [readonly]
**updated_at** | **\DateTime** | Update time | [optional] [readonly]
**state_and_local_withholding** | [**\Avalara\SDK\Model\A1099\V2\StateAndLocalWithholdingResponse**](StateAndLocalWithholdingResponse.md) |  | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
