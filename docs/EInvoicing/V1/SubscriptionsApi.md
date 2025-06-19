# Avalara\SDK\SubscriptionsApi

All URIs are relative to https://api.sbx.avalara.com/einvoicing.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createWebhookSubscription()**](SubscriptionsApi.md#createWebhookSubscription) | **POST** /webhooks/subscriptions | Create a subscription to events
[**deleteWebhookSubscription()**](SubscriptionsApi.md#deleteWebhookSubscription) | **DELETE** /webhooks/subscriptions/{subscription-id} | Unsubscribe from events
[**getWebhookSubscription()**](SubscriptionsApi.md#getWebhookSubscription) | **GET** /webhooks/subscriptions/{subscription-id} | Get details of a subscription
[**listWebhookSubscriptions()**](SubscriptionsApi.md#listWebhookSubscriptions) | **GET** /webhooks/subscriptions | List all subscriptions


## `createWebhookSubscription()`

```php
createWebhookSubscription($avalara_version, $subscription_registration, $x_correlation_id, $x_avalara_client): \Avalara\SDK\Model\EInvoicing\V1\SuccessResponse
```

Create a subscription to events

Create a subscription to events exposed by registered systems.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\SubscriptionsApi($client);

$avalara_version = 'avalara_version_example'; // string | The version of the API to use, e.g., \"1.3\".
$subscription_registration = new \Avalara\SDK\Model\EInvoicing\V1\SubscriptionRegistration(); // \Avalara\SDK\Model\EInvoicing\V1\SubscriptionRegistration
$x_correlation_id = 'x_correlation_id_example'; // string | A unique identifier for tracking the request and its response
$x_avalara_client = 'x_avalara_client_example'; // string | Client application identification

try {
    $result = $apiInstance->createWebhookSubscription($avalara_version, $subscription_registration, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->createWebhookSubscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The version of the API to use, e.g., \&quot;1.3\&quot;. |
 **subscription_registration** | [**\Avalara\SDK\Model\EInvoicing\V1\SubscriptionRegistration**](../Model/SubscriptionRegistration.md)|  |
 **x_correlation_id** | **string**| A unique identifier for tracking the request and its response | [optional]
 **x_avalara_client** | **string**| Client application identification | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\SuccessResponse**](../Model/SuccessResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `deleteWebhookSubscription()`

```php
deleteWebhookSubscription($subscription_id, $avalara_version, $x_correlation_id, $x_avalara_client)
```

Unsubscribe from events

Remove a subscription from the webhooks dispatch service. All events and subscriptions are also deleted.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\SubscriptionsApi($client);

$subscription_id = 'subscription_id_example'; // string
$avalara_version = 'avalara_version_example'; // string | The version of the API to use, e.g., \"1.3\".
$x_correlation_id = 'x_correlation_id_example'; // string | A unique identifier for tracking the request and its response
$x_avalara_client = 'x_avalara_client_example'; // string | Client application identification

try {
    $apiInstance->deleteWebhookSubscription($subscription_id, $avalara_version, $x_correlation_id, $x_avalara_client);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->deleteWebhookSubscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscription_id** | **string**|  |
 **avalara_version** | **string**| The version of the API to use, e.g., \&quot;1.3\&quot;. |
 **x_correlation_id** | **string**| A unique identifier for tracking the request and its response | [optional]
 **x_avalara_client** | **string**| Client application identification | [optional]

### Return type

void (empty response body)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `getWebhookSubscription()`

```php
getWebhookSubscription($subscription_id, $avalara_version, $x_correlation_id, $x_avalara_client): \Avalara\SDK\Model\EInvoicing\V1\SubscriptionDetail
```

Get details of a subscription

Retrieve details of a specific subscription.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\SubscriptionsApi($client);

$subscription_id = 'subscription_id_example'; // string
$avalara_version = 'avalara_version_example'; // string | The version of the API to use, e.g., \"1.3\".
$x_correlation_id = 'x_correlation_id_example'; // string | A unique identifier for tracking the request and its response
$x_avalara_client = 'x_avalara_client_example'; // string | Client application identification

try {
    $result = $apiInstance->getWebhookSubscription($subscription_id, $avalara_version, $x_correlation_id, $x_avalara_client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->getWebhookSubscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscription_id** | **string**|  |
 **avalara_version** | **string**| The version of the API to use, e.g., \&quot;1.3\&quot;. |
 **x_correlation_id** | **string**| A unique identifier for tracking the request and its response | [optional]
 **x_avalara_client** | **string**| Client application identification | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\SubscriptionDetail**](../Model/SubscriptionDetail.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)

## `listWebhookSubscriptions()`

```php
listWebhookSubscriptions($avalara_version, $x_correlation_id, $x_avalara_client, $top, $skip, $count, $count_only): \Avalara\SDK\Model\EInvoicing\V1\SubscriptionListResponse
```

List all subscriptions

Retrieve a list of all subscriptions.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP OAUTH2 Access Token and other config options
$config = new \Avalara\SDK\Configuration()
              ->setBearerToken('YOUR_JWT_ACCESS_TOKEN')
              ->setAppName('YOUR_APP_NAME')
              ->setEnvironment('sandbox')
              ->setMachineName('YOUR_MACHINE_NAME')
              ->setAppVersion('YOUR_APP_VERSION');

$client = new \Avalara\SDK\ApiClient($config);

$apiInstance = new Avalara\SDK\Api\SubscriptionsApi($client);

$avalara_version = 'avalara_version_example'; // string | The version of the API to use, e.g., \"1.3\".
$x_correlation_id = 'x_correlation_id_example'; // string | A unique identifier for tracking the request and its response
$x_avalara_client = 'x_avalara_client_example'; // string | Client application identification
$top = 56; // int | The number of items to include in the result.
$skip = 56; // int | The number of items to skip in the result.
$count = True; // bool | Whether to include the total count of records in the result.
$count_only = True; // bool | Whether to return only the count of records, without the list of records.

try {
    $result = $apiInstance->listWebhookSubscriptions($avalara_version, $x_correlation_id, $x_avalara_client, $top, $skip, $count, $count_only);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->listWebhookSubscriptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **avalara_version** | **string**| The version of the API to use, e.g., \&quot;1.3\&quot;. |
 **x_correlation_id** | **string**| A unique identifier for tracking the request and its response | [optional]
 **x_avalara_client** | **string**| Client application identification | [optional]
 **top** | **int**| The number of items to include in the result. | [optional]
 **skip** | **int**| The number of items to skip in the result. | [optional]
 **count** | **bool**| Whether to include the total count of records in the result. | [optional]
 **count_only** | **bool**| Whether to return only the count of records, without the list of records. | [optional]

### Return type

[**\Avalara\SDK\Model\EInvoicing\V1\SubscriptionListResponse**](../Model/SubscriptionListResponse.md)

### Authorization

[Bearer](../../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../README.md#endpoints)
[[Back to Model list]](../../../README.md#models)
[[Back to README]](../../../README.md)
