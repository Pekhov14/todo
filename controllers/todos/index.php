<?php

use Core\Database;

$config = require base_path('config.php');
$db     = new Database($config['database']);

// Move to model, забирать только нужные столбцы
$todos = $db->query('
    SELECT id
         , name
         , email
         , description
         , status
    FROM tasks
')->findAll();

// Формировать нужные ссылки и правильную надпись статуса
//$todos

view('todos/index.view.php', [
    'todos' => $todos
]);