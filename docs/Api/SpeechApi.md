# FalaAI\SpeechApi



All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createTranscriptionV1AudioTranscriptionsPost()**](SpeechApi.md#createTranscriptionV1AudioTranscriptionsPost) | **POST** /v1/audio/transcriptions | Transcribe audio to text |


## `createTranscriptionV1AudioTranscriptionsPost()`

```php
createTranscriptionV1AudioTranscriptionsPost($file, $model, $language, $client_reference_id): \FalaAI\Model\TranscriptionResponse
```

Transcribe audio to text

Upload an audio file and receive transcription with speaker diarization, audio events, and dialog.  **Supported formats:** .mp3, .mp4, .m4a, .wav, .flac, .ogg, .webm, .aac, .opus  **Limits:** - Maximum audio duration: 3 hours - Maximum file size: 1GB - Cost: 1 credit per second of audio (rounded up), minimum 1 credit  **Supported languages:** pt, en, es, fr, de, it, ja, ko, nl, pl, ru, tr, zh, vi, id, th, ar, hi, cs, da, el, fi, he, hu, ms, no, ro, sk, sv, ta, uk  **Python:** ```python import httpx  response = httpx.post(     'https://api.fala.ai/v1/audio/transcriptions',     headers={'Authorization': 'Bearer fai_xxx'},     files={'file': open('call.mp3', 'rb')},     data={'model': 'falaai-transcribe-1', 'language': 'pt'} ) print(response.json()) ```  **cURL:** ```bash curl https://api.fala.ai/v1/audio/transcriptions \\   -H 'Authorization: Bearer fai_xxx' \\   -F 'file=@call.mp3' \\   -F 'model=falaai-transcribe-1' \\   -F 'language=pt' ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (fai_xxx) authorization: ApiKeyAuth
$config = FalaAI\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new FalaAI\Api\SpeechApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = '/path/to/file.txt'; // \SplFileObject
$model = 'falaai-transcribe-1'; // string
$language = 'pt'; // string
$client_reference_id = 'client_reference_id_example'; // string | Optional client-supplied ID echoed verbatim in the response. Use to correlate/sync with your system. Accepted charset: [A-Za-z0-9._:-]. Not idempotency.

try {
    $result = $apiInstance->createTranscriptionV1AudioTranscriptionsPost($file, $model, $language, $client_reference_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SpeechApi->createTranscriptionV1AudioTranscriptionsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file** | **\SplFileObject****\SplFileObject**|  | |
| **model** | **string**|  | [optional] [default to &#39;falaai-transcribe-1&#39;] |
| **language** | **string**|  | [optional] [default to &#39;pt&#39;] |
| **client_reference_id** | **string**| Optional client-supplied ID echoed verbatim in the response. Use to correlate/sync with your system. Accepted charset: [A-Za-z0-9._:-]. Not idempotency. | [optional] |

### Return type

[**\FalaAI\Model\TranscriptionResponse**](../Model/TranscriptionResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
