<?php

namespace SiteDezz;

use Dez\Config\Config;
use Dez\Mvc\Application;
use Dez\Mvc\FactoryContainer;
use Dez\View\Engine\Php;

error_reporting(1);
ini_set('display_errors', 1);

include_once '../app/vendor/autoload.php';

new FactoryContainer();

$app = new Application();

$app->config->merge(Config::factory('../app/config/app.php'));

$app->setControllerNamespace($app->config['application']['controllerNamespace']);

$app->loader->registerNamespaces(
    $app->config['application']['autoload']->toArray()
)->register();

$app->url->setBasePath($app->config['application']['basePath']);

$app->view
    ->setViewDirectory($app->config['application']['viewDirectory'])
    ->registerEngine('.php', new Php($app->view));

$app->run();