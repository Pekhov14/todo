<?php

if (isset($_POST['status']) && $_POST['status'] === 'all') {
    unset($_POST['status']);
}

$query = '?' . http_build_query($_POST);

header("Location: /{$query}", true, 302);
exit();
