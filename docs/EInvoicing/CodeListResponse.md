# # CodeListResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**country_code** | **string** | Two-letter ISO 3166-1 alpha-2 country code indicating the jurisdiction this code list applies to. | [optional]
**code_list_id** | **string** | System-generated unique identifier of the code list definition. Typically a UUID used to reference this code list internally or via APIs. | [optional]
**code_list_name** | **string** | Human-readable name of the code list, usually describing what the codes represent (for example, document types, tax categories, currencies). | [optional]
**description** | **string** | Textual description of the code list, including what it is used for and whether it represents a global standard (e.g., UN/CEFACT, ISO, EN16931) or a jurisdiction-specific/local extension of that standard. | [optional]
**standard** | **string** | Identifier of the underlying standard or authoritative source for this code list. This may be a formal code list name (e.g., UNCL1001), a standard reference (e.g., EN16931), or an internal standard identifier. | [optional]
**versions** | [**\AvalaraSDK\ModelEInvoicingV1\CodeListVersion[]**](CodeListVersion.md) | Array of versioned definitions of this code list for the given jurisdiction. Each entry represents a version that is valid for a specific effective/sunset date range, optionally per locale. | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
