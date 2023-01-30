<?php

use Core\App;
use Core\Database;
use Core\Validator;

$title = 'Редактирование заметки';

$db = App::resolve(Database::class);

$taskId = $_GET['id'];

$errors = [];

$user = 'admin';

authorize($user === 'admin');

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
    'title' => $title,
    'task'  => $task,
]);
