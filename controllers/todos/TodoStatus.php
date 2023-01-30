<?php

namespace controllers\todos;

enum TodoStatus: string
{
    case new = 'Новый 🆕';
    case done = 'Выполнено ✅';

    public static function getValue($status): string
    {
        return match($status) {
            'new' => self::new->value,
            'done' => self::done->value,
        };
    }
}
