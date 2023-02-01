<?php

session_start();

use Core\App;
use Core\Database;
use Core\Validator;
use models\User;

$db = App::resolve(Database::class);

$model = new User();

$errors = [];

$data = [
    'password' => htmlspecialchars($_POST['password']),
    'login'    => htmlspecialchars($_POST['login']),
];

$actionButton = (isset($_SESSION['user']))
    ? '<a href="/logout" class="p-2 btn btn-outline-light me-2">Выйти</a>'
    : '<a href="/login" class="p-2 btn btn-outline-light me-2">Войти</a>';


if (! Validator::string($data['password'])) {
    $errors['password'] = 'Пароль обязательно к заполнению';
}

if (! Validator::string($data['login'])) {
    $errors['login'] = 'login должен быть корректным';
}

if (! empty($errors)) {
    return view('login.view.php', [
        'title'        => 'Добро пожаловать 😘',
        'errors'       => $errors,
        'actionButton' => $actionButton,
    ]);
}

$user = $model->verifyUser($data['login'], $data['password']);

if (!$user) {
    return view('login.view.php', [
        'title'        => 'Добро пожаловать 😘',
        'errors'       => ['password' => 'Логин или пароль не подходят'],
        'actionButton' => $actionButton,
    ]);
}

$_SESSION['user'] = $data['login'];


header('location: /');
exit();
