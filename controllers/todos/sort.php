<?php

if (isset($_POST['status']) && $_POST['status'] === 'all') {
    unset($_POST['status']);
}

if (isset($_POST['sorted_name']) && $_POST['sorted_name'] === 'all') {
    unset($_POST['sorted_name']);
}

$query = '?' . http_build_query($_POST);

header("Location: /{$query}", true, 302);
exit();
