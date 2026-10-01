<?php
require __DIR__ . '/../vendor/autoload.php';

use FalaAI\Configuration;
use FalaAI\Api\HealthApi;

$config = (new Configuration())
    ->setHost(getenv('FALAAI_BASE_URL') ?: 'https://api01-falaai.action.tec.br');

$health = (new HealthApi(null, $config))->healthCheck();
echo json_encode($health, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
