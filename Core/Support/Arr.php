<?php
declare(strict_types=1);

class Arr
{
    public static function except(array $array, mixed $except): array
    {
        return array_filter($array, fn($value) => $value !== $except);
    }

    public static function exists(array $array, mixed $value, bool $strict = true): bool
    {
        return in_array($value, $array, $strict);
    }

    public static function merge(array $array1, array $array2): array
    {
        $firstArray = array_map(fn($value) => is_bool($value) ? Str::boolToStr($value) : $value, array_values($array1));
        $twoArray = array_map(fn($value) => is_bool($value) ? Str::boolToStr($value) : $value, array_values($array2));

        return array_merge($firstArray, $twoArray);
    }

    public static function diff(array $array1, array $array2): array
    {
        $buffer = [];
        foreach ($array1 as $key => $value) {
            if (!static::exists($array2, $value)) {
                array_push($buffer, is_bool($value) ? Str::boolToStr($value) : $value);
            }
        }

        return $buffer;
    }

    public static function filterIntegerValues(array $array): array
    {
        return array_filter($array, fn($item) => is_numeric($item));
    }

    public static function intersect(array $array1, array $array2): array
    {
        return array_intersect($array1, $array2);
    }

    public static function replaceArrayValues(array $array): array
    {
        $numbers = static::filterIntegerValues($array);
        $diff = static::diff($array, $numbers);

        asort($numbers);

        return array_merge($numbers, $diff);
    }

    public static function mutate(array $array)
    {
        return array_map(function ($item) {
            if (is_string($item)) {
                return Str::upper($item);
            }
            return $item;
        }, $array);
    }

}