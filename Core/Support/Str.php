<?php
declare(strict_types=1);

class Str
{
    public static function upper(string $string): string
    {
        return strtoupper($string);
    }

    public static function boolToStr(bool $value): string
    {
        return $value ? 'true' : 'false';
    }
}