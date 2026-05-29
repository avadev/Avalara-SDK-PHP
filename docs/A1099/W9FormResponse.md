# # W9FormResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | The form type (always \&quot;W9\&quot; for this model). | [optional] [readonly]
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
**tin_type** | **string** | Tax Identification Number (TIN) type. | [optional]
**tin** | **string** | The taxpayer identification number (TIN). | [optional]
**backup_withholding** | **bool** | Indicates whether backup withholding applies. | [optional]
**is1099able** | **bool** | Indicates whether the individual or entity should be issued a 1099 form. | [optional]
**tin_match_status** | [**\Avalara\SDK\Model\A1099\V2\TinMatchStatusResponse**](TinMatchStatusResponse.md) | The TIN Match status from IRS. | [optional]
**id** | **string** | The unique identifier for the form. | [optional]
**entry_status** | [**\Avalara\SDK\Model\A1099\V2\EntryStatusResponse**](EntryStatusResponse.md) | The entry status information for the form. | [optional]
**reference_id** | **string** | A reference identifier for the form. | [optional]
**company_id** | **string** | The ID of the associated company. | [optional]
**display_name** | **string** | The display name associated with the form. | [optional]
**email** | **string** | The email address of the individual associated with the form. | [optional]
**archived** | **bool** | Indicates whether the form is archived. | [optional]
**ancestor_id** | **string** | Form ID of previous version. | [optional]
**signature** | **string** | The signature of the form. | [optional]
**signed_date** | **\DateTime** | The date the form was signed. | [optional]
**e_delivery_consented_at** | **\DateTime** | The date when e-delivery was consented. | [optional]
**created_at** | **\DateTime** | The creation date of the form. | [optional]
**updated_at** | **\DateTime** | The last updated date of the form. | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
