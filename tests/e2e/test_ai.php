<?php
namespace FalaAI\Tests\E2e;

use PHPUnit\Framework\TestCase;
use FalaAI\Api\SpeechApi;
use FalaAI\Api\AnalysisApi;
use FalaAI\Model\DiagnosticRequest;
use FalaAI\Model\AuditoriaRiscoRequest;
use FalaAI\Model\Participant;

final class AiTest extends TestCase
{
    private function assertNonEmptyString($v): void
    {
        $this->assertIsString($v);
        $this->assertNotSame('', $v);
    }

    public function testAiChain(): void
    {
        $cfg = E2eConfig::configuration(E2eConfig::prod());
        $sp = new SpeechApi(null, $cfg);
        $an = new AnalysisApi(null, $cfg);

        $file = new \SplFileObject(E2eConfig::audio());
        [$tr, $ts] = $sp->createTranscriptionV1AudioTranscriptionsPostWithHttpInfo($file, 'falaai-transcribe-1', 'pt', 'e2e-call-2026-09-22-001');
        E2eLogger::log('transcriptions', 'POST', '/v1/audio/transcriptions',
            ['file' => 'analise_25s.mp3', 'model' => 'falaai-transcribe-1', 'language' => 'pt', 'client_reference_id' => 'e2e-call-2026-09-22-001'],
            $tr, "HTTP {$ts}", $ts);
        $this->assertSame(200, $ts);
        $this->assertNonEmptyString($tr->getId());
        $this->assertNotNull($tr->getObject());
        $this->assertNonEmptyString($tr->getModel());
        $this->assertNonEmptyString($tr->getFilename());
        $this->assertNonEmptyString($tr->getProcessedAt());
        $this->assertIsFloat($tr->getUsage()->getAudioSeconds());
        $this->assertGreaterThan(0, $tr->getUsage()->getAudioSeconds());
        $this->assertIsInt($tr->getUsage()->getCreditsConsumed());
        $this->assertIsInt($tr->getUsage()->getProcessingMs());
        $this->assertNonEmptyString($tr->getLanguage());
        $this->assertIsFloat($tr->getDurationSeconds());
        $this->assertGreaterThan(0, $tr->getDurationSeconds());
        $this->assertNonEmptyString($tr->getText());
        $this->assertNonEmptyString($tr->getDialog());
        $this->assertIsArray($tr->getAudioEvents());
        foreach ($tr->getAudioEvents() as $ev) {
            $this->assertNonEmptyString($ev->getEvent());
            $this->assertIsNumeric($ev->getStartS());
            $this->assertIsNumeric($ev->getEndS());
            $this->assertIsNumeric($ev->getDurationS());
            $this->assertNonEmptyString($ev->getFormattedTimestamp());
        }
        $this->assertIsArray($tr->getEventTypes());
        $this->assertIsInt($tr->getWordCount());
        $this->assertGreaterThan(0, $tr->getWordCount());
        $this->assertIsFloat($tr->getInput()->getDurationS());
        $this->assertNonEmptyString($tr->getInput()->getOriginalFormat());
        $this->assertNonEmptyString($tr->getInput()->getCodec());
        $this->assertIsInt($tr->getInput()->getSampleRate());
        $this->assertIsInt($tr->getInput()->getChannels());

        $events = [];
        foreach ($tr->getAudioEvents() as $ev) {
            $events[] = [
                'event' => $ev->getEvent(), 'start_s' => $ev->getStartS(), 'end_s' => $ev->getEndS(),
                'duration_s' => $ev->getDurationS(), 'formatted_timestamp' => $ev->getFormattedTimestamp(),
            ];
        }

        $dbody = new DiagnosticRequest([
            'model' => 'falaai-diagnostic-1', 'dialog' => $tr->getDialog(), 'language' => 'pt-BR',
            'duration_seconds' => $tr->getDurationSeconds(), 'text' => $tr->getText(),
            'audio_events' => $events, 'client_reference_id' => 'e2e-diag-2026-09-22-001',
        ]);
        [$d, $ds] = $an->createDiagnosticV1AnalyzeDiagnosticPostWithHttpInfo($dbody);
        E2eLogger::log('diagnostic', 'POST', '/v1/analyze/diagnostic', $dbody, $d, "HTTP {$ds}", $ds);
        $this->assertSame(200, $ds);
        $this->assertNonEmptyString($d->getId());
        $this->assertNonEmptyString($d->getResponseLanguage());
        $this->assertSame('analysis', $d->getObject());
        $this->assertNotNull($d->getAnalysis()->getDialogueSummary());
        $this->assertNotNull($d->getAnalysis()->getContactReason());
        $this->assertNotNull($d->getAnalysis()->getIdentifiedAction());
        $this->assertNotNull($d->getAnalysis()->getIdentifiedLabel());
        $this->assertNotNull($d->getAnalysis()->getSentiment());
        $this->assertIsInt($d->getUsage()->getCharacters());
        $this->assertIsInt($d->getUsage()->getCreditsConsumed());
        $this->assertIsInt($d->getUsage()->getProcessingMs());

        $abody = new AuditoriaRiscoRequest([
            'model' => 'falaai-auditoria-risco-1', 'dialog' => $tr->getDialog(), 'language' => 'pt-BR',
            'response_language' => 'pt-BR', 'duration_seconds' => $tr->getDurationSeconds(), 'text' => $tr->getText(),
            'audio_events' => $events, 'call_direction' => 'inbound',
            'participants' => [
                new Participant(['interlocutor' => 'Speaker 1', 'name' => 'Mateus', 'role' => 'agent']),
                new Participant(['interlocutor' => 'Speaker 2', 'name' => 'Cliente', 'role' => 'client']),
            ],
            'response_format' => 'v2', 'client_reference_id' => 'e2e-aud-2026-09-22-001',
        ]);
        [$a, $as] = $an->createAuditoriaRiscoV1AnalyzeAuditoriaRiscoPostWithHttpInfo($abody);
        E2eLogger::log('auditoriaRisco', 'POST', '/v1/analyze/auditoriaRisco', $abody, $a, "HTTP {$as}", $as);
        $this->assertSame(200, $as);
        $pub = $a->getResponse();
        $this->assertNonEmptyString($pub->getMeta()->getId());
        $this->assertIsInt($pub->getMeta()->getUsage()->getCharacters());
        $this->assertIsInt($pub->getMeta()->getUsage()->getCreditsConsumed());
        $this->assertIsInt($pub->getMeta()->getUsage()->getProcessingMs());
        foreach (['getParticipants', 'getVerdict', 'getScores', 'getDetections', 'getAnalysis', 'getTimeline',
                  'getAudioEventModel', 'getCategoriesSummary', 'getIndexer', 'getSummary',
                  'getAcoesI18n', 'getAuditDecisions', 'getScoringExplanation'] as $g) {
            $this->assertNotNull($pub->{$g}());
        }
        $this->assertIsString($pub->getHtmlReport());
    }
}