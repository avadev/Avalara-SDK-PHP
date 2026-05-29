# # WebhookInvocation

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier of this specific resource. |
**retry_count** | **int** | The number of invocation attempts. | [optional]
**retry_max** | **int** | The maximum retries that may be attempted in total. | [optional]
**invocation_timestamp** | **\DateTime** | Initial timestamp of the first invocation attempt. |
**retry_timestamp** | **\DateTime** | Timestamp of this invocation attempt. | [optional]
**items** | [**\AvalaraSDK\ModelEInvoicingV1\EventMessage[]**](EventMessage.md) | Array of events being delivered in the webhook |

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
