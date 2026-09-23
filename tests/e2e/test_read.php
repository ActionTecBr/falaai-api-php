<?php
namespace FalaAI\Tests\E2e;

use PHPUnit\Framework\TestCase;
use FalaAI\Api\HealthApi;
use FalaAI\Api\VersionApi;
use FalaAI\Api\UsageApi;
use FalaAI\Api\WebhooksApi;
use FalaAI\Api\EmailAlertsApi;

final class ReadTest extends TestCase
{
    private function cfg() { return E2eConfig::configuration(E2eConfig::base()); }

    private function assertNonEmptyString($v): void
    {
        $this->assertIsString($v);
        $this->assertNotSame('', $v);
    }

    public function testHealthGet(): void
    {
        [$data, $status] = (new HealthApi(null, $this->cfg()))->healthCheckWithHttpInfo();
        E2eLogger::log('health_get', 'GET', '/v1/health', null, $data, "HTTP {$status}", $status);
        $this->assertSame(200, $status);
        $this->assertSame('ok', $data->getStatus());
        $this->assertNonEmptyString($data->getVersion());
        $this->assertIsInt($data->getUptimeSeconds());
        $this->assertGreaterThanOrEqual(0, $data->getUptimeSeconds());
        $this->assertIsBool($data->getDatabase());
        $this->assertNonEmptyString($data->getPhase());
        $this->assertNonEmptyString($data->getLaunchDate());
    }

    public function testHealthHead(): void
    {
        $c = new \GuzzleHttp\Client();
        $r = $c->head(E2eConfig::base() . '/v1/health', ['http_errors' => false]);
        $status = $r->getStatusCode();
        E2eLogger::log('health_head', 'HEAD', '/v1/health', null, ['status' => $status], "HTTP {$status}", $status);
        $this->assertSame(200, $status);
    }

    public function testVersion(): void
    {
        [$data, $status] = (new VersionApi(null, $this->cfg()))->getVersionApiVersionGetWithHttpInfo();
        E2eLogger::log('version', 'GET', '/api/version', null, $data, "HTTP {$status}", $status);
        $this->assertSame(200, $status);
        $this->assertSame('FalaAI API', $data->getService());
        $this->assertNonEmptyString($data->getVersion());
        $this->assertNonEmptyString($data->getDeployDate());
    }

    public function testUsageLog(): void
    {
        [$data, $status] = (new UsageApi(null, $this->cfg()))->getUsageLogV1UsageLogGetWithHttpInfo(1, 5);
        E2eLogger::log('usage_log', 'GET', '/v1/usage/log', ['page' => 1, 'limit' => 5], $data, "HTTP {$status}", $status);
        $this->assertSame(200, $status);
        $this->assertSame(1, $data->getPage());
        $this->assertSame(5, $data->getLimit());
        $this->assertIsArray($data->getData());
        foreach ($data->getData() as $it) {
            $this->assertNonEmptyString($it->getId());
            $this->assertNonEmptyString($it->getEndpoint());
            $this->assertIsInt($it->getCreditsCost());
            $this->assertNonEmptyString($it->getStatus());
            $this->assertIsInt($it->getErrorsCount());
            $this->assertNonEmptyString($it->getCreatedAt());
        }
    }

    public function testUsageByKey(): void
    {
        [$data, $status] = (new UsageApi(null, $this->cfg()))->getUsageByKeyV1UsageByKeyGetWithHttpInfo();
        E2eLogger::log('usage_by_key', 'GET', '/v1/usage/by-key', null, $data, "HTTP {$status}", $status);
        $this->assertSame(200, $status);
        $this->assertIsArray($data);
        foreach ($data as $it) {
            $this->assertNonEmptyString($it->getKeyId());
            $this->assertIsString($it->getKeyName());
            $this->assertIsInt($it->getTotalCredits());
            $this->assertIsInt($it->getRequestCount());
        }
    }

    public function testWebhooksList(): void
    {
        [$data, $status] = (new WebhooksApi(null, $this->cfg()))->listWebhooksV1WebhooksGetWithHttpInfo(1, 5);
        E2eLogger::log('webhooks_list', 'GET', '/v1/webhooks', ['page' => 1, 'limit' => 5], $data, "HTTP {$status}", $status);
        $this->assertSame(200, $status);
        $this->assertSame(1, $data->getPage());
        $this->assertSame(5, $data->getLimit());
        $this->assertIsArray($data->getData());
        foreach ($data->getData() as $w) {
            $this->assertNonEmptyString($w->getId());
            $this->assertNonEmptyString($w->getUserId());
            $this->assertIsString($w->getName());
            $this->assertNonEmptyString($w->getUrl());
            $this->assertIsString($w->getSecret());
            $this->assertIsArray($w->getEvents());
            $this->assertIsBool($w->getActive());
            $this->assertIsBool($w->getRetryEnabled());
            $this->assertIsInt($w->getFailureCount());
            $this->assertNonEmptyString($w->getCreatedAt());
            $this->assertNonEmptyString($w->getUpdatedAt());
        }
    }

    public function testEmailAlertsList(): void
    {
        [$data, $status] = (new EmailAlertsApi(null, $this->cfg()))->listEmailAlertsV1EmailAlertsGetWithHttpInfo(1, 5);
        E2eLogger::log('email_alerts_list', 'GET', '/v1/email-alerts', ['page' => 1, 'limit' => 5], $data, "HTTP {$status}", $status);
        $this->assertSame(200, $status);
        $this->assertSame(1, $data->getPage());
        $this->assertSame(5, $data->getLimit());
        $this->assertIsArray($data->getData());
        foreach ($data->getData() as $a) {
            $this->assertNonEmptyString($a->getId());
            $this->assertNonEmptyString($a->getUserId());
            $this->assertIsString($a->getName());
            $this->assertNonEmptyString($a->getEmail());
            $this->assertIsArray($a->getEvents());
            $this->assertIsBool($a->getActive());
            $this->assertNonEmptyString($a->getCreatedAt());
            $this->assertNonEmptyString($a->getUpdatedAt());
        }
    }
}