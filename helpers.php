<?php


function dd($value): void
{
    var_dump($value);
    die();
}

function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
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