<?php

use Core\Validator;
use models\Todo;

$model = new Todo();

$errors = [];

if (! Validator::string($_POST['name'])) {
    $errors['name'] = 'Имя обязательно к заполнению';
}

if (! Validator::email($_POST['email'])) {
    $errors['email'] = 'email должен быть корректным';
}

if (! Validator::string($_POST['description'], max:1000)) {
    $errors['description'] = 'Текст должен быть в пределах от 1 до 5,000 символов';
}

if (! empty($errors)) {
    return view('todos/create.view.php', [
        'title'  => 'Создание новой заметки',
        'errors' => $errors,
    ]);
}

$data = [
    'name'        => htmlspecialchars($_POST['name']),
    'email'       => htmlspecialchars($_POST['email']),
    'description' => htmlspecialchars($_POST['description']),
    'status'      => 'new',
];

$model->newTodo($data);

header('location: /succes');
exit();
