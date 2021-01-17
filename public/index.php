<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Instantiate PHP-DI ContainerBuilder
$containerBuilder = new ContainerBuilder();

if (true) { // Should be set to true in production
    $containerBuilder->enableCompilation(__DIR__ . '/../var/cache');
}
// Set up settings
$settings = require __DIR__ . '/../config/settings.php';
$settings($containerBuilder);

$app = AppFactory::create();

$app->addErrorMiddleware(true,false,false);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello Slim !!");
    return $response;
});

$app->run();