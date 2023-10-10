<?php

interface BlogRepositoryInterface
{
    /**
     * @return BlogModel[]
     */
    public function all():array;

    /**
     * @return BlogModel[]
     */
    public function recent():array;
    public function create(BlogModel $blogModel): bool;
    public function read(int $id): BlogModel;
    public function update(BlogModel $blogModel);
    public function delete(int $id);
}