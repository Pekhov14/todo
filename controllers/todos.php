<?php

require_once 'Database.php';
require_once 'helpers.php';

$config = require('config.php');
$db = new Database($config['database']);

// Move to model
$todos = $db->query('SELECT * FROM tasks')->findAll();

require_once 'views/todos.view.php';