# sdks/php/examples - exemplos php (canonicos)

@version 1.4.0 | criado: 30/09/2026 12:45 | atualizado: 04/10/2026 02:35

## O que e
Os 4 exemplos php (php) dos endpoints da API, EXPORTADOS DA LANDING PAGE (fonte unica
de verdade). Nunca editados a mao.

## Fonte unica de verdade
- FalaAI_landing/lib/sandbox-examples.ts -> SANDBOX_EXAMPLES[<endpoint>].php
- que INTERPOLA FalaAI_landing/lib/sandbox-json-example.ts (SANDBOX_JSON_EXAMPLE = dados reais).

## Script (ferramenta)
_generate_php_examples.mjs (prefixo _ = ferramenta, nao exemplo)

| Comando                                      | Acao                                                      |
|----------------------------------------------|-----------------------------------------------------------|
| node _generate_php_examples.mjs             | Exporta (escreve os php a partir da landing + README)     |
| node _generate_php_examples.mjs --check     | Verifica (compara php x landing; exit 1 se divergir)      |

- Roda de QUALQUER pasta (resolve a landing pelo proprio caminho).
- Pre-requisito: Node (v22+).
- NUNCA edite os php nem este README a mao: edite a landing e reexecute o script.

## Ordem obrigatoria (regra)
1. Altere a FONTE (landing / SANDBOX_JSON_EXAMPLE).
2. Valide o cURL primeiro:  node _generate_php_examples.mjs --check   (exit 0 = ok)
3. So depois espelhe nas linguagens.
4. Cadeia integrada no pipeline: scripts/regenerate_all.py (T11) exporta via node.

## Relatorio da ultima execucao
| Data | Modo | Resultado |
|------|------|-----------|
| 04/10/2026 02:35 | verificacao (--check) | OK - 5 exemplos php 100% conforme a landing. |

| Arquivo | Endpoint | Status | Gerado em |
|---------|----------|--------|-----------|
| health.php | GET  /v1/health | ok | 04/10/2026 02:23 |
| transcribe.php | POST /v1/audio/transcriptions | ok | 04/10/2026 02:23 |
| diagnose.php | POST /v1/analyze/diagnostic | ok | 04/10/2026 02:23 |
| audit.php | POST /v1/analyze/riskAudit | ok | 04/10/2026 02:23 |
| whatsapp.php | whatsapp.php | ok | 04/10/2026 02:23 |

## Datas
- Criacao:     30/09/2026 12:45
- Atualizacao: 04/10/2026 02:35

Gerado automaticamente por _generate_php_examples.mjs - NAO edite a mao.
