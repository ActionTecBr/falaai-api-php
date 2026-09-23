<?php
namespace FalaAI\Tests\E2e;

use PHPUnit\Framework\TestCase;

final class ContractTest extends TestCase
{
    private const ROOT = __DIR__ . '/../../../..';
    private const OPS = [
        'POST /v1/audio/transcriptions', 'POST /v1/analyze/diagnostic', 'POST /v1/analyze/auditoriaRisco',
        'GET /v1/usage/log', 'GET /v1/usage/by-key', 'GET /v1/webhooks', 'POST /v1/webhooks',
        'PUT /v1/webhooks/{webhook_id}', 'DELETE /v1/webhooks/{webhook_id}',
        'GET /v1/email-alerts', 'POST /v1/email-alerts', 'PUT /v1/email-alerts/{alert_id}',
        'DELETE /v1/email-alerts/{alert_id}', 'GET /api/version', 'GET /v1/health', 'HEAD /v1/health',
    ];
    private const PATHS = [
        '/v1/audio/transcriptions', '/v1/analyze/diagnostic', '/v1/analyze/auditoriaRisco', '/v1/usage/log',
        '/v1/usage/by-key', '/v1/webhooks', '/v1/webhooks/{webhook_id}', '/v1/email-alerts',
        '/v1/email-alerts/{alert_id}', '/api/version', '/v1/health',
    ];

    public function testOpenapiTemOperacoesEsperadas(): void
    {
        $spec = json_decode(file_get_contents(self::ROOT . '/openapi.json'), true);
        $ops = [];
        foreach ($spec['paths'] as $path => $methods) {
            foreach (array_keys($methods) as $m) {
                if (in_array($m, ['get', 'post', 'put', 'delete', 'patch', 'head'], true)) $ops[] = strtoupper($m) . ' ' . $path;
            }
        }
        sort($ops); $exp = self::OPS; sort($exp);
        $this->assertSame($exp, $ops);
    }

    public function testSdkCobre100pc(): void
    {
        $lib = self::ROOT . '/sdks/php/lib/Api';
        $api = '';
        foreach (glob($lib . '/*.php') as $f) { $api .= file_get_contents($f); }
        foreach (self::PATHS as $p) {
            $this->assertStringContainsString($p, $api, "SDK nao cobre {$p}");
        }
    }

    public function testExemplosExistem(): void
    {
        $ex = self::ROOT . '/app/static/examples';
        foreach ([
            'curl/transcribe.sh', 'python/transcribe.py', 'nodejs/transcribe.js',
            'curl/auditoria_risco.sh', 'python/auditoria_risco.py', 'nodejs/auditoria_risco.js',
            'curl/diagnostic.sh', 'python/diagnostic.py', 'nodejs/diagnostic.js',
        ] as $f) {
            $this->assertFileExists($ex . '/' . $f, $f);
        }
    }
}