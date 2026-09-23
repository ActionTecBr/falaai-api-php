# DiagnosticResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique analysis identifier. Prefix &#39;di-&#39; + UUID |
**response_language** | **string** | Language used in the response. E.g.: &#39;pt-BR&#39;, &#39;en-US&#39;, &#39;es-ES&#39; |
**object** | **string** | Object type. Always &#39;analysis&#39; |
**analysis** | [**\FalaAI\Model\DiagnosticAnalysisMap**](DiagnosticAnalysisMap.md) | The 6 conversation analyses (5 + participants) |
**usage** | [**\FalaAI\Model\DiagnosticUsage**](DiagnosticUsage.md) | Usage and processing information |
**client_reference_id** | **string** | Client-supplied ID echoed verbatim (if provided in request) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
