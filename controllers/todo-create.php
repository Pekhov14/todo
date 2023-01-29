<?php

require_once 'Database.php';
require_once 'helpers.php';

$title = 'Создание новой заметки';

$config = require('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    // Валидирывать в роутере $_POST
    if (mb_strlen($_POST['name']) === 0) {
        $errors['name'] = 'Имя обязательно к заполнению';
    }

    if (mb_strlen($_POST['email']) === 0) {
        $errors['email'] = 'email обязателен к заполнению';
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email не корректный';
    }

    if (mb_strlen($_POST['description']) === 0) {
        $errors['description'] = 'Описание обязательно к заполнению';
    }

    if (mb_strlen($_POST['description']) > 5000) {
        $errors['description'] = 'Текст больше 5,000 символов';
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
