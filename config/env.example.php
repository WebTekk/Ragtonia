<?php

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');

$config = array();

/*
 * Mail
 * */
$config['mail']['pw'] = '';
$config['mail']['host'] = '';
$config['mail']['username'] = '';
$config['mail']['from_email'] = '';
$config['mail']['to_email'] = '';
$config['mail']['name'] = '';
$config['mail']['port'] = '25';
$config['mail']['SMTPAuth'] = true;
$config['mail']['SMTPSecure'] = 'tls';
$config['mail']['SMTPDebug'] = '1'; //

/*
 * Database
 * */
$config['db']['database'] = '';
$config['db']['username'] = '';
$config['db']['password'] = '';

$config['github_token'] = '';

$config['assets']['minify'] = true;

return $config;
