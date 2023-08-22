<?php
require_once("db.php");

function allPosts() {
    global $db;

    $query = "SELECT id,title,author,excerpt,contents,created_at
    FROM myblog.posts";

    $statement = $db->prepare($query);
    $statement->execute();
    $posts = $statement->fetchAll();
    $statement->closeCursor();
    return $posts;
}

function recentPosts() {
    global $db;

    $query = "SELECT id,title,author,excerpt,contents,created_at
    FROM myblog.posts
    LIMIT 5";

    $statement = $db->prepare($query);
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $posts;
}

function getPost($id) {
    global $db;

    $query = "SELECT id,title,author,excerpt,contents,created_at
    FROM myblog.posts
    WHERE id = :id";

    $statement = $db->prepare($query);
    $statement->bindValue(':id',$id);
    $statement->execute();
    $posts = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $posts;
}

function addPost($title,$author,$excerpt,$contents) {
    try {
        global $db;

        $query = 'INSERT INTO myblog.posts (title,author,excerpt,contents)
        VALUES (:title,:author,:excerpt,:contents)';
    
        $statement = $db->prepare($query);
        $statement->bindValue(':title',$title);
        $statement->bindValue(':author',$author);
        $statement->bindValue(':excerpt',$excerpt);
        $statement->bindValue(':contents',$contents);
        $statement->execute();
        $statement->closeCursor();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit();
    }

}

function updatePost($id,$title,$author,$excerpt,$contents) {
    global $db;

    $query = 'UPDATE myblog.posts
    SET title = :title,
    author = :author,
    excerpt = :excerpt,
    contents = :contents
    WHERE id = :id';

    $statement = $db->prepare($query);
    $statement->bindValue(':title',$title);
    $statement->bindValue(':author',$author);
    $statement->bindValue(':excerpt',$excerpt);
    $statement->bindValue(':contents',$contents);
    $statement->bindValue(':id',$id);
    $statement->execute();
    $statement->closeCursor();
}

function deletePost($id) {
    global $db;

    $query = 'DELETE FROM myblog.posts
    WHERE id = :id';

    $statement = $db->prepare($query);
    $statement->bindValue(':id',$id);
    $statement->execute();
    $statement->closeCursor();
}