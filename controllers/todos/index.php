<?php

session_start();

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
$count     = $model->getCountTodos($queryParams);

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

    if ((isset($_SESSION['user']))) {
        $todoData['edit'] = "<a href='todo?id={$todo['id']}' class='btn btn-primary'>Редактировать</a>";
    }

    $prepareTodos[] = $todoData;
}

$chosenFilter = [];

$chosenFilter['status']       = $queryParams['status'] ?? 'all';
$chosenFilter['sorted_name']  = $queryParams['sorted_name'] ?? 'all';
$chosenFilter['sorted_email'] = $queryParams['sorted_email'] ?? 'all';

$statuses = [
    [
        'key'     => 'Все статусы',
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

$sort = [
    [
        'key'     => 'Выбрать',
        'value'   => 'all',
    ],
    [
        'key'     => 'По возрастанию',
        'value'   => 'ask',
    ],
    [
        'key'     => 'По убыванию',
        'value'   => 'desc',
    ],
];

$actionButton = (isset($_SESSION['user']))
    ? '<a href="/logout" class="p-2 btn btn-outline-light me-2">Выйти</a>'
    : '<a href="/login" class="p-2 btn btn-outline-light me-2">Войти</a>';


$pagination = new Pagination();
$pagination = $pagination->create($queryParams, $pages);

view('todos/index.view.php', [
    'todos'        => $prepareTodos,
    'pages'        => $pages,
    'statuses'     => $statuses,
    'sort'         => $sort,
    'currentPage'  => $page,
    'chosenFilter' => $chosenFilter,
    'actionButton' => $actionButton,
    'paginations'  => $pagination,
]);