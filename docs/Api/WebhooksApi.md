# FalaAI\WebhooksApi



All URIs are relative to https://api01-falaai.action.tec.br, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createWebhookV1WebhooksPost()**](WebhooksApi.md#createWebhookV1WebhooksPost) | **POST** /v1/webhooks | Create webhook |
| [**deleteWebhookV1WebhooksWebhookIdDelete()**](WebhooksApi.md#deleteWebhookV1WebhooksWebhookIdDelete) | **DELETE** /v1/webhooks/{webhook_id} | Delete webhook |
| [**listWebhooksV1WebhooksGet()**](WebhooksApi.md#listWebhooksV1WebhooksGet) | **GET** /v1/webhooks | List webhooks |
| [**updateWebhookV1WebhooksWebhookIdPut()**](WebhooksApi.md#updateWebhookV1WebhooksWebhookIdPut) | **PUT** /v1/webhooks/{webhook_id} | Update webhook |


## `createWebhookV1WebhooksPost()`

```php
createWebhookV1WebhooksPost($create_webhook_request): \FalaAI\Model\WebhookItem
```

Create webhook

Creates a subscription for alert events (10 alerts). Payload delivered: WebhookPayload(event, data, timestamp) with HMAC FalaAI-Signature. To verify the origin, recompute HMAC-SHA256 of \"timestamp.body\" with your secret.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_webhook_request = new \FalaAI\Model\CreateWebhookRequest(); // \FalaAI\Model\CreateWebhookRequest

try {
    $result = $apiInstance->createWebhookV1WebhooksPost($create_webhook_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->createWebhookV1WebhooksPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_webhook_request** | [**\FalaAI\Model\CreateWebhookRequest**](../Model/CreateWebhookRequest.md)|  | |

### Return type

[**\FalaAI\Model\WebhookItem**](../Model/WebhookItem.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteWebhookV1WebhooksWebhookIdDelete()`

```php
deleteWebhookV1WebhooksWebhookIdDelete($webhook_id): \FalaAI\Model\MessageResponse
```

Delete webhook

Deletes a webhook subscription by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_id = 'webhook_id_example'; // string

try {
    $result = $apiInstance->deleteWebhookV1WebhooksWebhookIdDelete($webhook_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->deleteWebhookV1WebhooksWebhookIdDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_id** | **string**|  | |

### Return type

[**\FalaAI\Model\MessageResponse**](../Model/MessageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listWebhooksV1WebhooksGet()`

```php
listWebhooksV1WebhooksGet($page, $limit): \FalaAI\Model\WebhookListResponse
```

List webhooks

Lists the authenticated user's webhooks (10 alerts). Paginated. Includes the URL signature secret (always visible to the owner).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Pagina (1-indexed)
$limit = 20; // int | Itens por pagina (max 100)

try {
    $result = $apiInstance->listWebhooksV1WebhooksGet($page, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->listWebhooksV1WebhooksGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Pagina (1-indexed) | [optional] [default to 1] |
| **limit** | **int**| Itens por pagina (max 100) | [optional] [default to 20] |

### Return type

[**\FalaAI\Model\WebhookListResponse**](../Model/WebhookListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateWebhookV1WebhooksWebhookIdPut()`

```php
updateWebhookV1WebhooksWebhookIdPut($webhook_id, $update_webhook_request): \FalaAI\Model\MessageResponse
```

Update webhook

Updates the webhook's name/url/events/retry_enabled/active. Valid events: 10 alerts.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_id = 'webhook_id_example'; // string
$update_webhook_request = new \FalaAI\Model\UpdateWebhookRequest(); // \FalaAI\Model\UpdateWebhookRequest

try {
    $result = $apiInstance->updateWebhookV1WebhooksWebhookIdPut($webhook_id, $update_webhook_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->updateWebhookV1WebhooksWebhookIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_id** | **string**|  | |
| **update_webhook_request** | [**\FalaAI\Model\UpdateWebhookRequest**](../Model/UpdateWebhookRequest.md)|  | |

### Return type

[**\FalaAI\Model\MessageResponse**](../Model/MessageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
