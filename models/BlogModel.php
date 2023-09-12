<?php
class BlogModel
{
    public ?int $id;
    public string $title;
    public string $author;
    public string $excerpt;
    public string $contents;
    public ?string $created_at;

    public function __construct(string $title,
                                string $author,
                                string $excerpt,
                                string $contents,
                                ?int $id = null,
                                ?string $created_at = null
    )
    {

        $this->title = $title;
        $this->author = $author;
        $this->excerpt = $excerpt;
        $this->contents = $contents;
        $this->id = $id;
        $this->created_at = $created_at;

    }

    /**
     * @return BlogModel[]
     */
    public static function allPosts(): array
    {
        $query = "SELECT id,title,author,excerpt,contents,created_at FROM myblog.posts";
        $results = Database::queryAll($query);
        $blogPosts = [];
        foreach ($results as $result) {
            $blogPosts[] = new BlogModel(
                $result['title'],
                $result['author'],
                $result['excerpt'],
                $result['contents'],
                $result['id'],
                $result['created_at']
            );
        }
        return $blogPosts;
    }

    public static function recentPosts(): false|array
    {
        $query = "SELECT id,title,author,excerpt,contents,created_at FROM myblog.posts LIMIT 5";
        $results = Database::queryAll($query);
        $blogPosts = [];
        foreach ($results as $result) {
            $blogPosts[] = new BlogModel(
                $result['title'],
                $result['author'],
                $result['excerpt'],
                $result['contents'],
                $result['id'],
                $result['created_at'],
            );
        }
        return $blogPosts;
    }

    public static function getPost($id): BlogModel
    {
        $query = "SELECT id,title,author,excerpt,contents,created_at FROM myblog.posts WHERE id = :id";
        $result = Database::querySingle($query, [
            ':id' => $id
        ]);
        return new BlogModel(
            $result['title'],
            $result['author'],
            $result['excerpt'],
            $result['contents'],
            $result['id'],
            $result['created_at'],
        );
    }

    public function save() {

        try {
            $query = 'INSERT INTO myblog.posts (title,author,excerpt,contents)
                      VALUES (:title,:author,:excerpt,:contents)';

            return Database::execute($query, [
                ':title' => $this->title,
                ':author' => $this->author,
                ':excerpt' => $this->excerpt,
                ':contents' => $this->contents,
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

    public function update(): bool {


        $query = 'UPDATE myblog.posts
                  SET title = :title, author = :author, excerpt = :excerpt, contents = :contents
                  WHERE id = :id';

        return Database::execute($query, [
            ':id' => $this->id,
            ':title' => $this->title,
            ':author' => $this->author,
            ':excerpt' => $this->excerpt,
            ':contents' => $this->contents,
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

    public static function delete($id): bool
    {

        $query = 'DELETE FROM myblog.posts
                  WHERE id = :id';

        return Database::execute($query, [
            ':id' => $id
        ]);

//        $statement = $this->db->query($query);
//        $statement->bindValue(':id',$id);
//        $statement->execute();
//        $statement->closeCursor();
    }


}

