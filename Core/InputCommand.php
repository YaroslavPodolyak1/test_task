<?php
declare(strict_types=1);

use JetBrains\PhpStorm\NoReturn;

class InputCommand
{
    private array $main_array = ['vasya', 'pupkin', 'apple', 23, 41, 55, 1, 2];

    /**
     * @param array $args
     */
    #[NoReturn]
    public function run(array $args): void
    {
        if (Arr::exists($this->main_array, true)) {
            $this->setMainArray(Arr::except($this->main_array, true));
        }

        if (Arr::exists($args, 'true')) {
            $args = Converter::convert($args);

            if (!Arr::exists($args, true)) {
                exit('True is not bool!');
            }
        }

        $merged = Arr::merge($this->main_array, $args);

        VarDumper::echo($merged, 'Arrays merged: %s');

        $diff = Arr::diff($args, $this->main_array);

        if (!empty($diff)) {
            VarDumper::echo($diff, 'Arrays difference: %s');
        }

        VarDumper::echo(Arr::mutate($this->main_array), 'Array to upper string values: %s');
        VarDumper::echo(Arr::intersect($this->main_array, $args), 'Arrays intersect values: %s');
        VarDumper::echo(Arr::filterIntegerValues($args), 'Entered number values: %s');
        VarDumper::echo(Arr::replaceArrayValues($this->main_array), 'Sorted array: %s');
    }

    /**
     * @param array $new_values
     */
    public function setMainArray(array $new_values)
    {
        $this->main_array = $new_values;
    }
}