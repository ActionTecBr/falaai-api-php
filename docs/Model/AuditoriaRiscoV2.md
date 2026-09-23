# AuditoriaRiscoV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meta** | [**\FalaAI\Model\AuditoriaRiscoMetaV2**](AuditoriaRiscoMetaV2.md) | Identification + usage |
**participants** | [**\FalaAI\Model\AuditoriaRiscoParticipantsV2**](AuditoriaRiscoParticipantsV2.md) | Participants/roles/direction |
**verdict** | [**\FalaAI\Model\AuditoriaRiscoVerdictV2**](AuditoriaRiscoVerdictV2.md) | Verdict + level + applied actions |
**scores** | [**\FalaAI\Model\AuditoriaRiscoScoresV2**](AuditoriaRiscoScoresV2.md) | Consolidated + per-participant scores |
**detections** | [**\FalaAI\Model\AuditoriaRiscoDetectionsV2**](AuditoriaRiscoDetectionsV2.md) | violations/positives/client alerts |
**analysis** | [**\FalaAI\Model\AuditoriaRiscoAnalysisV2**](AuditoriaRiscoAnalysisV2.md) | global_metrics + final_analysis + frameworks |
**timeline** | [**\FalaAI\Model\AuditoriaRiscoTimelineV2**](AuditoriaRiscoTimelineV2.md) | turns_sentiment + audio_events + groups |
**audio_event_model** | [**\FalaAI\Model\AuditoriaRiscoAudioEventModelV2**](AuditoriaRiscoAudioEventModelV2.md) | MAC audio event semantics |
**categories_summary** | **array<string,mixed>** | Per-category summary (keyed by category) |
**indexer** | [**\FalaAI\Model\AuditoriaRiscoIndexerV2**](AuditoriaRiscoIndexerV2.md) | Suggested terms for bank |
**summary** | [**\FalaAI\Model\AuditoriaRiscoSummaryV2**](AuditoriaRiscoSummaryV2.md) | Executive summary counts |
**acoes_i18n** | **array<string,mixed>** | Used actions i18n catalog (keyed by action) |
**audit_decisions** | [**\FalaAI\Model\AuditoriaRiscoAuditDecisionsV2**](AuditoriaRiscoAuditDecisionsV2.md) | Risk origin + validator changes |
**scoring_explanation** | [**\FalaAI\Model\AuditoriaRiscoScoringExplanationV2**](AuditoriaRiscoScoringExplanationV2.md) | Score composition explanation |
**html_report** | **string** | HTML report (base64 gzip) |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
