# WhatsappConversation

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**conversation_id** | **string** | Conversation identifier in the batch |
**first_at** | **string** | Real start (wall-clock, ISO) |
**last_at** | **string** | Real end (wall-clock, ISO) |
**duration_seconds** | **float** | (last - first) + last turn duration |
**speakers** | [**\FalaAI\Model\WhatsappSpeaker[]**](WhatsappSpeaker.md) | Speakers of THIS conversation (dynamic) |
**dialog** | **string** | Lines &#39;Speaker N: [HH:MM:SS.mmm - HH:MM:SS.mmm] text&#39; (real offset) |
**message_count** | **int** | Number of messages |
**characters** | **int** | Total characters of the conversation |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
