<?php

namespace Core;

use PDO;

class Database {
    public PDO $connection;

    protected $statement;

    public function __construct($config, $username = 'root', $password = '123')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    private function bind($parameter, $value, $var_type = null)
    {
        if (is_null($var_type)) {
            $var_type = match (true) {
                is_bool($value) => PDO::PARAM_BOOL,
                is_int($value)  => PDO::PARAM_INT,
                is_null($value) => PDO::PARAM_NULL,
                default         => PDO::PARAM_STR,
            };
        }

        $this->statement->bindParam($parameter, $value, $var_type);
    }

    public function query(string $query, $params = []): static
    {
        $this->statement = $this->connection->prepare($query);

        foreach ($params as $param_key => $param_value) {
            $this->bind(":{$param_key}", $param_value);
        }

        $this->statement->execute();

        return $this;
    }

    public function fetch()
    {
        return $this->statement->fetch();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findAll()
    {
        return $this->statement->fetchAll();
    }


    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }
}