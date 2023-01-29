<?php

require_once 'Database.php';
require_once 'helpers.php';
require_once 'Validator.php';

$title = 'Создание новой заметки';

$config = require('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (! Validator::string($_POST['name'])) {
        $errors['name'] = 'Имя обязательно к заполнению';
    }

    if (! Validator::email($_POST['email'])) {
        $errors['email'] = 'email должен быть корректным';
    }

    if (! Validator::string($_POST['description'], max:5000)) {
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

require_once 'views/todo-create.view.php';
