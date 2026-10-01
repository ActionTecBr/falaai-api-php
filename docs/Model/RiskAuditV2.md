# RiskAuditV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meta** | [**\FalaAI\Model\RiskAuditMetaV2**](RiskAuditMetaV2.md) | Identification + usage |
**participants** | [**\FalaAI\Model\RiskAuditParticipantsV2**](RiskAuditParticipantsV2.md) | Participants/roles/direction |
**verdict** | [**\FalaAI\Model\RiskAuditVerdictV2**](RiskAuditVerdictV2.md) | Verdict + level + applied actions |
**scores** | [**\FalaAI\Model\RiskAuditScoresV2**](RiskAuditScoresV2.md) | Consolidated + per-participant scores |
**detections** | [**\FalaAI\Model\RiskAuditDetectionsV2**](RiskAuditDetectionsV2.md) | violations/positives/client alerts |
**analysis** | [**\FalaAI\Model\RiskAuditAnalysisV2**](RiskAuditAnalysisV2.md) | global_metrics + final_analysis + frameworks |
**timeline** | [**\FalaAI\Model\RiskAuditTimelineV2**](RiskAuditTimelineV2.md) | turns_sentiment + audio_events + groups |
**audio_event_model** | [**\FalaAI\Model\RiskAuditAudioEventModelV2**](RiskAuditAudioEventModelV2.md) | MAC audio event semantics |
**categories_summary** | **array<string,mixed>** | Per-category summary (keyed by category) |
**indexer** | [**\FalaAI\Model\RiskAuditIndexerV2**](RiskAuditIndexerV2.md) | Suggested terms for bank |
**summary** | [**\FalaAI\Model\RiskAuditSummaryV2**](RiskAuditSummaryV2.md) | Executive summary counts |
**actions_i18n** | **array<string,mixed>** | Used actions i18n catalog (keyed by action) |
**audit_decisions** | [**\FalaAI\Model\RiskAuditAuditDecisionsV2**](RiskAuditAuditDecisionsV2.md) | Risk origin + validator changes |
**scoring_explanation** | [**\FalaAI\Model\RiskAuditScoringExplanationV2**](RiskAuditScoringExplanationV2.md) | Score composition explanation |
**html_report** | **string** | HTML report (base64 gzip) |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
