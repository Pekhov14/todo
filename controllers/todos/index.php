<?php

use controllers\todos\TodoStatus;
use Core\Pagination;
use models\Todo;

$model = new Todo();

$queryParams = [];

if (isset($_SERVER['QUERY_STRING'])) {
    parse_str($_SERVER['QUERY_STRING'], $queryParams);
}

$page = (isset($queryParams['page']) && $queryParams['page'] > 0) ? (int)$queryParams['page'] : 1;

$pageLimit = 3;
$count     = $model->getCountTodos();

$pages = ceil($count / $pageLimit);
$start = ($page - 1) * $pageLimit;

$todos = $model->getAllTodos($start, $pageLimit, $queryParams);

$prepareTodos = [];

foreach ($todos as $todo) {
    $todoData = [
        'id'          => $todo['id'],
        'name'        => htmlspecialchars($todo['name']),
        'email'       => htmlspecialchars($todo['email']),
        'description' => htmlspecialchars($todo['description']),
        'status'      => TodoStatus::getValue($todo['status']),
        'edit'        => '',
    ];

//    if admin
    $todoData['edit'] = "<a href='todo?id={$todo['id']}' class='btn btn-primary'>Редактировать</a>";

    $prepareTodos[] = $todoData;
}

// Тут будет
$chosenFilter = [];

$chosenFilter['status'] = $queryParams['status'] ?? 'all';

$statuses = [
    [
        'key'     => 'Все',
        'value'   => 'all',
    ],
    [
        'key'   => TodoStatus::new->value,
        'value' => TodoStatus::new->name,
    ],
    [
        'key'   => TodoStatus::done->value,
        'value' => TodoStatus::done->name,
    ],
];

$pagination = new Pagination();
$pagination = $pagination->create($queryParams, $pages);

view('todos/index.view.php', [
    'todos'        => $prepareTodos,
    'pages'        => $pages,
    'statuses'     => $statuses,
    'currentPage'  => $page,
    'chosenFilter' => $chosenFilter,
    'paginations'  => $pagination,
]);