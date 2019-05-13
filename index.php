<?php

use Msgboard\helpers\AppRegistry;
use Msgboard\services\DatabaseConnect;
use Msgboard\services\ModelFactory;
use Msgboard\services\Router;
use League\Plates\Engine;

require_once 'vendor/autoload.php';

define('APP_PATH', __DIR__);
//$DIR = '/usr/local/var/www';

session_start();

$routes   = include 'config/routes.php';
$database = include 'config/database.php';
$app      = include 'config/app.php';

$template_engine = new Engine(APP_PATH . '/resources/views');
$databaseConnect = DatabaseConnect::getInstance($database);

$modelFactory = ModelFactory::getInstance($databaseConnect);
AppRegistry::$config = $app;

$router = new Router($routes);
$content = $router->dispatch($template_engine, $modelFactory);

print $content;
