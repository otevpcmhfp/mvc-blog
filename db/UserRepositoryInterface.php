<?php

interface UserRepositoryInterface
{
    public function create(UserModel $userModel):bool;

    public function signIn(string $email, string $password): bool;
    public function signOut(): void;
}