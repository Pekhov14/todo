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

    public function getAllTodos($start, $limit, array $queryParams)
    {
        $query = "
            SELECT id
                 , name
                 , email
                 , description
                 , status
            FROM tasks
            WHERE 1 = 1
        ";

        $data = [];

        if (isset($queryParams['status'])) {
            $query .= " AND status = :status";

            $data['status'] = $queryParams['status'];
        }


        $query .= "  LIMIT {$start}, {$limit}";

        return $this->db->query($query, $data)->findAll();
    }

    public function getCountTodos(): int
    {
        return $this->db->query(
            'SELECT COUNT(id) AS count_todos FROM tasks'
        )->find()['count_todos'];
    }
}