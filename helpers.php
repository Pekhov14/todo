<?php

use JetBrains\PhpStorm\NoReturn;

#[NoReturn]
function dd($value): void
{
    var_dump($value);
    die();
}

function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}