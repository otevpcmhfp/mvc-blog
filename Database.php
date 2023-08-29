<?php

class Database
{
    public $db;
    public function __construct() {
        $dsn = 'mysql:localhost;dbname=myblog';
        $username = 'mybloguser';
        $password = 'myblogpw';

        try {
            $this->db = new PDO($dsn, $username, $password);
        } catch (PDOException $e){
            $error_message = $e->getMessage();
            echo $error_message;
            exit();
        }
    }

    public function query($queryString) {
        return $this->db->prepare($queryString);
//        return $statement->execute();
    }

}