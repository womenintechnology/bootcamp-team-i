<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Router;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader as DIYamlFileLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');
$container = new ContainerBuilder();
$container->setParameter('database.mysql.dns',"mysql:dbname={$_ENV['MYSQL_DATABASE']};host=db");
$container->setParameter('database.mysql.user', $_ENV['MYSQL_USER']);
$container->setParameter('database.mysql.password', $_ENV['MYSQL_PASSWORD']);
$loader = new DIYamlFileLoader($container, new FileLocator(__DIR__ . '/../config/'));
$loader->load('services.yml');
$locator = new FileLocator([__DIR__ . '/../config/']);

$router = new Router(
    new YamlFileLoader($locator),
    'routing.yml'
);
try {
    $route = $router->match($_SERVER['REQUEST_URI']);
    $get = $route;
    unset($get['_controller']);
    unset($get['_route']);
} catch (ResourceNotFoundException $exception) {
    echo 'Page not found';
    die();
}

$request = new Request($get, $_POST, [], $_COOKIE, $_FILES, $_SERVER);
$container->set('request', $request);
$_SERVER = [];
$_POST = [];
$_GET = [];
$app = $container->get($route['_controller']);

try {
    $app->run()->send();
} catch (ResourceNotFoundException $exception) {
    echo 'Page not found';
    die();
} catch (\Exception $exception) {
    echo 'Something went wrong.';
    die();
}
