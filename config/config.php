<?php
/*
 * This is the config file.
 *
 * Set your configs in this file.
 */


// Error reporting
error_reporting(0);
ini_set('display_errors', '0');

// Timezone
date_default_timezone_set('Europe/Berlin');

$config = array();

$config['routes'] = read(__DIR__ . '/routes.php'); // Read routes

if (file_exists(__DIR__ . '/../../env.php')) {
    $path = __DIR__ . '/../../env.php';
} elseif (file_exists(__DIR__ . '/env.php')) {
    $path = __DIR__ . '/env.php';
} else {
    throw new Exception("Internal server issues", 500);
}

$config = array_replace_recursive($config, read($path));
return $config;
