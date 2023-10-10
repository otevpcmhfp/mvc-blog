<?php

class BaseRepository implements BaseRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getDb();
    }

    public function prepare(string $queryString, array $bindings = []): false|PDOStatement
    {
        $preparedStatement = $this->db->prepare($queryString);
        foreach($bindings as $bind => $value) {
            $preparedStatement->bindValue($bind, $value);
        }

        return $preparedStatement;
    }

    public function queryAll(string $queryString, array $bindings = []): false|array
    {
        $statement = $this->prepare($queryString, $bindings);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $results;
    }

    public function querySingle(string $queryString, array $bindings = []) {
        $statement = $this->prepare($queryString, $bindings);
        $statement->execute();
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $results;
    }

    public function execute(string $queryString, array $bindings = []): bool
    {
        $statement = $this->prepare($queryString, $bindings);
        return $statement->execute();
    }
}
