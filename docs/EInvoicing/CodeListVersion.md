# # CodeListVersion

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**version_reasons** | **string[]** | List of free-text reasons explaining why this version of the code list exists (for example, initial introduction, regulatory update, addition/deprecation of codes). Useful for audit and change tracking. | [optional]
**juris_effective_date** | **\DateTime** | Date from which this version of the code list becomes legally or operationally effective in the jurisdiction. Typically corresponds to a go-live, mandate, or release date. | [optional]
**juris_sunset_date** | **\DateTime** | Date after which this version of the code list must no longer be used in the jurisdiction. Use a far-future date (e.g., 9999-12-31) when the sunset is not yet known. | [optional]
**locale** | **string** | Language–region locale identifier indicating the language and regional variant for descriptions in this version of the code list. Follows BCP-47 format such as en-US, fr-FR, de-DE. | [optional]
**values** | [**\AvalaraSDK\ModelEInvoicingV1\CodeListValue[]**](CodeListValue.md) | Array of code entries defined in this version of the code list. Each entry contains the machine-readable code value and its human-readable description in the given locale. | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
