<?php

session_start();

$actionButton = (isset($_SESSION['user']))
    ? '<a href="/logout" class="p-2 btn btn-outline-light me-2">Выйти</a>'
    : '<a href="/login" class="p-2 btn btn-outline-light me-2">Войти</a>';


view('login.view.php', [
    'title'        => 'Добро пожаловать 😘',
    'actionButton' => $actionButton,
]);
