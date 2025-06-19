# # SubmitDocumentMetadata

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**workflow_id** | **string** | Specifies a unique ID for this workflow. |
**data_format** | **string** | Specifies the data format for this workflow. |
**data_format_version** | **string** | Specifies the data format version number. |
**output_data_format** | **string** | Specifies the format of the output document to be generated for the recipient. This format should be chosen based on the recipient&#39;s preferences or requirements as defined by applicable e-invoicing regulations. When not specified for mandates that don&#39;t require a specific output format, the system will use the default format defined for that mandate. | [optional]
**output_data_format_version** | **string** | Specifies the version of the selected output document format | [optional]
**country_code** | **string** | The two-letter ISO-3166 country code for the country where the document is being submitted |
**country_mandate** | **string** | The e-invoicing mandate for the specified country. |

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
