#!/usr/bin/env php
<?php

$loader = require_once(__DIR__.'/../vendor/autoload.php');

$sqlite = 'sqlite:' . getcwd() . '/.psurgeon.sqlite';
$init = file_get_contents(__DIR__.'/../res/index.sql');

$console = new \Symfony\Component\Console\Application('psurgion', '0.0.1 (dev)');
$console->add(new \Zeroem\Psurgeon\Command\IndexCommand());
$console->add(new \Zeroem\Psurgeon\Command\InitCommand($sqlite,$init));

$console->run();
