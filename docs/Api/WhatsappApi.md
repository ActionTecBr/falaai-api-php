# FalaAI\WhatsappApi



All URIs are relative to https://api01-falaai.action.tec.br, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**extractConversationsV1WhatsappExtractConversationsPost()**](WhatsappApi.md#extractConversationsV1WhatsappExtractConversationsPost) | **POST** /v1/whatsapp/extractConversations | Extract and segment WhatsApp conversations from an export |


## `extractConversationsV1WhatsappExtractConversationsPost()`

```php
extractConversationsV1WhatsappExtractConversationsPost($file, $start, $end, $timezone, $date_format, $gap_minutes, $min_messages, $chars_per_minute, $client_reference_id): \FalaAI\Model\WhatsappConversationsResponse
```

Extract and segment WhatsApp conversations from an export

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\WhatsappApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = '/path/to/file.txt'; // \SplFileObject
$start = 'start_example'; // string
$end = 'end_example'; // string
$timezone = 'timezone_example'; // string
$date_format = 'date_format_example'; // string
$gap_minutes = 720; // float
$min_messages = 2; // int
$chars_per_minute = 800; // float
$client_reference_id = 'client_reference_id_example'; // string

try {
    $result = $apiInstance->extractConversationsV1WhatsappExtractConversationsPost($file, $start, $end, $timezone, $date_format, $gap_minutes, $min_messages, $chars_per_minute, $client_reference_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WhatsappApi->extractConversationsV1WhatsappExtractConversationsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file** | **\SplFileObject****\SplFileObject**|  | |
| **start** | **string**|  | |
| **end** | **string**|  | |
| **timezone** | **string**|  | |
| **date_format** | **string**|  | |
| **gap_minutes** | **float**|  | [optional] [default to 720] |
| **min_messages** | **int**|  | [optional] [default to 2] |
| **chars_per_minute** | **float**|  | [optional] [default to 800] |
| **client_reference_id** | **string**|  | [optional] |

### Return type

[**\FalaAI\Model\WhatsappConversationsResponse**](../Model/WhatsappConversationsResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
