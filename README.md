# FalaAI API — PHP SDK

Official PHP SDK for the **FalaAI API** — AI-powered call transcription, diagnosis and compliance auditing.

## Install

```bash
composer require actiontecbr/falaai-api
```

## Quick start

```php
<?php
require 'vendor/autoload.php';

$config = FalaAI\Configuration::getDefaultConfiguration()
    ->setHost('https://api01-falaai.action.tec.br')
    ->setAccessToken('fai_xxx');

$health = new FalaAI\Api\HealthApi(null, $config);
[$data, $status] = $health->healthCheckWithHttpInfo();
echo $data->getStatus(), ' ', $status, PHP_EOL;
```

## Endpoints

| Method | Path | Description |
|---|---|---|
| POST | `/v1/audio/transcriptions` | Audio to text (diarization, audio events) |
| POST | `/v1/analyze/diagnostic` | Conversation analysis |
| POST | `/v1/analyze/auditoriaRisco` | Compliance audit (risk) |
| GET | `/v1/usage/log` | Usage log |
| GET | `/v1/usage/by-key` | Usage grouped by API key |
| GET/POST | `/v1/webhooks` | List / create webhooks |
| PUT/DELETE | `/v1/webhooks/{webhook_id}` | Update / delete webhook |
| GET/POST | `/v1/email-alerts` | List / create email alerts |
| PUT/DELETE | `/v1/email-alerts/{alert_id}` | Update / delete email alert |
| GET | `/api/version` | API version |
| GET/HEAD | `/v1/health` | Health check |

## Authentication

Authenticated endpoints require an API key in the `Authorization` header:

```
Authorization: Bearer fai_xxx
```

Get your API key at [falaai.action.tec.br/api](https://falaai.action.tec.br/api).

## Tests

An end-to-end suite (19 tests) lives in `tests/e2e/` and runs against the live API:

```bash
FALAAI_E2E_BASE=https://api01-falaai.action.tec.br \
FALAAI_TEST_KEY=fai_xxx \
vendor/bin/phpunit
```

## License

[MIT](LICENSE) © Action Tec Br