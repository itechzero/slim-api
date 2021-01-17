<?php
declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addErrorMiddleware(true,false,false);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello Slim !");
    return $response;
});

$app->run();