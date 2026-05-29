# # DataInputField

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Field UUID | [optional]
**field_id** | **string** | Field ID | [optional]
**applicable_document_roots** | **object[]** |  | [optional]
**path** | **string** | Path to this field | [optional]
**namespace** | **string** | Namespace of this field | [optional]
**field_name** | **string** | Field name | [optional]
**example_or_fixed_value** | **string** | An example of the content for this field | [optional]
**accepted_values** | **object** | An object representing the acceptable values for this field | [optional]
**documentation_link** | **string** | An example of the content for this field | [optional]
**description** | **string** | A description of this field | [optional]
**is_segment** | **bool** | Is this a segment of the schema | [optional]
**required_for** | [**\Avalara\SDK\Model\EInvoicing\V1\DataInputFieldRequiredFor**](DataInputFieldRequiredFor.md) |  | [optional]
**conditional_for** | [**\Avalara\SDK\Model\EInvoicing\V1\ConditionalForField[]**](ConditionalForField.md) |  | [optional]
**not_used_for** | [**\Avalara\SDK\Model\EInvoicing\V1\DataInputFieldNotUsedFor**](DataInputFieldNotUsedFor.md) |  | [optional]
**optional_for** | [**\Avalara\SDK\Model\EInvoicing\V1\DataInputFieldOptionalFor**](DataInputFieldOptionalFor.md) |  | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
