<?php
namespace FalaAI\Tests\E2e;

use FalaAI\Configuration;

final class E2eConfig
{
    private static ?array $env = null;

    private static function env(): array
    {
        if (self::$env === null) {
            self::$env = [];
            $path = __DIR__ . '/../../../.env.e2e';
            if (is_file($path)) {
                foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
                    $line = trim($line);
                    if ($line === '' || $line[0] === '#' || strpos($line, '=') === false) continue;
                    [$k, $v] = explode('=', $line, 2);
                    self::$env[trim($k)] = trim($v);
                }
            }
        }
        return self::$env;
    }

    private static function get(string $n): ?string
    {
        $v = getenv($n);
        if ($v !== false && $v !== '') return $v;
        return self::env()[$n] ?? null;
    }

    public static function base(): string
    {
        return self::get('FALAAI_E2E_BASE') ?: (self::get('FALAAI_LOCAL_URL') ?: 'http://localhost:8002');
    }

    public static function prod(): string
    {
        return self::get('FALAAI_PROD_URL') ?: 'https://api01-falaai.action.tec.br';
    }

    public static function key(): string
    {
        $k = self::get('FALAAI_TEST_KEY');
        if (!$k) throw new \RuntimeException('[E2E] FALAAI_TEST_KEY ausente');
        return $k;
    }

    public static function audio(): string
    {
        $a = self::get('FALAAI_E2E_AUDIO');
        if (!$a) throw new \RuntimeException('[E2E] FALAAI_E2E_AUDIO ausente');
        return $a;
    }

    public static function configuration(string $baseUrl, ?string $key = null): Configuration
    {
        return (new Configuration())->setHost($baseUrl)->setAccessToken($key ?? self::key());
    }
}