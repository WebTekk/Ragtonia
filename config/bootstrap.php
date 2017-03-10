<?php

// Register composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../lib/util.php';
require_once __DIR__ . '/../lib/helper.php';
config()->add(read(__DIR__ . '/config.php'));
