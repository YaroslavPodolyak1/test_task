<?php
declare(strict_types=1);

class VarDumper
{

    public static function echo(mixed $data, string $outputFormat): void
    {
        if (is_array($data)) {
            $data = sprintf($outputFormat, implode(', ', $data));
        }

        print_r('-------------------------------------------------' . PHP_EOL);
        print_r($data . PHP_EOL);
    }
}