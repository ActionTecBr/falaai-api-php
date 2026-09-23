<?php
namespace FalaAI\Tests\E2e;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

final class ErrorsTest extends TestCase
{
    private function post(string $path, array $body, ?string $key = null)
    {
        $c = new Client();
        return $c->post(E2eConfig::base() . $path, [
            'headers' => ['Authorization' => 'Bearer ' . ($key ?? E2eConfig::key()), 'Content-Type' => 'application/json'],
            'json' => $body, 'http_errors' => false,
        ]);
    }

    public function test401InvalidKey(): void
    {
        $c = new Client();
        $r = $c->get(E2eConfig::base() . '/v1/usage/log?page=1&limit=1', ['headers' => ['Authorization' => 'Bearer fai_chave_invalida_000'], 'http_errors' => false]);
        $body = json_decode((string) $r->getBody(), true);
        E2eLogger::log('errors_401', 'GET', '/v1/usage/log', null, $body, 'HTTP ' . $r->getStatusCode(), $r->getStatusCode());
        $this->assertSame(401, $r->getStatusCode());
    }

    public function test422DiagnosticMissing(): void
    {
        $body = ['language' => 'pt-BR', 'dialog' => 'Speaker 1: ola'];
        $r = $this->post('/v1/analyze/diagnostic', $body);
        E2eLogger::log('errors_422_diag', 'POST', '/v1/analyze/diagnostic', $body, json_decode((string) $r->getBody(), true), 'HTTP ' . $r->getStatusCode(), $r->getStatusCode());
        $this->assertSame(422, $r->getStatusCode());
    }

    public function test422AuditoriaMissing(): void
    {
        $body = ['language' => 'pt-BR', 'dialog' => 'Speaker 1: ola'];
        $r = $this->post('/v1/analyze/auditoriaRisco', $body);
        E2eLogger::log('errors_422_aud', 'POST', '/v1/analyze/auditoriaRisco', $body, json_decode((string) $r->getBody(), true), 'HTTP ' . $r->getStatusCode(), $r->getStatusCode());
        $this->assertSame(422, $r->getStatusCode());
    }

    public function test422ExtraForbidden(): void
    {
        $body = ['dialog' => 'Speaker 1: ola', 'language' => 'pt-BR', 'response_language' => 'pt-BR', 'duration_seconds' => 10, 'threshold_multiplier' => 1];
        $r = $this->post('/v1/analyze/auditoriaRisco', $body);
        E2eLogger::log('errors_422_extra', 'POST', '/v1/analyze/auditoriaRisco', $body, json_decode((string) $r->getBody(), true), 'HTTP ' . $r->getStatusCode(), $r->getStatusCode());
        $this->assertSame(422, $r->getStatusCode());
    }

    public function test400AuditoriaLanguage(): void
    {
        $body = ['dialog' => 'Speaker 1: ola', 'language' => 'xx', 'response_language' => 'pt-BR', 'duration_seconds' => 10];
        $r = $this->post('/v1/analyze/auditoriaRisco', $body);
        E2eLogger::log('errors_400_aud', 'POST', '/v1/analyze/auditoriaRisco', $body, json_decode((string) $r->getBody(), true), 'HTTP ' . $r->getStatusCode(), $r->getStatusCode());
        $this->assertSame(400, $r->getStatusCode());
    }

    public function test400DiagnosticLanguage(): void
    {
        $body = ['dialog' => 'Speaker 1: ola', 'language' => 'xx', 'duration_seconds' => 10];
        $r = $this->post('/v1/analyze/diagnostic', $body);
        E2eLogger::log('errors_400_diag', 'POST', '/v1/analyze/diagnostic', $body, json_decode((string) $r->getBody(), true), 'HTTP ' . $r->getStatusCode(), $r->getStatusCode());
        $this->assertSame(400, $r->getStatusCode());
    }
}