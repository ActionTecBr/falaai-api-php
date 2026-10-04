# actiontecbr/falaai-api — PHP SDK for Conversation Intelligence, Speech Analytics & Compliance

[![Packagist version](https://img.shields.io/packagist/v/actiontecbr/falaai-api)](https://packagist.org/packages/actiontecbr/falaai-api)
[![License: MIT](https://img.shields.io/badge/license-MIT-green)](LICENSE)
[![CI](https://github.com/ActionTecBr/falaai-api-php/actions/workflows/ci.yml/badge.svg)](https://github.com/ActionTecBr/falaai-api-php/actions/workflows/ci.yml)
[![Docs](https://img.shields.io/badge/docs-GitHub%20Pages-blue)](https://actiontecbr.github.io/falaai-api-php/)

Official **PHP SDK** for the **FalaAI API** — transcribe audio, analyze conversations and audit compliance (COPC CX, ISO 18295-1). **Use each API independently or combine them into your own pipeline.**

> Analyze calls, contact-center recordings, voice notes, chat and email. Get speaker-separated transcripts, summaries, reasons, actions, sentiment and a **compliance risk score**.

## Use any FalaAI API independently

FalaAI is a set of **independent REST APIs**. You **do not** need FalaAI Transcription to use FalaAI analysis or compliance auditing. If your application already has a transcript, send that text straight to the analysis APIs.

| If you have... | Use |
|---|---|
| Audio but no transcript | `SpeechApi` — Transcription |
| An existing transcript | `AnalysisApi` — Diagnostic |
| A transcript needing compliance analysis | `AnalysisApi` — Risk Audit |
| An existing transcript needing both | Diagnostic + Risk Audit |
| Your own STT provider (Whisper, Deepgram...) | Skip FalaAI Transcription |

```text
Your STT                             ->  FalaAI Diagnostic  ->  FalaAI Risk Audit
Telegram voice -> your STT           ->  FalaAI Risk Audit
3CX / Asterisk / Genesys transcript  ->  FalaAI Diagnostic  ->  FalaAI Risk Audit
CRM conversation                     ->  FalaAI Risk Audit
```

## Install

```bash
composer require actiontecbr/falaai-api
```

Requires **PHP 8.1+** (`ext-curl`, `ext-json`, `ext-mbstring`).

## Quickstart

### 1. Get an API key
Create a free account and copy your `fai_` key: <https://falaai.action.tec.br/api/auth> (or the [Dashboard](https://falaai.action.tec.br/api/dashboard)).

### 2. Set environment variables

```bash
FALAAI_BASE_URL=https://api01-falaai.action.tec.br
FALAAI_API_KEY=fai_xxxxxxxx
```

### 3. Transcribe a call (audio -> text)

```php
<?php
require 'vendor/autoload.php';

use FalaAI\Configuration;
use FalaAI\Api\SpeechApi;

$config = (new Configuration())
    ->setHost(getenv('FALAAI_BASE_URL') ?: 'https://api01-falaai.action.tec.br')
    ->setAccessToken(getenv('FALAAI_API_KEY'));

[$transcription] = (new SpeechApi(null, $config))->createTranscriptionV1AudioTranscriptionsPostWithHttpInfo(
    new SplFileObject('call.mp3'),
    'falaai-transcribe-1',
    'pt',
    'call_202609271408'
);

echo json_encode($transcription, JSON_PRETTY_PRINT), PHP_EOL;
```

Expected response (abridged):

```json
{
  "id": "tr-...",
  "object": "transcription",
  "model": "falaai-transcribe-1",
  "language": "por",
  "duration_seconds": 25.0,
  "text": "...",
  "dialog": "Speaker 1: [...] ...",
  "usage": { "audio_seconds": 25.0, "credits_consumed": 25, "processing_ms": 951 }
}
```

> Only need analysis? **Skip step 3** and call `AnalysisApi` with your own transcript (use the `text` field for a plain transcript).

### 4. Analyze or audit an existing transcript (no transcription needed)

```php
<?php
use FalaAI\Configuration;
use FalaAI\Api\AnalysisApi;
use FalaAI\Model\DiagnosticRequest;
use FalaAI\Model\RiskAuditRequest;

$config = (new Configuration())
    ->setHost(getenv('FALAAI_BASE_URL'))
    ->setAccessToken(getenv('FALAAI_API_KEY'));
$analysis = new AnalysisApi(null, $config);

$transcript = 'Good morning, how can I help? I need to cancel my subscription.';

// 5 analyses in one call: summary, reason, action, topic, sentiment
[$diagnostic] = $analysis->createDiagnosticV1AnalyzeDiagnosticPostWithHttpInfo(
    new DiagnosticRequest(['text' => $transcript, 'language' => 'pt-BR', 'duration_seconds' => 81.46])
);

// Compliance risk score + violations + auditable report
[$audit] = $analysis->createRiskAuditV1AnalyzeRiskAuditPostWithHttpInfo(
    new RiskAuditRequest(['text' => $transcript, 'language' => 'pt-BR', 'response_language' => 'pt-BR', 'duration_seconds' => 81.46])
);
```

## What is FalaAI API?

FalaAI API is an **AI conversation-intelligence API** for analyzing customer-service, contact-center, sales, messaging and other business conversations. It combines speech-to-text (with speaker diarization and audio-event detection), conversation analysis (summary, contact reason, action taken, topic classification, sentiment) and a **compliance/risk audit** against **COPC CX** and **ISO 18295-1**. Conversation content is processed and discarded (zero-storage).

## What can you do with FalaAI?

- **Transcribe** audio to text with speaker separation and audio events.
- **Diagnose** a conversation: summary, reason, action taken, topic and sentiment.
- **Audit** conversations: compliance risk score, detections/violations and an auditable HTML report.
- **Track usage**, **manage webhooks** and **email alerts**, and **health/version** checks.

## Use cases

- **Contact center / Quality** - audit 100% of conversations instead of a sample.
- **Compliance / Legal** - auditable evidence for audits and disputes.
- **CX / Operations** - risk score, sentiment and reason per conversation.
- **BI / Data** - typed JSON ready for your database or analytics stack.

## Why FalaAI

- **Audit 100%, not a sample** - every conversation gets a score, not a random QA sample.
- **Auditable by design** - a compliance risk score with detections/violations and an HTML report you can hand to an auditor.
- **Credits, not tokens** - you know exactly what each call costs (per second of audio, per character of text, per conversation). Monthly plans + non-expiring top-up packs.
- **Zero-storage** - audio/text/results are processed and discarded; only usage/audit records remain. TLS in transit + at rest, per-account isolation (multitenancy), LGPD (you are the controller; Action Tec is the processor).
- **3 native languages** (PT/EN/ES) · **start free** (no card).
- **B2B ready** - one Enterprise plan serves N clients, no per-user fee (ideal for ISVs).

## Integrations

FalaAI is **language-independent** - integrate at **any point** of your pipeline (capture, transcription, analysis or audit). Common ecosystems:

| Ecosystem | How |
|---|---|
| **PABX / telephony (3CX, Asterisk, Genesys)** | Send the recording to Transcribe, or the transcript to Diagnostic/Risk Audit. |
| **CRM / ERP (Odoo, Salesforce, SAP Service Cloud, HubSpot)** | Attach the structured JSON (summary, reason, sentiment, risk score) to the record. |
| **Contact center / QA (Zendesk, Twilio Flex, Take Blip)** | Batch-audit conversations and feed the score into your QA dashboard. |
| **Chatbots / messaging (WhatsApp, Telegram, Microsoft Teams)** | Extract conversations from an export and analyze them. |
| **BI / Data** | Typed JSON ready for your warehouse or analytics stack. |

> These are **integration examples**, not certified native integrations. Any platform can integrate through **REST / cURL** - the standard, language-independent path. Native ingestion connectors are on the roadmap.

## BYOT - Bring Your Own Transcription

Already have speech-to-text (Whisper, Deepgram, AssemblyAI, your own)? **Skip Transcription** and send the text straight to **Diagnostic** and/or **Risk Audit**. You only pay for what you use.

## SDK surface (PHP)

| Class | Namespace | Purpose |
|---|---|---|
| `Configuration` | `FalaAI` | `setHost()`, `setAccessToken()` |
| `HealthApi` | `FalaAI\Api` | `healthCheck()` |
| `SpeechApi` | `FalaAI\Api` | `createTranscriptionV1AudioTranscriptionsPostWithHttpInfo(...)` |
| `AnalysisApi` | `FalaAI\Api` | `createDiagnosticV1AnalyzeDiagnosticPostWithHttpInfo(...)`, `createRiskAuditV1AnalyzeRiskAuditPostWithHttpInfo(...)` |
| `WhatsappApi` | `FalaAI\Api` | `extractConversationsV1WhatsappExtractConversationsPostWithHttpInfo(...)` |
| `UsageApi` / `WebhooksApi` / `EmailAlertsApi` / `VersionApi` | `FalaAI\Api` | management |
| Models | `FalaAI\Model` | `DiagnosticRequest`, `RiskAuditRequest`, `Participant`, `DiagnosticAudioEvent`, `WhatsappConversationsResponse` |
| `ApiException` | `FalaAI` | HTTP errors |

> Model IDs: `falaai-transcribe-1`, `falaai-diagnostic-1`, `falaai-risk-audit-1`.

## Examples

Runnable examples in [`examples/`](./examples): `health.php`, `transcribe.php`, `diagnose.php`, `audit.php`, `whatsapp.php`.

## Authentication

Every request requires `Authorization: Bearer fai_<your_key>` — except the public endpoints (`GET/HEAD /v1/health`, `GET /api/version`). Set the key with `Configuration::setAccessToken()` (or `FALAAI_API_KEY`).

## Error handling

Non-2xx responses throw `FalaAI\ApiException`.

```php
<?php
use FalaAI\ApiException;

try {
    $health = (new \FalaAI\Api\HealthApi(null, $config))->healthCheck();
} catch (ApiException $e) {
    echo 'HTTP ' . $e->getCode() . ': ' . $e->getMessage();
}
```

## Production usage

- Store API keys in environment variables or a secret manager — never hard-code.
- Reuse the `Configuration` across requests.
- Handle `FalaAI\ApiException` explicitly.

## Compatibility

| Requirement | Version |
|---|---|
| PHP | 8.1+ |
| API | v1.21.51 |

## Documentation

- **SDK docs (this language):** <https://actiontecbr.github.io/falaai-api-php/>
- **API reference (Swagger UI):** <https://api01-falaai.action.tec.br/docs>
- **OpenAPI contract:** <https://api01-falaai.action.tec.br/openapi.json>
- **Sandbox:** <https://falaai.action.tec.br/api#playground>
- **Quickstart:** <https://falaai.action.tec.br/api/quickstart>
- **Product page:** <https://falaai.action.tec.br/api>

## Versioning

Semantic versioning; the SDK version tracks the API version (`1.21.51`). See [CHANGELOG.md](CHANGELOG.md) and [Releases](https://github.com/ActionTecBr/falaai-api-php/releases).

## Security

See [SECURITY.md](SECURITY.md). Never commit real keys — use environment variables.

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md).

## License

[MIT](LICENSE).

## Links

- Website: <https://falaai.action.tec.br>
- API base URL: <https://api01-falaai.action.tec.br>
- GitHub organization: <https://github.com/ActionTecBr>
- Other SDKs: Python, Node.js, Go, Ruby, Java, .NET.

### Platform documentation (orientation)

- SuiteCRM — <https://docs.suitecrm.com/developer/>
- SugarCRM — <https://support.sugarcrm.com/documentation/sugar_developer/>
- FreePBX — <https://sangomakb.atlassian.net/wiki/spaces/PG/pages/24182986/API>