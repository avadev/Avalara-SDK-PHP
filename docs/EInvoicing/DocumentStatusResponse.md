# # DocumentStatusResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The unique ID for this document | [optional]
**status** | **string** | Document status. See the &#x60;supportedDocumentStatuses&#x60; field in the GET /mandates response for full status definitions. | [optional]
**business_status** | **string** | Represents the document&#39;s business lifecycle state based on responses from external actors (Tax Authority, PDP, or ERP), such as acceptance, rejection, or validation. | [optional]
**events** | [**\Avalara\SDK\Model\EInvoicing\V1\StatusEvent[]**](StatusEvent.md) |  | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
