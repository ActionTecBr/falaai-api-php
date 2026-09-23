# AuditoriaRiscoRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**model** | **string** | Analysis model. Always &#39;falaai-auditoria-risco-1&#39; | [optional] [default to 'falaai-auditoria-risco-1']
**text** | **string** | Plain transcript (fallback if dialog is empty). At least one of &#39;dialog&#39; or &#39;text&#39; required. Max 300,000 characters | [optional] [default to '']
**dialog** | **string** | Diarized transcript with speaker turns. PRIMARY source. Speaker labels accepted (any case): &#39;Speaker N&#39;, &#39;Interlocutor N&#39;, &#39;Hablante N&#39;, &#39;Locutor N&#39;, &#39;Orador N&#39; (space or underscore). Normalized internally to &#39;Speaker N&#39; in the response. Max 300,000 characters | [optional] [default to '']
**audio_events** | [**\FalaAI\Model\DiagnosticAudioEvent[]**](DiagnosticAudioEvent.md) | Audio events with timestamps (correlated with turns when diarization is present) | [optional]
**duration_seconds** | **float** | Total audio duration in seconds. Required. Max 3h (10800s). |
**language** | **string** | Language of the transcript being analyzed. Must match the dialog/text language. Accepted: pt-BR, en-US, es-ES. |
**response_language** | **string** | Language for analysis results (labels, categories, levels, actions, HTML report). Can differ from &#39;language&#39;. Accepted: pt-BR, en-US, es-ES. |
**call_direction** | **string** | Who originated the call. inbound&#x3D;client called, outbound&#x3D;company called. If omitted, LLM infers from context. | [optional]
**participants** | [**\FalaAI\Model\Participant[]**](Participant.md) | Explicit participant roles. If omitted, LLM infers from dialog (Lei 17). When provided, used as ground truth â€” no inference. | [optional]
**response_format** | **string** | Response format version. v1&#x3D;legacy flat PT-BR, v2&#x3D;structured EN-US blocks. | [optional] [default to 'v2']
**client_reference_id** | **string** | Optional client-supplied ID echoed verbatim in the response. Use to correlate/sync with your system. Accepted charset: [A-Za-z0-9._:-], max 128 chars. Not idempotency. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
