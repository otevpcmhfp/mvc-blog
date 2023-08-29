<?php

class BlogModel
{
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    function allPosts() {

        $query = "SELECT id,title,author,excerpt,contents,created_at
    FROM myblog.posts";

        $statement = $this->db->query($query);
        $statement->execute();
        $posts = $statement->fetchAll();
        $statement->closeCursor();
        return $posts;
    }

    function recentPosts() {

        $query = "SELECT id,title,author,excerpt,contents,created_at
    FROM myblog.posts
    LIMIT 5";

        $statement = $this->db->query($query);
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $posts;
    }

    function getPost($id) {

        $query = "SELECT id,title,author,excerpt,contents,created_at
    FROM myblog.posts
    WHERE id = :id";

        $statement = $this->db->query($query);
        $statement->bindValue(':id',$id);
        $statement->execute();
        $posts = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $posts;
    }

    function addPost($title,$author,$excerpt,$contents) {
        try {


            $query = 'INSERT INTO myblog.posts (title,author,excerpt,contents)
        VALUES (:title,:author,:excerpt,:contents)';

            $statement = $this->db->query($query);
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

    public function updatePost($id,$title,$author,$excerpt,$contents) {


        $query = 'UPDATE myblog.posts
    SET title = :title,
    author = :author,
    excerpt = :excerpt,
    contents = :contents
    WHERE id = :id';

        $statement = $this->db->query($query);
        $statement->bindValue(':title',$title);
        $statement->bindValue(':author',$author);
        $statement->bindValue(':excerpt',$excerpt);
        $statement->bindValue(':contents',$contents);
        $statement->bindValue(':id',$id);
        $statement->execute();
        $statement->closeCursor();
    }

    function deletePost($id) {

        $query = 'DELETE FROM myblog.posts
    WHERE id = :id';

        $statement = $this->db->query($query);
        $statement->bindValue(':id',$id);
        $statement->execute();
        $statement->closeCursor();
    }


}

