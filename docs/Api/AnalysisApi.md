# FalaAI\AnalysisApi



All URIs are relative to https://api01-falaai.action.tec.br, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createDiagnosticV1AnalyzeDiagnosticPost()**](AnalysisApi.md#createDiagnosticV1AnalyzeDiagnosticPost) | **POST** /v1/analyze/diagnostic | Analyze a call transcript — 5 parallel analyses |
| [**createRiskAuditV1AnalyzeRiskAuditPost()**](AnalysisApi.md#createRiskAuditV1AnalyzeRiskAuditPost) | **POST** /v1/analyze/riskAudit | Compliance Risk Audit — conversation compliance analysis |


## `createDiagnosticV1AnalyzeDiagnosticPost()`

```php
createDiagnosticV1AnalyzeDiagnosticPost($diagnostic_request): \FalaAI\Model\DiagnosticResponse
```

Analyze a call transcript — 5 parallel analyses

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

## `createRiskAuditV1AnalyzeRiskAuditPost()`

```php
createRiskAuditV1AnalyzeRiskAuditPost($risk_audit_request): \FalaAI\Model\RiskAuditV2Response
```

Compliance Risk Audit — conversation compliance analysis

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
$risk_audit_request = new \FalaAI\Model\RiskAuditRequest(); // \FalaAI\Model\RiskAuditRequest

try {
    $result = $apiInstance->createRiskAuditV1AnalyzeRiskAuditPost($risk_audit_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalysisApi->createRiskAuditV1AnalyzeRiskAuditPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **risk_audit_request** | [**\FalaAI\Model\RiskAuditRequest**](../Model/RiskAuditRequest.md)|  | |

### Return type

[**\FalaAI\Model\RiskAuditV2Response**](../Model/RiskAuditV2Response.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
