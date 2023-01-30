<?php


use Core\Response;

function dd($value): void
{
    var_dump($value);
    die();
}

function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort(int $code = 404): never {
    http_response_code($code);
    require base_path("views/{$code}.view.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

function base_path(string $path): string
{
    return BASE_PATH . $path;
}

function view(string $path, $attributes = []): string
{
    extract($attributes);

    return require base_path('views/' . $path);
}