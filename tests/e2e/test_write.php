<?php
namespace FalaAI\Tests\E2e;

use PHPUnit\Framework\TestCase;
use FalaAI\Api\WebhooksApi;
use FalaAI\Api\EmailAlertsApi;
use FalaAI\Model\CreateWebhookRequest;
use FalaAI\Model\UpdateWebhookRequest;
use FalaAI\Model\CreateEmailAlertRequest;
use FalaAI\Model\UpdateEmailAlertRequest;

final class WriteTest extends TestCase
{
    private const WNAME = 'E2E Test Webhook';
    private const WURL = 'https://e2e-falaai.invalid/hook';
    private const ANAME = 'E2E Test Alert';
    private const AEMAIL = 'e2e-test@falaai.invalid';
    private const EVENTS = ['credits.low', 'payment.failed'];

    private function wh() { return new WebhooksApi(null, E2eConfig::configuration(E2eConfig::base())); }
    private function em() { return new EmailAlertsApi(null, E2eConfig::configuration(E2eConfig::base())); }

    private function assertNonEmptyString($v): void
    {
        $this->assertIsString($v);
        $this->assertNotSame('', $v);
    }

    private function assertWebhookFull($w, string $wid, string $name, bool $active): void
    {
        $this->assertSame($wid, $w->getId());
        $this->assertNonEmptyString($w->getUserId());
        $this->assertSame($name, $w->getName());
        $this->assertSame(self::WURL, $w->getUrl());
        $this->assertNonEmptyString($w->getSecret());
        $this->assertIsArray($w->getEvents());
        $this->assertCount(2, $w->getEvents());
        $this->assertSame($active, $w->getActive());
        $this->assertIsBool($w->getRetryEnabled());
        $this->assertIsInt($w->getFailureCount());
        $this->assertNonEmptyString($w->getCreatedAt());
        $this->assertNonEmptyString($w->getUpdatedAt());
    }

    private function assertAlertFull($a, string $aid, string $name, bool $active): void
    {
        $this->assertSame($aid, $a->getId());
        $this->assertNonEmptyString($a->getUserId());
        $this->assertSame($name, $a->getName());
        $this->assertSame(self::AEMAIL, $a->getEmail());
        $this->assertIsArray($a->getEvents());
        $this->assertCount(2, $a->getEvents());
        $this->assertSame($active, $a->getActive());
        $this->assertNonEmptyString($a->getCreatedAt());
        $this->assertNonEmptyString($a->getUpdatedAt());
    }

    private function cleanupWebhooks(): void
    {
        [$list] = $this->wh()->listWebhooksV1WebhooksGetWithHttpInfo(1, 100);
        foreach ($list->getData() as $w) {
            if ($w->getUrl() === self::WURL) $this->wh()->deleteWebhookV1WebhooksWebhookIdDeleteWithHttpInfo($w->getId());
        }
    }
    private function cleanupAlerts(): void
    {
        [$list] = $this->em()->listEmailAlertsV1EmailAlertsGetWithHttpInfo(1, 100);
        foreach ($list->getData() as $a) {
            if ($a->getEmail() === self::AEMAIL) $this->em()->deleteEmailAlertV1EmailAlertsAlertIdDeleteWithHttpInfo($a->getId());
        }
    }

    public function testWebhooksCrud(): void
    {
        $this->cleanupWebhooks();
        $body = new CreateWebhookRequest(['name' => self::WNAME, 'url' => self::WURL, 'events' => self::EVENTS]);
        [$c, $cs] = $this->wh()->createWebhookV1WebhooksPostWithHttpInfo($body);
        E2eLogger::log('webhooks_create', 'POST', '/v1/webhooks', $body, $c, "HTTP {$cs}", $cs);
        $this->assertSame(200, $cs);
        $wid = $c->getId();
        $this->assertWebhookFull($c, $wid, self::WNAME, true);

        $ub = new UpdateWebhookRequest(['name' => self::WNAME . ' (updated)', 'active' => false]);
        [$u, $us] = $this->wh()->updateWebhookV1WebhooksWebhookIdPutWithHttpInfo($wid, $ub);
        E2eLogger::log('webhooks_update', 'PUT', "/v1/webhooks/{$wid}", $ub, $u, "HTTP {$us}", $us);
        $this->assertSame(200, $us);
        $this->assertSame('updated', $u->getMessage());

        [$r] = $this->wh()->listWebhooksV1WebhooksGetWithHttpInfo(1, 100);
        $row = null;
        foreach ($r->getData() as $w) { if ($w->getId() === $wid) $row = $w; }
        $this->assertNotNull($row);
        $this->assertWebhookFull($row, $wid, self::WNAME . ' (updated)', false);

        [$d, $ds] = $this->wh()->deleteWebhookV1WebhooksWebhookIdDeleteWithHttpInfo($wid);
        E2eLogger::log('webhooks_delete', 'DELETE', "/v1/webhooks/{$wid}", null, $d, "HTTP {$ds}", $ds);
        $this->assertSame(200, $ds);
        $this->assertSame('deleted', $d->getMessage());

        [$r2] = $this->wh()->listWebhooksV1WebhooksGetWithHttpInfo(1, 100);
        $found = false;
        foreach ($r2->getData() as $w) { if ($w->getId() === $wid) $found = true; }
        $this->assertFalse($found);
    }

    public function testEmailAlertsCrud(): void
    {
        $this->cleanupAlerts();
        $body = new CreateEmailAlertRequest(['name' => self::ANAME, 'email' => self::AEMAIL, 'events' => self::EVENTS]);
        [$c, $cs] = $this->em()->createEmailAlertV1EmailAlertsPostWithHttpInfo($body);
        E2eLogger::log('email_alerts_create', 'POST', '/v1/email-alerts', $body, $c, "HTTP {$cs}", $cs);
        $this->assertSame(200, $cs);
        $aid = $c->getId();
        $this->assertAlertFull($c, $aid, self::ANAME, true);

        $ub = new UpdateEmailAlertRequest(['name' => self::ANAME . ' (updated)', 'active' => false]);
        [$u, $us] = $this->em()->updateEmailAlertV1EmailAlertsAlertIdPutWithHttpInfo($aid, $ub);
        E2eLogger::log('email_alerts_update', 'PUT', "/v1/email-alerts/{$aid}", $ub, $u, "HTTP {$us}", $us);
        $this->assertSame(200, $us);
        $this->assertSame('updated', $u->getMessage());

        [$r] = $this->em()->listEmailAlertsV1EmailAlertsGetWithHttpInfo(1, 100);
        $row = null;
        foreach ($r->getData() as $a) { if ($a->getId() === $aid) $row = $a; }
        $this->assertNotNull($row);
        $this->assertAlertFull($row, $aid, self::ANAME . ' (updated)', false);

        [$d, $ds] = $this->em()->deleteEmailAlertV1EmailAlertsAlertIdDeleteWithHttpInfo($aid);
        E2eLogger::log('email_alerts_delete', 'DELETE', "/v1/email-alerts/{$aid}", null, $d, "HTTP {$ds}", $ds);
        $this->assertSame(200, $ds);
        $this->assertSame('deleted', $d->getMessage());

        [$r2] = $this->em()->listEmailAlertsV1EmailAlertsGetWithHttpInfo(1, 100);
        $found = false;
        foreach ($r2->getData() as $a) { if ($a->getId() === $aid) $found = true; }
        $this->assertFalse($found);
    }
}