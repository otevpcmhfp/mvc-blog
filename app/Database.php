<?php

class Database
{
    private static ?PDO $db = null;

    public static function getDb(): PDO
    {
        if(self::$db === null) {
            $dsn = 'mysql:localhost;dbname=myblog';
            $username = 'mybloguser';
            $password = 'myblogpw';

            try {
                self::$db = new PDO($dsn, $username, $password);
            } catch (PDOException $e){
                $error_message = $e->getMessage();
                echo $error_message;
                exit();
            }
        }
        return self::$db;
    }


//    private ?PDO $db = null;
//    public function __construct() {
//        $dsn = 'mysql:localhost;dbname=myblog';
//        $username = 'mybloguser';
//        $password = 'myblogpw';
//
//        if($this->db === null) {
//            try {
//                $this->db = new PDO($dsn, $username, $password);
//            } catch (PDOException $e){
//                $error_message = $e->getMessage();
//                echo $error_message;
//                exit();
//            }
//        }
//    }
//
//    public function prepare(string $queryString, array $bindings = []): false|PDOStatement
//    {
//        $preparedStatement = $this->db->prepare($queryString);
//        foreach($bindings as $bind => $value) {
//            $preparedStatement->bindValue($bind, $value);
//        }
//
//        return $preparedStatement;
//    }
//
//    public function queryAll(string $queryString, array $bindings = []): false|array
//    {
//        $statement = $this->prepare($queryString, $bindings);
//        $statement->execute();
//        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
//        $statement->closeCursor();
//        return $results;
//    }
//
//    public function querySingle(string $queryString, array $bindings = []) {
//        $statement = $this->prepare($queryString, $bindings);
//        $statement->execute();
//        $results = $statement->fetch(PDO::FETCH_ASSOC);
//        $statement->closeCursor();
//        return $results;
//    }
//
//    public function execute(string $queryString, array $bindings = []): bool
//    {
//        $statement = $this->prepare($queryString, $bindings);
//        return $statement->execute();
//    }
}