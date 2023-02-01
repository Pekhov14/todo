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

    public function getAllTodos(int $start, int $limit, array $queryParams)
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

        $data = [
            'start' => $start,
            'limit' => $limit,
        ];

        if (isset($queryParams['status'])) {
            $query .= " AND status = :status";

            $data['status'] = $queryParams['status'];
        }

        // or sorted_email
        if (isset($queryParams['sorted_name'])) {
            $query .= " ORDER BY";
        }

        if (isset($queryParams['sorted_name'])) {
            $query .= ($queryParams['sorted_name'] === 'desc')
                ? " name DESC"
                : " name ASC";
        }


        $query .= " LIMIT :start, :limit";

        return $this->db->query($query, $data)->findAll();
    }

    public function getCountTodos(array $queryParams): int
    {
        $query = 'SELECT COUNT(id) AS count_todos FROM tasks WHERE 1 = 1';

        $data = [];

        if (isset($queryParams['status'])) {
            $query .= " AND status = :status";

            $data['status'] = $queryParams['status'];
        }

        if (isset($queryParams['sorted_name'])) {
            $query .= " ORDER BY";
        }

        if (isset($queryParams['sorted_name'])) {
            $query .= ($queryParams['sorted_name'] === 'desc')
                ? " name DESC"
                : " name ASC";
        }

        return $this->db->query($query, $data)->find()['count_todos'];
    }
}