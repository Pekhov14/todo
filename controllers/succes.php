<?php

$actionButton = (isset($_SESSION['user']))
    ? '<a href="/logout" class="p-2 btn btn-outline-light me-2">Выйти</a>'
    : '<a href="/login" class="p-2 btn btn-outline-light me-2">Войти</a>';


return view('succes.view.php', [
    'title'  => 'Успех 🥳',
    'actionButton' => $actionButton,
]);