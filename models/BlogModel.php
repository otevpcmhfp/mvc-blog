<?php

class BlogModel
{
    protected $db;
    public $id;
    public $title;
    public $author;
    public $excerpt;
    public $contents;
    public $created_at;

    public function __construct(array $properties=[]) {
        $this->db = new Database();
        foreach ($properties as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @return BlogModel[]
     */
    function allPosts(): array
    {
        $query = "SELECT id,title,author,excerpt,contents,created_at FROM myblog.posts";
        $results = $this->db->queryAll($query);
        $blogPosts = [];
        foreach ($results as $result) {
            $blogPosts[] = new BlogModel($result);
        }
        return $blogPosts;
    }

    function recentPosts(): false|array
    {
        $query = "SELECT id,title,author,excerpt,contents,created_at FROM myblog.posts LIMIT 5";
        $results = $this->db->queryAll($query);
        $blogPosts = [];
        foreach ($results as $result) {
            $blogPosts[] = new BlogModel($result);
        }
        return $blogPosts;
    }

    function getPost($id): BlogModel
    {
        $query = "SELECT id,title,author,excerpt,contents,created_at FROM myblog.posts WHERE id = :id";
        $result = $this->db->querySingle($query, [
            ':id' => $id
        ]);
        return new BlogModel($result);
    }

    function addPost($title,$author,$excerpt,$contents) {
        try {
            $query = 'INSERT INTO myblog.posts (title,author,excerpt,contents)
                      VALUES (:title,:author,:excerpt,:contents)';

            return $this->db->execute($query, [
                ':title' => $title,
                ':author' => $author,
                ':excerpt' => $excerpt,
                ':contents' => $contents,
            ]);




//            $statement = $this->db->query($query);
//            $statement->bindValue(':title',$title);
//            $statement->bindValue(':author',$author);
//            $statement->bindValue(':excerpt',$excerpt);
//            $statement->bindValue(':contents',$contents);
//            $statement->execute();
//            $statement->closeCursor();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }

    }

    public function updatePost($id,$title,$author,$excerpt,$contents): bool {


        $query = 'UPDATE myblog.posts
                  SET title = :title, author = :author, excerpt = :excerpt, contents = :contents
                  WHERE id = :id';

        return $this->db->execute($query, [
            ':id' => $id,
            ':title' => $title,
            ':author' => $author,
            ':excerpt' => $excerpt,
            ':contents' => $contents,
        ]);

//        $statement = $this->db->query($query);
//        $statement->bindValue(':title',$title);
//        $statement->bindValue(':author',$author);
//        $statement->bindValue(':excerpt',$excerpt);
//        $statement->bindValue(':contents',$contents);
//        $statement->bindValue(':id',$id);
//        $statement->execute();
//        $statement->closeCursor();
    }

    function deletePost($id): bool
    {

        $query = 'DELETE FROM myblog.posts
                  WHERE id = :id';

        return $this->db->execute($query, [
            ':id' => $id
        ]);

//        $statement = $this->db->query($query);
//        $statement->bindValue(':id',$id);
//        $statement->execute();
//        $statement->closeCursor();
    }


}

