<?php
require __DIR__ . "/vendor/autoload.php";

use FalaAI\Api\Api\WhatsappApi;
use FalaAI\Api\Configuration;

$config = (new Configuration())
    ->setHost(getenv("FALAAI_BASE_URL") ?: "https://api01-falaai.action.tec.br")
    ->setAccessToken(getenv("FALAAI_API_KEY"));
$whatsapp = new WhatsappApi(null, $config);

// REQUIRED: file (.zip/.txt export), start, end, timezone, date_format + Authorization
// OPTIONAL: gap_minutes (default 720) | min_messages (default 2) | chars_per_minute (default 800) | client_reference_id
$result = $whatsapp->extractConversations(
    new \SplFileObject("demo_whatsapp.zip"),
    "2024-01-01T00:00:00",
    "2024-12-31T23:59:59",
    "-3",
    "day_first",
    720,
    2,
    800
);

echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), PHP_EOL;
