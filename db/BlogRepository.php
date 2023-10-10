<?php

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function all(): array
    {
        $query = "SELECT id,title,author,excerpt,contents,created_at FROM myblog.posts";
        $results = $this->queryAll($query);
        $posts = [];
        foreach ($results as $result) {
            $posts[] = new BlogModel(
                $result['title'],
                $result['author'],
                $result['excerpt'],
                $result['contents'],
                $result['id'],
                $result['created_at']
            );
        }
        return $posts;
    }

    public function recent(): array
    {
        $query = "SELECT id,title,author,excerpt,contents,created_at FROM myblog.posts LIMIT 5";
        $results = $this->queryAll($query);
        $posts = [];
        foreach ($results as $result) {
            $posts[] = new BlogModel(
                $result['title'],
                $result['author'],
                $result['excerpt'],
                $result['contents'],
                $result['id'],
                $result['created_at']
            );
        }
        return $posts;
    }

    public function create(BlogModel $blogModel): bool
    {
        $query = 'INSERT INTO myblog.posts (title,author,excerpt,contents)
                      VALUES (:title,:author,:excerpt,:contents)';
        return $this->execute($query,[
            ':title' => $blogModel->title,
            ':author' => $blogModel->author,
            ':excerpt' => $blogModel->excerpt,
            ':contents' => $blogModel->contents,
        ]);
    }


    public function read(int $id): BlogModel
    {
        $query = "SELECT id,title,author,excerpt,contents,created_at FROM myblog.posts WHERE id = :id";
        $result = $this->querySingle($query, [
            ':id' => $id
        ]);
        return new BlogModel(
            $result['title'],
            $result['author'],
            $result['excerpt'],
            $result['contents'],
            $result['id'],
            $result['created_at']
        );
    }

    public function update(BlogModel $blogModel): bool
    {
        $query = 'UPDATE myblog.posts
                  SET title = :title, author = :author, excerpt = :excerpt, contents = :contents
                  WHERE id = :id';
        return $this->execute($query,[
            ':id' => $blogModel->id,
            ':title' => $blogModel->title,
            ':author' => $blogModel->author,
            ':excerpt' => $blogModel->excerpt,
            ':contents' => $blogModel->contents,
        ]);
    }

    public function delete(int $id): bool
    {
        $query = 'DELETE FROM myblog.posts
                  WHERE id = :id';
        return $this->execute($query,[
            ':id' => $id,
        ]);
    }
}