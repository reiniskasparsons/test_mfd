<?php
require '../vendor/autoload.php';
require '../src/models/patients.php';
require '../src/handlers/exception.php';

$config = include('../src/config.php');

$app = new \Slim\App([
    'settings'=> $config
]);

$container = $app->getContainer();
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('views/');
};
// Register component on container
$capsule = new \Illuminate\Database\Capsule\Manager();
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$capsule->getContainer()->singleton(
    \Illuminate\Contracts\Debug\ExceptionHandler::class,
    \AppExceptions\Handler::class
);

require '../src/routes.php';


$app->run();