<?php

function abort(int $code = 404): never {
    http_response_code($code);
    require base_path("views/{$code}.view.php");
    die();
}

function routeToController($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require_once base_path($routes[$uri]);
    }
    else {
        abort();
    }
}

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);