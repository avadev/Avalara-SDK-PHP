# # W8BenFormRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | The form type (always \&quot;w8ben\&quot; for this model). | [optional] [readonly]
**name** | **string** | The name of the individual or entity associated with the form. | [optional]
**citizenship_country** | **string** | The country of citizenship. | [optional]
**residence_address** | **string** | The residential address of the individual or entity. | [optional]
**residence_city** | **string** | The city of residence. | [optional]
**residence_state** | **string** | The state of residence. | [optional]
**residence_zip** | **string** | The ZIP code of the residence. | [optional]
**residence_country** | **string** | The country of residence. | [optional]
**residence_is_mailing** | **bool** | Indicates whether the residence address is the mailing address. | [optional]
**mailing_address** | **string** | The mailing address. | [optional]
**mailing_city** | **string** | The city of the mailing address. | [optional]
**mailing_state** | **string** | The state of the mailing address. | [optional]
**mailing_zip** | **string** | The ZIP code of the mailing address. | [optional]
**mailing_country** | **string** | The country of the mailing address. | [optional]
**tin** | **string** | The taxpayer identification number (TIN). | [optional]
**foreign_tin_not_required** | **bool** | Indicates whether a foreign TIN is not legally required. | [optional]
**foreign_tin** | **string** | The foreign taxpayer identification number (TIN). | [optional]
**reference_number** | **string** | A reference number for the form. | [optional]
**birthday** | **\DateTime** | The birthday of the individual associated with the form. | [optional]
**treaty_country** | **string** | The country for which the treaty applies. | [optional]
**treaty_article** | **string** | The specific article of the treaty being claimed. | [optional]
**treaty_reasons** | **string** | The reasons for claiming treaty benefits. | [optional]
**withholding_rate** | **string** | The withholding rate applied as per the treaty. | [optional]
**income_type** | **string** | The type of income covered by the treaty. | [optional]
**signer_name** | **string** | The name of the signer of the form. | [optional]
**company_id** | **string** | The ID of the associated company. | [optional]
**reference_id** | **string** | A reference identifier for the form. | [optional]
**email** | **string** | The email address of the individual associated with the form. | [optional]
**e_delivery_consented_at** | **\DateTime** | The date when e-delivery was consented. | [optional]
**signature** | **string** | The signature of the form. | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
