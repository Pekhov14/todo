<?php

use Core\Validator;
use models\Todo;

if (! isset($_SESSION['user'])) {
    abort(403);
}

$title = 'Редактирование заметки';

$model = new Todo();

$errors = [];

if (! Validator::string($_POST['description'], max:1000)) {
    $errors['description'] = 'Текст должен быть в пределах от 1 до 5,000 символов';
}

$data = [
    'id'          => $_POST['id'],
    'description' => htmlspecialchars($_POST['description']),
    'status' => (isset($_POST['status'])) ? 'done' : 'new',
];


if (empty($errors)) {
    $model->edit($data);
}

header('location: /succes');
exit();