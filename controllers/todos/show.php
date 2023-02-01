<?php

session_start();

use Core\App;
use Core\Database;
use Core\Validator;

$actionButton = (isset($_SESSION['user']))
    ? '<a href="/logout" class="p-2 btn btn-outline-light me-2">Выйти</a>'
    : '<a href="/login" class="p-2 btn btn-outline-light me-2">Войти</a>';


if (! isset($_SESSION['user'])) {
    abort(403);
}

$title = 'Редактирование заметки';

$db = App::resolve(Database::class);

$taskId = $_GET['id'];

$errors = [];

$task = $db->query('
    SELECT id
         , name
         , email
         , description
         , status
    FROM tasks
    WHERE id = :id
', ['id' => $taskId])->findOrFail();

view('todos/edit.view.php', [
    'title'        => $title,
    'task'         => $task,
    'actionButton' => $actionButton,
]);
