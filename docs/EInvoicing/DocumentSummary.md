# # DocumentSummary

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The unique ID for this document | [optional]
**process_date_time** | **string** | The date and time when the document was processed, displayed in the format YYYY-MM-DDThh:mm:ss | [optional]
**status** | **string** | The transaction status: &lt;br&gt; &#39;Pending&#39; &lt;br&gt; &#39;Failed&#39; &lt;br&gt; &#39;Complete&#39; | [optional]
**supplier_name** | **string** | The name of the supplier in the transaction | [optional]
**customer_name** | **string** | The name of the customer in the transaction | [optional]
**document_number** | **string** | The invoice document number | [optional]
**document_date** | **string** | The invoice issue date | [optional]
**flow** | **string** | The invoice direction, where issued &#x3D; &#x60;out&#x60; and received &#x3D; &#x60;in&#x60; | [optional]
**country_code** | **string** | The two-letter ISO-3166 country code for the country where the e-invoice is being submitted | [optional]
**country_mandate** | **string** | The e-invoicing mandate for the specified country | [optional]
**interface** | **string** | The interface where the invoice data is sent | [optional]
**receiver** | **string** | The invoice recipient based on the interface | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
