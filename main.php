#!/usr/bin/php
<?php

require 'Core/InputCommand.php';
require_once 'Core/Support/Arr.php';
require_once 'Core/Support/Converter.php';
require_once 'Core/Support/Str.php';
require_once 'Core/Support/VarDumper.php';

$args = Arr::except($argv, 'main.php');

(new InputCommand())->run($args);
?>