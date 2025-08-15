# # EventMessage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**message** | **object** | Event-specific information |
**signature** | [**\AvalaraSDK\ModelEInvoicingV1\SignatureValueSignature**](SignatureValueSignature.md) |  |
**tenant_id** | **string** | Tenant ID of the event |
**correlation_id** | **string** | The correlation ID used by Avalara to aid in tracing through to provenance of this event massage. | [optional]
**system_code** | **string** | The Avalara registered code for the system. See &lt;a href&#x3D;\&quot;https://avalara.atlassian.net/wiki/spaces/AIM/pages/637250338966/Taxonomy+Avalara+Systems\&quot;&gt;Taxonomy&amp;#58; Avalara Systems&lt;/a&gt; |
**event_name** | **string** | Type of the event |
**event_version** | **string** | Version of the included payload. | [optional]
**receipt_timestamp** | **\DateTime** | Timestamp when the event was received by the dispatch service. | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
