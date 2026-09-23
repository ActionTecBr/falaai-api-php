# WebhookItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Webhook id |
**user_id** | **string** | Owner user id |
**name** | **string** | Webhook name |
**url** | **string** | Destination URL |
**secret** | **string** | HMAC signing secret |
**events** | **string[]** | Subscribed events |
**active** | **bool** | Is active |
**retry_enabled** | **bool** | Retry enabled |
**last_delivery_at** | **string** | ISO 8601 of last delivery | [optional]
**last_status** | **int** | Last HTTP status delivered | [optional]
**failure_count** | **int** | Consecutive failures | [optional] [default to 0]
**created_at** | **string** | ISO 8601 created |
**updated_at** | **string** | ISO 8601 updated |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
