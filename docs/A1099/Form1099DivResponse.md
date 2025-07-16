# # Form1099DivResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** |  | [optional] [readonly]
**created_at** | **\DateTime** |  | [optional]
**updated_at** | **\DateTime** |  | [optional]
**user_id** | **string** |  | [optional]
**state_and_local_withholding** | [**\Avalara\SDK\Model\A1099\V2\StateAndLocalWithholdingResponse**](StateAndLocalWithholdingResponse.md) |  | [optional]
**tin_type** | **string** |  | [optional]
**id** | **string** |  | [optional]
**issuer_id** | **string** |  | [optional]
**issuer_reference_id** | **string** |  | [optional]
**issuer_tin** | **string** |  | [optional]
**tax_year** | **int** |  | [optional]
**reference_id** | **string** |  | [optional]
**recipient_name** | **string** |  | [optional]
**recipient_tin** | **string** |  | [optional]
**recipient_second_name** | **string** |  | [optional]
**address** | **string** |  | [optional]
**address2** | **string** |  | [optional]
**city** | **string** |  | [optional]
**state** | **string** |  | [optional]
**zip** | **string** |  | [optional]
**recipient_email** | **string** |  | [optional]
**account_number** | **string** |  | [optional]
**office_code** | **string** |  | [optional]
**recipient_non_us_province** | **string** |  | [optional]
**country_code** | **string** |  | [optional]
**federal_e_file** | **bool** |  | [optional]
**postal_mail** | **bool** |  | [optional]
**state_e_file** | **bool** |  | [optional]
**tin_match** | **bool** |  | [optional]
**address_verification** | **bool** |  | [optional]
**federal_efile_status** | [**\Avalara\SDK\Model\A1099\V2\StatusDetail**](StatusDetail.md) |  | [optional]
**state_efile_status** | [**\Avalara\SDK\Model\A1099\V2\StateEfileStatusDetailApp[]**](StateEfileStatusDetailApp.md) |  | [optional]
**postal_mail_status** | [**\Avalara\SDK\Model\A1099\V2\StatusDetail**](StatusDetail.md) |  | [optional]
**tin_match_status** | [**\Avalara\SDK\Model\A1099\V2\StatusDetail**](StatusDetail.md) |  | [optional]
**address_verification_status** | [**\Avalara\SDK\Model\A1099\V2\StatusDetail**](StatusDetail.md) |  | [optional]
**validation_errors** | [**\Avalara\SDK\Model\A1099\V2\ValidationErrorApp[]**](ValidationErrorApp.md) |  | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
