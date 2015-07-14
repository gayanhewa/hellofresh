<?php
session_start();

// Initialize the router , to make my routes look sexy.
$router = new Hoa\Router\Http();

// AuraPHP DI container , to better handle my dependencies, first choice was php-di or laravel's IoC container
// but the requirement is compatibility PHP 5.3 onwards
$di = new  Aura\Di\Container(new Aura\Di\Factory);

// Route Mapping
require __DIR__."/../route.php";

// DI bindings
require __DIR__."/../config/di-bindings.php";

/**
 *  Setup and configure the DB
 *  Paris and Idiorm , a lightweight ORM and ActiveRecord implementation.
 */

$db_config = require __DIR__."/../config/database.php";
ORM::configure('mysql:host='.$db_config['host'].';dbname='.$db_config['database']);
ORM::configure('username', $db_config['username']);
ORM::configure('password', $db_config['password']);

// Dispatch routes
$dispatcher = new Hoa\Dispatcher\Basic();


try {

    $dispatcher->dispatch($router);

}catch (Hoa\Router\Exception\NotFound $e) {

    echo "Requested URI not found.";
}