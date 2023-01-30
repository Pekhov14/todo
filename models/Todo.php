<?php

namespace models;

use Core\App;
use Core\Database;

class Todo
{
    private $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function getAllTodos($start, $limit)
    {
        return $this->db->query("
            SELECT id
                 , name
                 , email
                 , description
                 , status
            FROM tasks
            LIMIT {$start}, {$limit}
        ")->findAll();
    }

    public function getCountTodos(): int
    {
        return $this->db->query(
            'SELECT COUNT(id) AS count_todos FROM tasks'
        )->find()['count_todos'];
    }
}