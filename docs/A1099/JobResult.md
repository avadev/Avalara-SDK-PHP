# # JobResult

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  | [optional]
**type** | **string** |  | [optional]
**dry_run** | **bool** | Dry run. If &#x60;true&#x60;, this job only simulates the changes but doesn&#39;t actually persist them. | [optional]
**upsert** | **bool** | Upsert. If &#x60;true&#x60;, this job will first attempt to update existing records if matches can be found. Matches are done in the following order:  * Form ID  * Form Reference ID and tax year  * Form TIN and tax year | [optional]
**status** | **string** | Status of the job | [optional]
**error_message** | **string** |  | [optional]
**total_processed** | **int** | Total number of forms processed | [optional]
**total_rows** | **int** | Total number of forms in the request | [optional]
**updated_valid** | **int** | Number of forms updated and valid for e-filing and e-delivery | [optional]
**updated_no_email** | **int** | Number of forms updated and valid for e-filing but missing email or email is undeliverable | [optional]
**updated_invalid** | **int** | Number of forms updated but invalid for e-filing | [optional]
**skipped_duplicate** | **int** | Number of forms skipped because they would have updated a record already updated once in the request | [optional]
**skipped_invalid** | **int** | Number of forms skipped because they would have made a form invalid and the form is already e-filed or scheduled for e-filing | [optional]
**skipped_multiple_matches** | **int** | Number of forms skipped because they matched multiple forms | [optional]
**not_found** | **int** | Number of forms skipped because no matching form or issuer could be found | [optional]
**created_invalid** | **int** | Number of new forms created because no matching form could be found (and &#x60;upsert&#x60; was true) - with errors | [optional]
**created_no_email** | **int** | Number of new forms created because no matching form could be found (and &#x60;upsert&#x60; was true) - valid for e-filing but missing email or email is undeliverable | [optional]
**created_valid** | **int** | Number of new forms created because no matching form could be found (and &#x60;upsert&#x60; was true) - valid for e-filing and e-delivery | [optional]

[[Back to Model list]](../../../README.md#models) [[Back to API list]](../../../README.md#endpoints) [[Back to README]](../../../README.md)
