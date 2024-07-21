<?php

use Illuminate\Database\Capsule\Manager as Database;

$Database = new Database;

$Database->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'prueba',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci'
]);


$Database->setAsGlobal();
$Database->bootEloquent();