# WhatsappConversationsResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier. Prefix &#39;wc-&#39; + UUID |
**object** | **string** | Object type. Always &#39;conversations&#39; |
**usage** | [**\FalaAI\Model\WhatsappUsage**](WhatsappUsage.md) | Usage and processing information |
**conversations** | [**\FalaAI\Model\WhatsappConversation[]**](WhatsappConversation.md) | Segmented conversations |
**client_reference_id** | **string** | Client-supplied ID echoed verbatim (if provided) | [optional]
**meta** | [**\FalaAI\Model\WhatsappMeta**](WhatsappMeta.md) | Segmentation parameters and counts |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
