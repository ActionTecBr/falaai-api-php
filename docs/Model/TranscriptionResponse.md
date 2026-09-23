# TranscriptionResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique transcription identifier. Prefix &#39;tr-&#39; followed by UUID |
**object** | **string** | Returned object type. Always &#39;transcription&#39; |
**model** | **string** | Model used for transcription. Ex: &#39;falaai-transcribe-1&#39; |
**filename** | **string** | Original audio file name uploaded |
**processed_at** | **string** | Processing datetime in ISO 8601 UTC format |
**usage** | [**\FalaAI\Model\TranscriptionUsage**](TranscriptionUsage.md) | Usage and processing information |
**language** | **string** | ISO 639-3 language code detected in audio. Ex: &#39;por&#39; (Portuguese), &#39;eng&#39; (English), &#39;spa&#39; (Spanish) |
**language_confidence** | **float** | Language detection confidence level (0.0 to 1.0). Higher is more reliable | [optional]
**duration_seconds** | **float** | Total audio duration in seconds |
**text** | **string** | Full transcription as plain text, including audio events in brackets |
**dialog** | **string** | Turn-by-turn formatted transcript with speaker identification and start/end timestamps |
**audio_events** | [**\FalaAI\Model\AudioEvent[]**](AudioEvent.md) | List of detected audio events (laughs, sighs, pauses, etc) with timestamps and duration |
**event_types** | **string[]** | Unique audio event types found in transcription, alphabetically sorted |
**word_count** | **int** | Total number of recognized words in transcription |
**input** | [**\FalaAI\Model\AudioInputMeta**](AudioInputMeta.md) | Metadados do arquivo de audio enviado (duracao, formato, codec, sample rate, canais) |
**client_reference_id** | **string** | Client-supplied ID echoed verbatim (if provided in request) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
