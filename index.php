<?php

require_once 'helpers.php';
require_once 'router.php';
require_once 'Database.php';

$config = require('config.php');
$db = new Database($config['database']);
