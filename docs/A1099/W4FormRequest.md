# # W4FormRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | The form type (always \&quot;w4\&quot; for this model). | [optional] [readonly]
**employee_first_name** | **string** | The first name of the employee. |
**employee_middle_name** | **string** | The middle name of the employee. | [optional]
**employee_last_name** | **string** | The last name of the employee. |
**employee_name_suffix** | **string** | The name suffix of the employee. | [optional]
**tin_type** | **string** | Tax Identification Number (TIN) type. |
**tin** | **string** | The taxpayer identification number (TIN). |
**address** | **string** | The address of the employee. Required unless exempt. | [optional]
**city** | **string** | The city of residence of the employee. Required unless exempt. | [optional]
**state** | **string** | The state of residence of the employee. Required unless exempt. | [optional]
**zip** | **string** | The ZIP code of residence of the employee. Required unless exempt. | [optional]
**marital_status** | **string** | The marital status of the employee. Required unless exempt.  Available values:  - Single: Single or Married filing separately  - Married: Married filing jointly or qualifying surviving spouse  - MarriedBut: Head of household. Check only if you&#39;re unmarried and pay more than half the costs of keeping up a home for yourself and a qualifying individual. | [optional]
**last_name_differs** | **bool** | Indicates whether the last name differs from prior records. | [optional]
**num_allowances** | **int** | The number of allowances claimed by the employee. | [optional]
**other_dependents** | **int** | The number of dependents other than allowances. | [optional]
**non_job_income** | **float** | The amount of non-job income. | [optional]
**deductions** | **float** | The amount of deductions claimed. | [optional]
**additional_withheld** | **float** | The additional amount withheld. | [optional]
**exempt_from_withholding** | **bool** | Indicates whether the employee is exempt from withholding. | [optional]
**office_code** | **string** | The office code associated with the form. | [optional]
**e_delivery_consented_at** | **\DateTime** | The date when e-delivery was consented. | [optional]
**signature** | **string** | The signature of the form. | [optional]
**company_id** | **string** | The ID of the associated company. Required when creating a form. | [optional]
**reference_id** | **string** | A reference identifier for the form. | [optional]
**email** | **string** | The email address of the individual associated with the form. | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
