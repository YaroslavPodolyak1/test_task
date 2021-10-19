<?php


class Converter
{
    public static function toBool(string|int $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @param array $params
     * @return array
     */
    public static function convert(array $params): array
    {
        return array_map(function ($param) {

            if ((int)$param) {
                return (int)$param;
            }

            $param = strtolower($param);

            if ($param == 'true' || $param == 'false') {
                return static::toBool($param);
            }

            return $param;
        }, $params);
    }
}