<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

ini_set('display_errors',1); error_reporting(E_ALL);

use proworkflow\ApiClient;

$settings = [
        'username' => 'me@gmail.com',
        'password' => 'Pass1',
        'apikey' => 'XXXX-XXXX-XXXX-XXXX-XXXX-XXXX'
];

$c = new ApiClient($settings['apikey'], $settings['username'], $settings['password']);
print_r($c->projects());