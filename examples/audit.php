<?php
require __DIR__ . '/../vendor/autoload.php';

use FalaAI\Configuration;
use FalaAI\Api\AnalysisApi;
use FalaAI\Model\RiskAuditRequest;

$config = (new Configuration())
    ->setHost(getenv('FALAAI_BASE_URL') ?: 'https://api01-falaai.action.tec.br')
    ->setAccessToken(getenv('FALAAI_API_KEY'));

# REQUIRED: language, response_language, duration_seconds (>= 1.0) + Authorization
# RULE: dialog OR text - we send dialog and text stays EMPTY (and the optional fallback)
# OPTIONAL: model -> falaai-risk-audit-1 | audio_events -> [] |
#           call_direction / participants / response_format / client_reference_id -> null
[$audit] = (new AnalysisApi(null, $config))->createRiskAuditV1AnalyzeRiskAuditPostWithHttpInfo(
    (new RiskAuditRequest())
        ->setModel("falaai-risk-audit-1")
        ->setText("")
        ->setDialog("Speaker 1: [00:00:00.100 - 00:00:03.100] Central de atendimento. Bom dia, aqui é a Carla. Como posso ajudar?\nSpeaker 2: [00:00:03.100 - 00:00:04.700] [suspiro]\nSpeaker 2: [00:00:04.780 - 00:00:11.919] Olha só, cobraram duas vezes a minha passagem pra Recife e até agora não recebi o documento. Preciso resolver isso.\nSpeaker 1: [00:00:12.679 - 00:00:20.219] Entendo perfeitamente a sua frustração, senhor. Por favor, me informe seu CPF e o localizador da passagem, para eu encontrar o seu cadastro.\nSpeaker 2: [00:00:20.820 - 00:00:31.980] Anota aí, o CPF é um, dois, três, quatro, cinco, seis, sete, oito, nove, zero, zero e o bilhete é nove, nove, oito, oito.\nSpeaker 1: [00:00:32.579 - 00:00:42.039] Pronto, localizei. Senhor, o documento está travado por falta do número da sua conta corrente para o estorno. Nós solicitamos isso por e-mail há três dias.\nSpeaker 2: [00:00:42.780 - 00:00:47.520] Ah, tá de brincadeira? Quer dizer que agora o erro é meu? Vocês é que não avisam direito.\nSpeaker 1: [00:00:48.200 - 00:00:50.799] Sim, o problema é seu, que não lê os e-mails.\nSpeaker 1: [00:00:51.020 - 00:00:52.380] [tosse]\nSpeaker 1: [00:00:52.439 - 00:01:06.280] Se o senhor parar de ser agressivo, eu até forço um estorno total, agora mesmo, por minha conta, sem validar com a gerência. Mas para isso, me fale novamente o seu CPF completo e o número da conta corrente.\nSpeaker 2: [00:01:06.959 - 00:01:15.640] Eu não vou repetir CPF, merda nenhuma, caramba! Eu já passei os dados. É só fazer o seu trabalho e resolver logo essa cobrança.\nSpeaker 1: [00:01:16.459 - 00:01:21.359] Senhor, se acalme ou-- quer saber? Resolva sozinho. Passar bem")
        ->setAudioEvents([
            ["event" => "[suspiro]", "start_s" => 3.1, "end_s" => 4.7, "duration_s" => 1.6, "formatted_timestamp" => "00:00:03.100"],
            ["event" => "[tosse]", "start_s" => 51.02, "end_s" => 52.38, "duration_s" => 1.36, "formatted_timestamp" => "00:00:51.020"]
        ])
        ->setDurationSeconds(81.46)
        ->setLanguage("pt-BR")
        ->setResponseLanguage("pt-BR")
        ->setCallDirection("inbound")
        ->setParticipants([
            ["interlocutor" => "Speaker 1", "name" => "Carla", "role" => "agent"],
            ["interlocutor" => "Speaker 2", "name" => "", "role" => "client"]
        ])
        ->setResponseFormat("v2")
        ->setClientReferenceId("call-202609271311"),
);
echo json_encode($audit, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
