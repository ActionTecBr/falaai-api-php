<?php
require __DIR__ . '/../vendor/autoload.php';

use FalaAI\Configuration;
use FalaAI\Api\SpeechApi;

$config = (new Configuration())
    ->setHost(getenv('FALAAI_BASE_URL') ?: 'https://api01-falaai.action.tec.br')
    ->setAccessToken(getenv('FALAAI_API_KEY'));

$language = "pt";
$clientReferenceId = "call_202609271408";

# REQUIRED: file (audio) + Authorization (fai_ key)
# OPTIONAL (server defaults): model -> falaai-transcribe-1 | language -> pt | client_reference_id -> (empty)
[$transcription] = (new SpeechApi(null, $config))->createTranscriptionV1AudioTranscriptionsPostWithHttpInfo(
    new \SplFileObject("demo_callcenter.mp3"),
    "falaai-transcribe-1",
    $language,
    $clientReferenceId,
);
echo json_encode($transcription, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
