# # DocumentSummary

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The unique ID for this document | [optional]
**company_id** | **string** | Unique identifier that represents the company within the system. | [optional]
**process_date_time** | **string** | The date and time when the document was processed, displayed in the format YYYY-MM-DDThh:mm:ss | [optional]
**status** | **string** | The Document status | [optional]
**business_status** | **string** | Represents the document&#39;s business lifecycle state based on responses from external actors (Tax Authority, PDP, or ERP), such as acceptance, rejection, or validation. | [optional]
**supplier_name** | **string** | The name of the supplier in the transaction | [optional]
**customer_name** | **string** | The name of the customer in the transaction | [optional]
**document_type** | **string** | The document type | [optional]
**document_version** | **string** | The document version | [optional]
**document_number** | **string** | The document number | [optional]
**document_date** | **string** | The document issue date | [optional]
**flow** | **string** | The document direction, where issued &#x3D; &#x60;out&#x60; and received &#x3D; &#x60;in&#x60; | [optional]
**country_code** | **string** | The two-letter ISO-3166 country code for the country where the document is being submitted | [optional]
**country_mandate** | **string** | The e-invoicing mandate for the specified country | [optional]
**interface** | **string** | The interface where the document is sent | [optional]
**receiver** | **string** | The document recipient based on the interface | [optional]
**events** | [**\Avalara\SDK\Model\EInvoicing\V1\StatusEvent[]**](StatusEvent.md) | Array of status events associated with this document. Events are included in each document in the response only when the query parameter $include&#x3D;events is passed; otherwise the events array is not populated. | [optional]
**created_at** | **string** | The date and time when the document was created in the system, displayed in ISO 8601 format with timezone | [optional]
**last_updated_at** | **string** | The date and time when the document was last updated in the system, displayed in ISO 8601 format with timezone | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
