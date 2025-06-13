# # AuthorizedApiRequestModel

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**path** | **string** | The path and query of the API request you want to pre-authorize, omitting the leading /api/ | [optional]
**ttl** | **int** | Seconds until this AuthorizedApiRequest should expire, 3600 if omitted; values greater than 86400 will not be honored | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
