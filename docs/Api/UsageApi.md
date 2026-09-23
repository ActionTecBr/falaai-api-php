# FalaAI\UsageApi



All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getUsageByKeyV1UsageByKeyGet()**](UsageApi.md#getUsageByKeyV1UsageByKeyGet) | **GET** /v1/usage/by-key | Get Usage By Key |
| [**getUsageLogV1UsageLogGet()**](UsageApi.md#getUsageLogV1UsageLogGet) | **GET** /v1/usage/log | Get Usage Log |


## `getUsageByKeyV1UsageByKeyGet()`

```php
getUsageByKeyV1UsageByKeyGet($key_id): \FalaAI\Model\UsageByKeyItem[]
```

Get Usage By Key

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\UsageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 'key_id_example'; // string

try {
    $result = $apiInstance->getUsageByKeyV1UsageByKeyGet($key_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsageApi->getUsageByKeyV1UsageByKeyGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **string**|  | [optional] |

### Return type

[**\FalaAI\Model\UsageByKeyItem[]**](../Model/UsageByKeyItem.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUsageLogV1UsageLogGet()`

```php
getUsageLogV1UsageLogGet($page, $limit, $api_key_id): \FalaAI\Model\UsageLogResponse
```

Get Usage Log

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\UsageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$limit = 20; // int
$api_key_id = 'api_key_id_example'; // string

try {
    $result = $apiInstance->getUsageLogV1UsageLogGet($page, $limit, $api_key_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsageApi->getUsageLogV1UsageLogGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **limit** | **int**|  | [optional] [default to 20] |
| **api_key_id** | **string**|  | [optional] |

### Return type

[**\FalaAI\Model\UsageLogResponse**](../Model/UsageLogResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
