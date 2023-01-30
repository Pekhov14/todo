<?php

use Core\Database;
use Core\Validator;

$title = 'Создание новой заметки';

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (! Validator::string($_POST['name'])) {
        $errors['name'] = 'Имя обязательно к заполнению';
    }

    if (! Validator::email($_POST['email'])) {
        $errors['email'] = 'email должен быть корректным';
    }

    if (! Validator::string($_POST['description'], max:1000)) {
        $errors['description'] = 'Текст должен быть в пределах от 1 до 5,000 символов';
    }

    $query = 'INSERT INTO tasks(name, email, description, status) VALUES(:name, :email, :description, :status)';


    // Из $_POST перенести в переменные и во вьюхе значение переменной выводить просто, по дефолту пустое
    if (empty($errors)) {
        $db->query($query, [
            'name'        => $_POST['name'],
            'email'       => $_POST['email'],
            'description' => $_POST['description'],
            'status'      => 'new',
        ]);
    }
}

view('todos/create.view.php', [
    'title'  => $title,
    'errors' => $errors,
]);
