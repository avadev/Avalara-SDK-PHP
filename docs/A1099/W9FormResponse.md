# # W9FormResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the individual or entity associated with the form. | [optional]
**business_name** | **string** | The name of the business associated with the form. | [optional]
**business_classification** | **string** | The classification of the business. | [optional]
**business_other** | **string** | The classification description when \&quot;businessClassification\&quot; is \&quot;Other\&quot;. | [optional]
**foreign_partner_owner_or_beneficiary** | **bool** | Indicates whether the individual is a foreign partner, owner, or beneficiary. | [optional]
**exempt_payee_code** | **string** | The exempt payee code. | [optional]
**exempt_fatca_code** | **string** | The exemption from FATCA reporting code. | [optional]
**foreign_country_indicator** | **bool** | Indicates whether the individual or entity is in a foreign country. | [optional]
**address** | **string** | The address of the individual or entity. | [optional]
**foreign_address** | **string** | The foreign address of the individual or entity. | [optional]
**city** | **string** | The city of the address. | [optional]
**state** | **string** | The state of the address. | [optional]
**zip** | **string** | The ZIP code of the address. | [optional]
**account_number** | **string** | The account number associated with the form. | [optional]
**tin_type** | **string** | The type of TIN provided. | [optional]
**tin** | **string** | The taxpayer identification number (TIN). | [optional]
**backup_withholding** | **bool** | Indicates whether backup withholding applies. | [optional]
**is1099able** | **bool** | Indicates whether the individual or entity should be issued a 1099 form. | [optional]
**tin_match_status** | [**\AvalaraSDK\ModelA1099V2\TinMatchStatusResponse**](TinMatchStatusResponse.md) | The TIN Match status from IRS. | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
