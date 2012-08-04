#!/usr/bin/env php
<?php

$loader = require_once(__DIR__.'/../vendor/autoload.php');

$console = new \Symfony\Component\Console\Application('psurgion', '0.0.1 (dev)');
$console->add(new \Zeroem\Psurgeon\Command\IndexCommand());


$console->run();
