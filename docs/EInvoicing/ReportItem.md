# # ReportItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**report_id** | **string** | The unique ID for this report. | [optional]
**job_id** | **string** | The unique ID of the job that generated this report. | [optional]
**report_generate_date** | **\DateTime** | The date and time when the report was generated. | [optional]
**report_from** | **\DateTime** | The start date of the reporting period. | [optional]
**report_to** | **\DateTime** | The end date of the reporting period. | [optional]
**country_code** | **string** | The two-letter ISO-3166 country code for which this report was generated. | [optional]
**country_mandate** | **string** | The e-invoicing mandate for the specified country. | [optional]
**document_type** | **string** | The type of document covered by this report. | [optional]
**document_sub_type** | **string** | The sub-type of the document. | [optional]
**report_reference** | **string** | An internal reference path for the report. | [optional]
**report_name** | **string** | The name of the report file. | [optional]
**status** | **string** | The current status of the report. Possible values include: PENDING, PROCESSING, COMPLETED, FAILED, SENT_TO_PPF, ERROR. | [optional]
**report_format_mimetypes** | **string** | The MIME type of the report file. | [optional]
**tenant_id** | **string** | The tenant identifier associated with this report. | [optional]
**ta_name** | **string** | The name of the tax authority for this report. | [optional]
**tax_invoice_amount** | **float** | The total invoice amount covered by this report. | [optional]
**total_tax_amount** | **float** | The total tax amount covered by this report. | [optional]
**metadata** | **object** | Additional report metadata (free-form JSON). Contents vary by country mandate. | [optional]
**transaction_ids** | **string[]** | List of transaction IDs associated with this report. | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
