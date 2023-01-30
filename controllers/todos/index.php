<?php

use controllers\todos\TodoStatus;
use Core\Pagination;
use models\Todo;

$model = new Todo();

$queryString = [];

if (isset($_SERVER['QUERY_STRING'])) {
    parse_str($_SERVER['QUERY_STRING'], $queryString);
}

$page = (isset($queryString['page']) && $queryString['page'] > 0) ? (int)$queryString['page'] : 1;

$pageLimit = 3;
$count     = $model->getCountTodos();

$pages = ceil($count / $pageLimit);
$start = ($page - 1) * $pageLimit;

$todos = $model->getAllTodos($start, $pageLimit);

$prepareTodos = [];

foreach ($todos as $todo) {
    $prepareTodos[] = [
        'id'          => $todo['id'],
        'name'        => htmlspecialchars($todo['name']),
        'email'       => htmlspecialchars($todo['email']),
        'description' => htmlspecialchars($todo['description']),
        'status'      => TodoStatus::getValue($todo['status']),
    ];
}

$pagination = new Pagination();
$pagination = $pagination->create($queryString, $pages);

view('todos/index.view.php', [
    'todos'       => $prepareTodos,
    'pages'       => $pages,
    'paginations' => $pagination,
]);