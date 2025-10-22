# # W8BenFormRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | The form type (always \&quot;w8ben\&quot; for this model). | [optional] [readonly]
**name** | **string** | The name of the individual or entity associated with the form. |
**citizenship_country** | **string** | The country of citizenship.. Allowed values: US, AF, AX, AL, AG, AQ, AN, AO, AV, AY (and 248 more) |
**residence_address** | **string** | The residential address of the individual or entity. | [optional]
**residence_city** | **string** | The city of residence. | [optional]
**residence_state** | **string** | The state of residence. Required for US and Canada.. Allowed values: AA, AE, AK, AL, AP, AR, AS, AZ, CA, CO (and 65 more) | [optional]
**residence_zip** | **string** | The ZIP code of the residence. | [optional]
**residence_country** | **string** | The country of residence.. Allowed values: US, AF, AX, AL, AG, AQ, AN, AO, AV, AY (and 248 more) |
**residence_is_mailing** | **bool** | Indicates whether the residence address is the mailing address. | [optional]
**mailing_address** | **string** | The mailing address. | [optional]
**mailing_city** | **string** | The city of the mailing address. | [optional]
**mailing_state** | **string** | The state of the mailing address. Required for US and Canada.. Allowed values: AA, AE, AK, AL, AP, AR, AS, AZ, CA, CO (and 65 more) | [optional]
**mailing_zip** | **string** | The ZIP code of the mailing address. | [optional]
**mailing_country** | **string** | The country of the mailing address.. Allowed values: US, AF, AX, AL, AG, AQ, AN, AO, AV, AY (and 248 more) |
**tin** | **string** | The taxpayer identification number (TIN). | [optional]
**foreign_tin_not_required** | **bool** | Indicates whether a foreign TIN is not legally required. | [optional]
**foreign_tin** | **string** | The foreign taxpayer identification number (TIN). | [optional]
**reference_number** | **string** | A reference number for the form. | [optional]
**birthday** | **\DateTime** | The birthday of the individual associated with the form. | [optional]
**treaty_country** | **string** | The country for which the treaty applies.. Allowed values: US, AF, AX, AL, AG, AQ, AN, AO, AV, AY (and 248 more) | [optional]
**treaty_article** | **string** | The specific article of the treaty being claimed. | [optional]
**treaty_reasons** | **string** | The reasons for claiming treaty benefits. | [optional]
**withholding_rate** | **string** | The withholding rate applied as per the treaty. Must be a percentage with up to two decimals (e.g., 12.50, 0).. Allowed values: 0, 0.0, 0.00, 5, 5.5, 10, 12.50, 15, 20, 25 (and 1 more) | [optional]
**income_type** | **string** | The type of income covered by the treaty. | [optional]
**signer_name** | **string** | The name of the signer of the form. | [optional]
**e_delivery_consented_at** | **\DateTime** | The date when e-delivery was consented. | [optional]
**signature** | **string** | The signature of the form. | [optional]
**company_id** | **string** | The ID of the associated company. Required when creating a form. | [optional]
**reference_id** | **string** | A reference identifier for the form. | [optional]
**email** | **string** | The email address of the individual associated with the form. | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
