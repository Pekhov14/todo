<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/'      => 'controllers/index.php',
    '/login' => 'controllers/login.php',
];

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

routeToController($uri, $routes);