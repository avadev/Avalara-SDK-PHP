# # SupportedDocumentTypes

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Document type name. | [optional]
**value** | **string** | Document type value. |
**supported_by_trading_partner** | **bool** | Does trading partner support receiving this document type. |
**supported_by_avalara** | **bool** | Does avalara support exchanging this document type. | [optional]
**extensions** | [**\Avalara\SDK\Model\EInvoicing\V1\Extension[]**](Extension.md) | Optional array used to carry additional metadata or configuration values that may be required by specific document types. When creating or updating a trading partner, the keys provided in the &#39;extensions&#39; attribute must be selected from a predefined list of supported extensions. Using any unsupported keys will result in a validation error. | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
