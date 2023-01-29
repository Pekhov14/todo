<?php

$routes = require('routes.php');

function abort(int $code = 404): never {
    http_response_code($code);
    require_once "views/{$code}.view.php";
    die();
}

function routeToController($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require_once $routes[$uri];
    }
    else {
        abort();
    }
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);