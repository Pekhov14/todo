<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

// Move to model, забирать только нужные столбцы
$todos = $db->query('SELECT * FROM tasks')->findAll();

view('todos/index.view.php', [
    'todos' => $todos
]);