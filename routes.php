<?php

$router->get('/', 'controllers/todos/index.php');
$router->get('/login', 'controllers/login.php');
$router->get('/todos/create', 'controllers/todos/create.php');
$router->get('/todo', 'controllers/todos/edit.php');
$router->patch('/todo', 'controllers/todos/edit.php');
