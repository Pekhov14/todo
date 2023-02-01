<?php

namespace models;

use Core\App;
use Core\Database;

class User
{

    private $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function verifyUser(string $login, string $password): bool
    {
        $query = 'SELECT password FROM users WHERE name = :login';

        $user = $this->db->query($query, [
            'login' => $login
        ])->find();

        if (!isset($user['password'])) {
            return false;
        }

        return password_verify($password, $user['password']);
    }
}