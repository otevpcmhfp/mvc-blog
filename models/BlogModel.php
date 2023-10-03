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
}