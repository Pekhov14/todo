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
        $data = [
            'start' => $start,
            'limit' => $limit,
        ];

        $query = "
            SELECT id
                 , name
                 , email
                 , description
                 , status
            FROM tasks
            WHERE 1 = 1";
        $query .= $this->buildSort($queryParams, $data);
        $query .= " LIMIT :start, :limit";

        return $this->db->query($query, $data)->findAll();
    }

    public function getCountTodos(array $queryParams): int
    {
        $data = [];

        $query = 'SELECT COUNT(id) AS count_todos FROM tasks WHERE 1 = 1';
        $query .= $this->buildSort($queryParams, $data);

        return $this->db->query($query, $data)->find()['count_todos'];
    }

    private function buildSort(array $queryParams, &$data): string
    {
        $query = '';

        if (isset($queryParams['status'])) {
            $query .= " AND status = :status";

            $data['status'] = $queryParams['status'];
        }

        if (isset($queryParams['sorted_name']) || isset($queryParams['sorted_email'])) {
            $query .= " ORDER BY";
        }

        if (isset($queryParams['sorted_name'])) {
            $query .= ($queryParams['sorted_name'] === 'desc')
                ? " name DESC"
                : " name ASC";
        }

        if (isset($queryParams['sorted_name'], $queryParams['sorted_email'])) {
            $query .= " ,";
        }

        if (isset($queryParams['sorted_email'])) {
            $query .= ($queryParams['sorted_email'] === 'desc')
                ? " email DESC"
                : " email ASC";
        }

        return $query;
    }

    public function edit(array $data): void
    {
        $query = "UPDATE tasks SET description = :description, status = :status";
        $query .= ' WHERE id = :id';

        $this->db->query($query, $data);
    }

    public function newTodo(array $data): void
    {
        $query = 'INSERT INTO tasks(name, email, description, status) VALUES(:name, :email, :description, :status)';

        $this->db->query($query, [
            'name'        => $data['name'],
            'email'       => $data['email'],
            'description' => $data['description'],
            'status'      => 'new',
        ]);
    }
}