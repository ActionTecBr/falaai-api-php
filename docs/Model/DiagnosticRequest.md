# DiagnosticRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**model** | **string** | Analysis model. Always &#39;falaai-diagnostic-1&#39; | [optional] [default to 'falaai-diagnostic-1']
**text** | **string** | Plain transcript (fallback if dialog is empty). At least one of &#39;dialog&#39; or &#39;text&#39; required. Max 300,000 characters | [optional] [default to '']
**dialog** | **string** | Diarized transcript with speaker turns. PRIMARY source. At least one of &#39;dialog&#39; or &#39;text&#39; required. Speaker labels accepted (any case): &#39;Speaker N&#39;, &#39;Interlocutor N&#39;, &#39;Hablante N&#39;, &#39;Locutor N&#39;, &#39;Orador N&#39; (space or underscore). Normalized internally to &#39;Speaker N&#39; in the response. Max 300,000 characters | [optional] [default to '']
**audio_events** | [**\FalaAI\Model\DiagnosticAudioEvent[]**](DiagnosticAudioEvent.md) | Detected audio events with timestamps (required when using dialog) | [optional]
**language** | **string** | Transcript language. Required. Accepted: en-US, pt-BR, es-ES, es-MX, fr-FR, de-DE, it-IT, pt-PT, zh-CN, ja-JP, ko-KR, ar-SA, hi-IN, ru-RU, id-ID, tr-TR, nl-NL, pl-PL, vi-VN, th-TH, en-GB |
**response_language** | **string** | Language for the analysis results (labels, categories, levels). Can differ from &#39;language&#39; (input). If omitted, uses &#39;language&#39;. Accepted: en-US, es-ES, es-MX, pt-BR, fr-FR, de-DE, it-IT, pt-PT, zh-CN, ja-JP, ko-KR, ar-SA, hi-IN, ru-RU, id-ID, tr-TR, nl-NL, pl-PL, vi-VN, th-TH, en-GB. | [optional]
**duration_seconds** | **float** | Total audio duration in seconds. Required. Max 3h (10800s). |
**client_reference_id** | **string** | Optional client-supplied ID echoed verbatim in the response. Use to correlate/sync with your system. Accepted charset: [A-Za-z0-9._:-], max 128 chars. Not idempotency. | [optional]
**call_direction** | **string** | Who originated the call. inbound&#x3D;client called, outbound&#x3D;company called. If omitted, the LLM infers from context. | [optional]
**participants** | [**\FalaAI\Model\DiagnosticParticipant[]**](DiagnosticParticipant.md) | Explicit participant roles. If omitted, the LLM infers from the dialog. When provided, used as ground truth (no inference) and echoed in analysis.participants_identified. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
