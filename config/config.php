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

/*
 * This countries were checked by zip-codes
 *
 * 1 country per line!
 */
$config['plz']['land'][] = 'ch';
$config['plz']['land'][] = 'CH';
$config['plz']['land'][] = 'Schweiz';
$config['plz']['land'][] = 'Switzerland';
$config['plz']['land'][] = 'swiss';
$config['plz']['land'][] = 'suisse';

/*
 * Mail config
 * */
$config['mail']['charset'] = 'UTF-8'; // Mail charset
$config['mail']['SMTPAuth'] = true; // SMTPAuth
$config['mail']['pw'] = ''; // Mail password
$config['mail']['host'] = ''; // Mail host
$config['mail']['username'] = ''; // Mail address
$config['mail']['name'] = ''; // Your Name
$config['mail']['SMTPSecure'] = ''; //
$config['mail']['SMTPDebug'] = '0'; //

/*
 * Database config
 * */
$config['db']['host'] = '127.0.0.1'; // Database hostname
$config['db']['port'] = '3306'; // Database port
$config['db']['database'] = ''; // Database name
$config['db']['username'] = ''; // Database username
$config['db']['password'] = ''; // Database password
$config['db']['charset'] = 'utf8'; // Database charset
$config['db']['encoding'] = 'utf8'; // Database encoding
$config['db']['collation'] = 'utf8_unicode_ci'; // Database collation

$config['canonicalUrl'] = 'localhost/ContactForm'; // Canonical URL

$config['viewPath'] = __DIR__ . '/../src/View'; // Path to View folder

$config['assets']['cachePath'] =  __DIR__ . '/../tmp/cache'; // Cache directory path
$config['assets']['lifetime'] = 0; // Cache lifetime, 0 == no expire
$config['assets']['minify'] = true; // Enable minifying

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
