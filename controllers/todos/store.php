<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

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

$query = 'INSERT INTO tasks(name, email, description, status) VALUES(:name, :email, :description, :status)';

$db->query($query, [
    'name'        => $_POST['name'],
    'email'       => $_POST['email'],
    'description' => $_POST['description'],
    'status'      => 'new',
]);

header('location: /');
exit();
