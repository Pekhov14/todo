<?php

use Core\Database;
use Core\Validator;

$title = 'Редактирование заметки';

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

//$user = 'guest';
$user = 'admin';

authorize($user === 'admin');

if (! Validator::string($_POST['description'], max:1000)) {
    $errors['description'] = 'Текст должен быть в пределах от 1 до 5,000 символов';
}

$data = [
    'id'          => $_POST['id'],
    'description' => $_POST['description'],
];

$query = "UPDATE tasks SET description = :description, status = :status";

$data['status'] = (isset($_POST['status'])) ? 'done' : 'new';

$query .= ' WHERE id = :id';

if (empty($errors)) {
    $db->query($query, $data);
}

// TODO: Редирект на страницу успеха

header('location: /');
exit();