# FalaAI\AnalysisApi



All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createAuditoriaRiscoV1AnalyzeAuditoriaRiscoPost()**](AnalysisApi.md#createAuditoriaRiscoV1AnalyzeAuditoriaRiscoPost) | **POST** /v1/analyze/auditoriaRisco | Compliance Risk Audit â€” conversation compliance analysis |
| [**createDiagnosticV1AnalyzeDiagnosticPost()**](AnalysisApi.md#createDiagnosticV1AnalyzeDiagnosticPost) | **POST** /v1/analyze/diagnostic | Analyze a call transcript â€” 5 parallel analyses |


## `createAuditoriaRiscoV1AnalyzeAuditoriaRiscoPost()`

```php
createAuditoriaRiscoV1AnalyzeAuditoriaRiscoPost($auditoria_risco_request): \FalaAI\Model\AuditoriaRiscoV2Response
```

Compliance Risk Audit â€” conversation compliance analysis

Analyzes a call transcript for compliance risks. Returns a score (0-100), classification level, violations, positives, and a detailed HTML report.  **Python:** ```python import httpx  response = httpx.post(     'https://api01-falaai.action.tec.br/v1/analyze/auditoriaRisco',     headers={'Authorization': 'Bearer fai_xxx'},     json={         'dialog': 'Speaker 1: [00:00:00.540 - 00:00:01.139] Hi, Alex.',         'duration_seconds': 151.0,         'language': 'pt-BR',         'response_language': 'en-US'     } ) print(response.json()) ```  **cURL:** ```bash curl https://api01-falaai.action.tec.br/v1/analyze/auditoriaRisco \\   -H 'Authorization: Bearer fai_xxx' \\   -H 'Content-Type: application/json' \\   -d '{     \"dialog\": \"Speaker 1: [00:00:00.540 - 00:00:01.139] Hi, Alex.\",     \"duration_seconds\": 151.0,     \"language\": \"pt-BR\",     \"response_language\": \"en-US\"   }' ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\AnalysisApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$auditoria_risco_request = new \FalaAI\Model\AuditoriaRiscoRequest(); // \FalaAI\Model\AuditoriaRiscoRequest

try {
    $result = $apiInstance->createAuditoriaRiscoV1AnalyzeAuditoriaRiscoPost($auditoria_risco_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalysisApi->createAuditoriaRiscoV1AnalyzeAuditoriaRiscoPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **auditoria_risco_request** | [**\FalaAI\Model\AuditoriaRiscoRequest**](../Model/AuditoriaRiscoRequest.md)|  | |

### Return type

[**\FalaAI\Model\AuditoriaRiscoV2Response**](../Model/AuditoriaRiscoV2Response.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createDiagnosticV1AnalyzeDiagnosticPost()`

```php
createDiagnosticV1AnalyzeDiagnosticPost($diagnostic_request): \FalaAI\Model\DiagnosticResponse
```

Analyze a call transcript â€” 5 parallel analyses

Runs 5 independent analyses on a call transcript: dialogue summary, contact reason, identified action, label classification, and sentiment.  **Python:** ```python import httpx  response = httpx.post(     'https://api01-falaai.action.tec.br/v1/analyze/diagnostic',     headers={'Authorization': 'Bearer fai_xxx'},     json={         'dialog': 'Speaker 1: [00:00:00.540 - 00:00:01.139] Hi, Alex.',         'language': 'pt-BR',         'duration_seconds': 151.0     } ) print(response.json()) ```  **cURL:** ```bash curl https://api01-falaai.action.tec.br/v1/analyze/diagnostic \\   -H 'Authorization: Bearer fai_xxx' \\   -H 'Content-Type: application/json' \\   -d '{     \"dialog\": \"Speaker 1: [00:00:00.540 - 00:00:01.139] Hi, Alex.\",     \"language\": \"pt-BR\",     \"duration_seconds\": 151.0   }' ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\AnalysisApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$diagnostic_request = new \FalaAI\Model\DiagnosticRequest(); // \FalaAI\Model\DiagnosticRequest

try {
    $result = $apiInstance->createDiagnosticV1AnalyzeDiagnosticPost($diagnostic_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalysisApi->createDiagnosticV1AnalyzeDiagnosticPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **diagnostic_request** | [**\FalaAI\Model\DiagnosticRequest**](../Model/DiagnosticRequest.md)|  | |

### Return type

[**\FalaAI\Model\DiagnosticResponse**](../Model/DiagnosticResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
