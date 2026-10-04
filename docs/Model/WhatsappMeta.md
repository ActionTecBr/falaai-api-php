# WhatsappMeta

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**file** | **string** | Uploaded file name |
**chat_txt** | **string** | chat.txt entry name inside the export |
**format** | **string** | Detected format: Android | iOS |
**date_format** | **string** | Date order used |
**timezone** | **string** | Timezone informed |
**start** | **string** | Window start (ISO) |
**end** | **string** | Window end (ISO) |
**gap_minutes** | **float** | Gap used to split conversations |
**min_messages** | **int** | Minimum messages per conversation |
**chars_per_minute** | **float** | Chars per minute used to estimate duration |
**turns** | **int** | Total parsed turns |
**system_lines** | **int** | System lines ignored |
**conversations_total** | **int** | Conversations before window filter |
**conversations_in_window** | **int** | Conversations overlapping the window |
**monologues_dropped** | **int** | Single-speaker conversations dropped |
**conversations_selected** | **int** | Final conversations returned |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
