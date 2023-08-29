<?php
    $dsn = 'mysql:localhost;dbname=myblog';
    $username = 'mybloguser';
    $password = 'myblogpw';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e){
        $error_message = $e->getMessage();
        echo $error_message;
        exit();
    }