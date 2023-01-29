<?php

class Validator
{
    // Статика для чистых функций
    public static function string($value, $min = 1, $max = INF): bool
    {
        $value = trim($value);

        return $value >= $min && mb_strlen($value) <= $max;
    }

    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}