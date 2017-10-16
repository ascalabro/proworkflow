<?php
ini_set('display_errors',1); error_reporting(E_ALL);




require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload


use proworkflow\ApiClient;

$creds = require_once 'config.php';

// Use the API client by instantiating an instance with your PWF credentials
$c = new ApiClient($creds);
print_r($c->contacts());