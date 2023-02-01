<?php

$router->get('/', 'controllers/todos/index.php');
$router->get('/login', 'controllers/auth/show.php');
$router->post('/login', 'controllers/auth/login.php');
$router->get('/logout', 'controllers/auth/logout.php');
$router->get('/succes', 'controllers/succes.php');

$router->get('/todos', 'controllers/todos/create.php');
$router->post('/todos', 'controllers/todos/store.php');
$router->post('/todos/sort', 'controllers/todos/sort.php');
$router->get('/todo', 'controllers/todos/show.php');
$router->patch('/todo', 'controllers/todos/edit.php');
