<?php

/**
 * Asterisks
 * Password manager
 *
 * Copyright (C) 2017  Pavle Obradovic (pajaja)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Interop\Container\ContainerInterface as ContainerInterface;

require '../vendor/autoload.php';

$config = [
    'settings' => [
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'asterisks',
            'username' => 'asterisks',
            'password' => 'asterisks',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => ''
        ],
        'logger' => [
            'name' => 'asterisks',
            'level' => Monolog\Logger::DEBUG,
            'path' => __DIR__ . '/../logs/app.log',
        ],
    ],
];

// instantiate the App object
$app = new \Slim\App($config);

$container = $app->getContainer();

// Setup logging
$container['logger'] = function ($c) {
    $logger = new \Monolog\Logger($c['settings']['logger']['name']);
    $file_handler = new \Monolog\Handler\StreamHandler($c['settings']['logger']['path']);
    $logger->pushHandler($file_handler);
    return $logger;
};

// Setup MySQL
$container['db'] = function ($c) {
    $dbs = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $dbs['host'] . ";dbname=" . $dbs['database'],
                   $dbs['username'], $dbs['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $pdo;
};

$container['capsule'] = function ($c) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($c['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
    return $capsule;
};

$container['RecordController'] = function ($c) {
    return new \Asterisks\Controller\RecordController($c);
};

$container['GroupController'] = function ($c) {
    return new \Asterisks\Controller\GroupController($c);
};


require __DIR__ . '/../routes.php';

// Run application
//$container->capsule;
$app->run();
