# UpdateWebhookRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Nome identificador | [optional]
**url** | **string** | URL HTTPS destino | [optional]
**events** | [**\FalaAI\Model\WebhookEvent[]**](WebhookEvent.md) | Eventos subscritos | [optional]
**retry_enabled** | **bool** | Habilita retry exponencial | [optional]
**active** | **bool** | Ativa/desativa sem deletar | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
