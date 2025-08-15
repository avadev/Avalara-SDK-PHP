# # Mandate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**mandate_id** | **string** | The &#x60;mandateId&#x60; is comprised of the country code, mandate type, and the network or regulation type (for example, AU-B2G-PEPPOL). Keep in mind the following when specifying a &#x60;mandateId&#x60;. - A country can have multiple mandate types (B2C, B2B, B2G). - A entity/company can opt in for multiple mandates. - A &#x60;mandateId&#x60; is the combination of country + mandate type + network/regulation. | [optional]
**country_mandate** | **string** | **[LEGACY]** This field is retained for backward compatibility. It is recommended to use &#x60;mandateId&#x60; instead. The &#x60;countryMandate&#x60; similar to the &#x60;mandateId&#x60; is comprised of the country code, mandate type, and the network or regulation type (for example, AU-B2G-PEPPOL). | [optional]
**country_code** | **string** | Country code | [optional]
**description** | **string** | Mandate description | [optional]
**supported_by_elrapi** | **bool** | Indicates whether this mandate supported by the ELR API | [optional]
**mandate_format** | **string** | Mandate format | [optional]
**e_invoicing_flow** | **string** | The type of e-invoicing flow for this mandate | [optional]
**e_invoicing_flow_documentation_link** | **string** | Link to the documentation for this mandate&#39;s e-invoicing flow | [optional]
**get_invoice_available_media_type** | **string[]** | List of available media types for downloading invoices for this mandate | [optional]
**supports_inbound_digital_document** | **string** | Indicates whether this mandate supports inbound digital documents | [optional]
**input_data_formats** | [**\AvalaraSDK\ModelEInvoicingV1\InputDataFormats[]**](InputDataFormats.md) | Format and version used when inputting the data | [optional]
**output_data_formats** | [**\AvalaraSDK\ModelEInvoicingV1\OutputDataFormats[]**](OutputDataFormats.md) | Lists the supported output document formats for the country mandate. For countries where specifying an output document format is required (e.g., France), this array will contain the applicable formats. For other countries where output format selection is not necessary, the array will be empty. | [optional]
**workflow_ids** | [**\AvalaraSDK\ModelEInvoicingV1\WorkflowIds[]**](WorkflowIds.md) | Workflow ID list | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
