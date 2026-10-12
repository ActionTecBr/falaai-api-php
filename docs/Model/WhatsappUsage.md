# WhatsappUsage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**conversations** | **int** | Number of conversations returned |
**characters** | **int** | Total characters across conversations |
**expressions** | **int** | Expression tokens across conversations (sticker/emoji/gif) |
**voice_notes** | **int** | Voice notes (PTT) resolved to text |
**conversation_credits** | **int** | Credits for conversations (2 each) |
**expression_credits** | **float** | Credits for expressions (0.2 each) |
**audio_credits** | **float** | Credits for audio duration (0.2 per second) |
**credits_consumed** | **int** | Total credits &#x3D; ceil(conversation_credits + expression_credits + audio_credits) |
**processing_ms** | **int** | Total processing time in milliseconds |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
