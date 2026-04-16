# # ReportListResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**at_recordset_count** | **string** | Count of reports matching the filter for the given query. Present when the request includes $count&#x3D;true. | [optional]
**at_next_link** | **string** | URL to retrieve the next page of results when more items match the query. Omitted or null when there is no next page. | [optional]
**value** | [**\AvalaraSDK\Model\EInvoicing\V1\ReportItem[]**](ReportItem.md) | Array of reports matching the query parameters. |

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
