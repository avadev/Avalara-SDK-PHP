# # Form1099R

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**gross_distributions** | **float** |  | [optional]
**taxable_amount** | **float** |  | [optional]
**taxable_amount_not_determined** | **bool** |  | [optional]
**total_distribution_indicator** | **bool** |  | [optional]
**capital_gain** | **float** |  | [optional]
**fed_income_tax_withheld** | **float** |  | [optional]
**employee_contributions** | **float** |  | [optional]
**net_unrealized_appreciation** | **float** |  | [optional]
**distribution_code_required** | **string** |  | [optional]
**distribution_code_optional** | **string** |  | [optional]
**ira_sep_simple_indicator** | **bool** |  | [optional]
**total_ira_sep_simple_distribution** | **float** |  | [optional]
**other** | **float** |  | [optional]
**other_percent** | **string** |  | [optional]
**percentage_total_distribution** | **string** |  | [optional]
**total_employee_contributions** | **float** |  | [optional]
**amount_allocable_to_irr** | **float** |  | [optional]
**first_year_designated_roth_contrib** | **string** |  | [optional]
**fatca_requirement_indicator** | **bool** |  | [optional]
**date_of_payment** | **string** |  | [optional]
**id** | **string** |  | [optional]
**type** | **string** |  | [optional]
**issuer_id** | **int** |  | [optional]
**issuer_reference_id** | **string** |  | [optional]
**issuer_tin** | **string** |  | [optional]
**tax_year** | **int** |  | [optional]
**federal_efile** | **bool** |  | [optional]
**federal_efile_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail**](Form1099StatusDetail.md) |  | [optional]
**state_efile** | **bool** |  | [optional]
**state_efile_status** | [**\Avalara\SDK\Model\A1099\V2\StateEfileStatusDetail[]**](StateEfileStatusDetail.md) |  | [optional]
**postal_mail** | **bool** |  | [optional]
**postal_mail_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail**](Form1099StatusDetail.md) |  | [optional]
**tin_match** | **bool** |  | [optional]
**tin_match_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail**](Form1099StatusDetail.md) |  | [optional]
**address_verification** | **bool** |  | [optional]
**address_verification_status** | [**\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail**](Form1099StatusDetail.md) |  | [optional]
**reference_id** | **string** |  | [optional]
**email** | **string** |  | [optional]
**tin_type** | **string** |  | [optional]
**tin** | **string** |  | [optional]
**recipient_name** | **string** |  | [optional]
**recipient_second_name** | **string** |  | [optional]
**address** | **string** |  | [optional]
**address2** | **string** |  | [optional]
**city** | **string** |  | [optional]
**state** | **string** |  | [optional]
**zip** | **string** |  | [optional]
**foreign_province** | **string** |  | [optional]
**country_code** | **string** |  | [optional]
**validation_errors** | [**\Avalara\SDK\Model\A1099\V2\ValidationError[]**](ValidationError.md) |  | [optional]
**created_at** | **\DateTime** |  | [optional]
**updated_at** | **\DateTime** |  | [optional]
**state_and_local_withholding** | [**\Avalara\SDK\Model\A1099\V2\StateAndLocalWithholding**](StateAndLocalWithholding.md) |  | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
