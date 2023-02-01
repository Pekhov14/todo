<?php


session_start();


if (isset($_SESSION['user'])) {
    session_destroy();

    header('location: /login', true, 302);
    exit();
}

header('location: /', true, 302);
exit();