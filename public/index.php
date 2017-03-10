<?php

require_once __DIR__ . '/../config/bootstrap.php';

$request = request();
$response = response();
dispatch($request, $response, config()->get('routes'));
