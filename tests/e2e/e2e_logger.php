<?php
namespace FalaAI\Tests\E2e;

final class E2eLogger
{
    public static function log(string $name, string $method, string $path, $payload, $response, string $result, ?int $status = null): string
    {
        $safe = strtoupper(preg_replace('/[^A-Za-z0-9]+/', '_', $name));
        $dir = __DIR__ . '/logs/' . $safe;
        if (!is_dir($dir)) mkdir($dir, 0777, true);
        $ts = date('Ymd_His');
        $file = $dir . '/' . $safe . '_' . $ts . '.log';

        $enc = function ($v) { return $v === null ? '(sem dados)' : json_encode($v, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); };
        $lines = [
            str_repeat('=', 70),
            "TESTE: {$method} {$path}",
            'DATA: ' . date('c'),
            str_repeat('=', 70),
            '',
            '--- PAYLOAD (enviado) ---',
            $enc($payload),
            '',
            '--- RESPOSTA (saida do SDK) ---',
            $status !== null ? "HTTP: {$status}" : '',
            $enc($response),
            '',
            '--- RESULTADO ---',
            $result,
            '',
        ];
        file_put_contents($file, implode("\n", $lines));
        return $file;
    }
}