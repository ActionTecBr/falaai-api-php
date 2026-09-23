# CreateWebhookRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Nome identificador do webhook |
**url** | **string** | URL HTTPS que recebera POST com HMAC FalaAI-Signature |
**events** | [**\FalaAI\Model\WebhookEvent[]**](WebhookEvent.md) | Eventos subscritos (10 alertas) |
**retry_enabled** | **bool** | Retry exponencial 5 tentativas quando true (false&#x3D;1 tentativa) | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
