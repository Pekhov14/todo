<?php

session_start();

use models\Todo;

$model = new Todo();

$actionButton = (isset($_SESSION['user']))
    ? '<a href="/logout" class="p-2 btn btn-outline-light me-2">Выйти</a>'
    : '<a href="/login" class="p-2 btn btn-outline-light me-2">Войти</a>';


if (! isset($_SESSION['user'])) {
    abort(403);
}

$title  = 'Редактирование заметки';
$taskId = $_GET['id'];
$errors = [];

$task = $model->getOneTodo($taskId);

view('todos/edit.view.php', [
    'title'        => $title,
    'task'         => $task,
    'actionButton' => $actionButton,
]);
