# # Mandate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**mandate_id** | **string** | The &#x60;mandateId&#x60; is comprised of the country code, mandate type, and the network or regulation type (for example, AU-B2G-PEPPOL). Keep in mind the following when specifying a &#x60;mandateId&#x60;. - A country can have multiple mandate types (B2C, B2B, B2G). - A entity/company can opt in for multiple mandates. - A &#x60;mandateId&#x60; is the combination of country + mandate type + network/regulation. | [optional]
**country_mandate** | **string** | **[LEGACY]** This field is retained for backward compatibility. It is recommended to use &#x60;mandateId&#x60; instead. The &#x60;countryMandate&#x60; similar to the &#x60;mandateId&#x60; is comprised of the country code, mandate type, and the network or regulation type (for example, AU-B2G-PEPPOL). | [optional]
**country_code** | **string** | Country code | [optional]
**description** | **string** | Mandate description | [optional]
**supported_by_partner_api** | **bool** | Indicates whether this mandate supported by the partner API | [optional]
**mandate_format** | **string** | Mandate format | [optional]
**input_data_formats** | [**\Avalara\SDK\Model\EInvoicing\V1\InputDataFormats[]**](InputDataFormats.md) | Format and version used when inputting the data | [optional]
**workflow_ids** | [**\Avalara\SDK\Model\EInvoicing\V1\WorkflowIds[]**](WorkflowIds.md) | Workflow ID list | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
