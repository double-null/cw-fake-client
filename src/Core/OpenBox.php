<?php declare(strict_types = 1);

namespace CW\Core;

class OpenBox
{
    private static array $box = [];

    public static function set(string $key, string $value): void
    {
        self::$box[$key] = $value;
    }

    public static function get(string $key): ?string
    {
        return self::$box[$key] ?? null;
    }
}
