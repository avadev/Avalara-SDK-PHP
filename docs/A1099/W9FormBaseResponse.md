# # W9FormBaseResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | The form type. | [optional] [readonly]
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
