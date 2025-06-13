# # IssuerResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier set when the record is created | [optional] [readonly]
**name** | **string** | Legal name, not DBA | [optional]
**name_dba** | **string** | Optional DBA name or continuation of a long legal name | [optional]
**tin** | **string** | Tax identification number | [optional]
**reference_id** | **string** | Optional identifier for your reference, never shown to any agency or recipient.  We will also prefix download filenames with this value, if present.  Can only include letters, numbers, dashes, underscores and spaces. | [optional]
**telephone** | **string** | Telephone number | [optional]
**tax_year** | **int** | Tax year | [optional]
**country_code** | **string** | If there is a transfer agent, use the address of the transfer agent. | [optional]
**email** | **string** | Email address | [optional]
**address** | **string** | Address | [optional]
**city** | **string** | City | [optional]
**state** | **string** | State | [optional]
**zip** | **string** | Zip code | [optional]
**foreign_province** | **string** | Foreign province | [optional]
**transfer_agent_name** | **string** | Transfer Agent&#39;s Name | [optional]
**last_filing** | **bool** | Last year of filing for this payer | [optional]
**created_at** | **\DateTime** | Date time when the issuer was created | [optional] [readonly]
**updated_at** | **\DateTime** | Date time when the issuer was updated | [optional] [readonly]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
