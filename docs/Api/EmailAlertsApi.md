# FalaAI\EmailAlertsApi



All URIs are relative to https://api01-falaai.action.tec.br, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createEmailAlertV1EmailAlertsPost()**](EmailAlertsApi.md#createEmailAlertV1EmailAlertsPost) | **POST** /v1/email-alerts | Create email alert |
| [**deleteEmailAlertV1EmailAlertsAlertIdDelete()**](EmailAlertsApi.md#deleteEmailAlertV1EmailAlertsAlertIdDelete) | **DELETE** /v1/email-alerts/{alert_id} | Delete email alert |
| [**listEmailAlertsV1EmailAlertsGet()**](EmailAlertsApi.md#listEmailAlertsV1EmailAlertsGet) | **GET** /v1/email-alerts | List email alerts |
| [**updateEmailAlertV1EmailAlertsAlertIdPut()**](EmailAlertsApi.md#updateEmailAlertV1EmailAlertsAlertIdPut) | **PUT** /v1/email-alerts/{alert_id} | Update email alert |


## `createEmailAlertV1EmailAlertsPost()`

```php
createEmailAlertV1EmailAlertsPost($create_email_alert_request): \FalaAI\Model\EmailAlertItem
```

Create email alert

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\EmailAlertsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_email_alert_request = new \FalaAI\Model\CreateEmailAlertRequest(); // \FalaAI\Model\CreateEmailAlertRequest

try {
    $result = $apiInstance->createEmailAlertV1EmailAlertsPost($create_email_alert_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailAlertsApi->createEmailAlertV1EmailAlertsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_email_alert_request** | [**\FalaAI\Model\CreateEmailAlertRequest**](../Model/CreateEmailAlertRequest.md)|  | |

### Return type

[**\FalaAI\Model\EmailAlertItem**](../Model/EmailAlertItem.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteEmailAlertV1EmailAlertsAlertIdDelete()`

```php
deleteEmailAlertV1EmailAlertsAlertIdDelete($alert_id): \FalaAI\Model\EmailAlertMessageResponse
```

Delete email alert

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\EmailAlertsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$alert_id = 'alert_id_example'; // string

try {
    $result = $apiInstance->deleteEmailAlertV1EmailAlertsAlertIdDelete($alert_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailAlertsApi->deleteEmailAlertV1EmailAlertsAlertIdDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **alert_id** | **string**|  | |

### Return type

[**\FalaAI\Model\EmailAlertMessageResponse**](../Model/EmailAlertMessageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmailAlertsV1EmailAlertsGet()`

```php
listEmailAlertsV1EmailAlertsGet($page, $limit): \FalaAI\Model\EmailAlertListResponse
```

List email alerts

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\EmailAlertsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$limit = 20; // int

try {
    $result = $apiInstance->listEmailAlertsV1EmailAlertsGet($page, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailAlertsApi->listEmailAlertsV1EmailAlertsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **limit** | **int**|  | [optional] [default to 20] |

### Return type

[**\FalaAI\Model\EmailAlertListResponse**](../Model/EmailAlertListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmailAlertV1EmailAlertsAlertIdPut()`

```php
updateEmailAlertV1EmailAlertsAlertIdPut($alert_id, $update_email_alert_request): \FalaAI\Model\EmailAlertMessageResponse
```

Update email alert

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\EmailAlertsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$alert_id = 'alert_id_example'; // string
$update_email_alert_request = new \FalaAI\Model\UpdateEmailAlertRequest(); // \FalaAI\Model\UpdateEmailAlertRequest

try {
    $result = $apiInstance->updateEmailAlertV1EmailAlertsAlertIdPut($alert_id, $update_email_alert_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailAlertsApi->updateEmailAlertV1EmailAlertsAlertIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **alert_id** | **string**|  | |
| **update_email_alert_request** | [**\FalaAI\Model\UpdateEmailAlertRequest**](../Model/UpdateEmailAlertRequest.md)|  | |

### Return type

[**\FalaAI\Model\EmailAlertMessageResponse**](../Model/EmailAlertMessageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
