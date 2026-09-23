# FalaAI\WebhooksApi



All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createWebhookV1WebhooksPost()**](WebhooksApi.md#createWebhookV1WebhooksPost) | **POST** /v1/webhooks | Criar webhook de alertas |
| [**deleteWebhookV1WebhooksWebhookIdDelete()**](WebhooksApi.md#deleteWebhookV1WebhooksWebhookIdDelete) | **DELETE** /v1/webhooks/{webhook_id} | Remover webhook |
| [**listWebhooksV1WebhooksGet()**](WebhooksApi.md#listWebhooksV1WebhooksGet) | **GET** /v1/webhooks | Listar webhooks de alertas |
| [**updateWebhookV1WebhooksWebhookIdPut()**](WebhooksApi.md#updateWebhookV1WebhooksWebhookIdPut) | **PUT** /v1/webhooks/{webhook_id} | Atualizar webhook |


## `createWebhookV1WebhooksPost()`

```php
createWebhookV1WebhooksPost($create_webhook_request): \FalaAI\Model\WebhookItem
```

Criar webhook de alertas

Cria inscricao para eventos de alerta (10 alertas). Payload enviado: WebhookPayload(event, data, timestamp) com HMAC FalaAI-Signature. Para comprovar a origem, recalcule HMAC-SHA256 de \"timestamp.body\" com seu secret (exemplos: /examples/download/python.zip e nodejs.zip, arquivo webhook_verify).

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

Remover webhook

Remove inscricao de webhook por ID.

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

Listar webhooks de alertas

Lista webhooks do usuario autenticado (10 alertas). Paginado. Inclui o secret da assinatura da URL (sempre visivel ao dono).

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

Atualizar webhook

Atualiza name/url/events/retry_enabled/active do webhook. Eventos validos: 10 alertas.

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
