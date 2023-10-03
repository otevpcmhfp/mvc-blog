<?php

class Database
{
    public static ?PDO $db = null;
    public function __construct() {}

    public static function connect():void {
        $dsn = 'mysql:localhost;dbname=myblog';
        $username = 'mybloguser';
        $password = 'myblogpw';

        if(self::$db === null) {
            try {
                self::$db = new PDO($dsn, $username, $password);
            } catch (PDOException $e){
                $error_message = $e->getMessage();
                echo $error_message;
                exit();
            }
        }
    }

    private static function prepare(string $queryString, array $bindings = []): false|PDOStatement
    {
        $preparedStatement = self::$db->prepare($queryString);
        foreach($bindings as $bind => $value) {
            $preparedStatement->bindValue($bind, $value);
        }

        return $preparedStatement;
    }

    public static function queryAll(string $queryString, array $bindings = []): false|array
    {
        $statement = self::prepare($queryString, $bindings);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $results;
    }

    public static function querySingle(string $queryString, array $bindings = []) {
        $statement = self::prepare($queryString, $bindings);
        $statement->execute();
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $results;
    }

    public static function execute(string $queryString, array $bindings = []): bool
    {
        $statement = self::prepare($queryString, $bindings);
        return $statement->execute();
    }
}