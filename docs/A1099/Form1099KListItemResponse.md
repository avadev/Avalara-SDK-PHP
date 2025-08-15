# # Form1099KListItemResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**filer_type** | **string** | Filer type (PSE or EPF) | [optional]
**payment_type** | **string** | Payment type (payment card or third party network) | [optional]
**payment_settlement_entity_name_phone_number** | **string** | Payment settlement entity name and phone number | [optional]
**gross_amount_payment_card** | **float** | Gross amount of payment card/third party network transactions | [optional]
**card_not_present_transactions** | **float** | Card not present transactions | [optional]
**merchant_category_code** | **string** | Merchant category code | [optional]
**payment_transaction_number** | **float** | Number of payment transactions | [optional]
**federal_income_tax_withheld** | **float** | Federal income tax withheld | [optional]
**january** | **float** | January gross payments | [optional]
**february** | **float** | February gross payments | [optional]
**march** | **float** | March gross payments | [optional]
**april** | **float** | April gross payments | [optional]
**may** | **float** | May gross payments | [optional]
**june** | **float** | June gross payments | [optional]
**july** | **float** | July gross payments | [optional]
**august** | **float** | August gross payments | [optional]
**sept** | **float** | September gross payments | [optional]
**october** | **float** | October gross payments | [optional]
**november** | **float** | November gross payments | [optional]
**december** | **float** | December gross payments | [optional]
**id** | **string** | ID of the form | [readonly]
**type** | **string** | Type of the form. Will be one of:  * 940  * 941  * 943  * 944  * 945  * 1042  * 1042-S  * 1095-B  * 1095-C  * 1097-BTC  * 1098  * 1098-C  * 1098-E  * 1098-Q  * 1098-T  * 3921  * 3922  * 5498  * 5498-ESA  * 5498-SA  * 1099-MISC  * 1099-A  * 1099-B  * 1099-C  * 1099-CAP  * 1099-DIV  * 1099-G  * 1099-INT  * 1099-K  * 1099-LS  * 1099-LTC  * 1099-NEC  * 1099-OID  * 1099-PATR  * 1099-Q  * 1099-R  * 1099-S  * 1099-SA  * T4A  * W-2  * W-2G  * 1099-HC |
**issuer_id** | **int** | Issuer ID |
**issuer_reference_id** | **string** | Issuer Reference ID | [optional]
**issuer_tin** | **string** | Issuer TIN | [optional]
**tax_year** | **int** | Tax year | [optional]
**federal_efile** | **bool** | Boolean indicating that federal e-filing has been scheduled for this form |
**federal_efile_status** | [**\AvalaraSDK\ModelA1099V2\StatusDetail**](StatusDetail.md) | Federal e-file status | [optional] [readonly]
**state_efile** | **bool** | Boolean indicating that state e-filing has been scheduled for this form |
**state_efile_status** | [**\AvalaraSDK\ModelA1099V2\StateEfileStatusDetailResponse[]**](StateEfileStatusDetailResponse.md) | State e-file status | [optional] [readonly]
**postal_mail** | **bool** | Boolean indicating that postal mailing to the recipient has been scheduled for this form |
**postal_mail_status** | [**\AvalaraSDK\ModelA1099V2\StatusDetail**](StatusDetail.md) | Postal mail to recipient status | [optional] [readonly]
**tin_match** | **bool** | Boolean indicating that TIN Matching has been scheduled for this form |
**tin_match_status** | [**\AvalaraSDK\ModelA1099V2\StatusDetail**](StatusDetail.md) | TIN Match status | [optional] [readonly]
**address_verification** | **bool** | Boolean indicating that address verification has been scheduled for this form |
**address_verification_status** | [**\AvalaraSDK\ModelA1099V2\StatusDetail**](StatusDetail.md) | Address verification status | [optional] [readonly]
**e_delivery_status** | [**\AvalaraSDK\ModelA1099V2\StatusDetail**](StatusDetail.md) | EDelivery status | [optional] [readonly]
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
**fatca_filing_requirement** | **bool** | FATCA filing requirement | [optional]
**validation_errors** | [**\AvalaraSDK\ModelA1099V2\ValidationErrorResponse[]**](ValidationErrorResponse.md) | Validation errors | [optional] [readonly]
**created_at** | **\DateTime** | Creation time | [optional] [readonly]
**updated_at** | **\DateTime** | Update time | [optional] [readonly]
**state_and_local_withholding** | [**\AvalaraSDK\ModelA1099V2\StateAndLocalWithholdingResponse**](StateAndLocalWithholdingResponse.md) |  | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
