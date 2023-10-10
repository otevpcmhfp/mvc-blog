<?php

class UserModel
{

    public ?int $id;
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $password;

    public function __construct(string $first_name,
                                string $last_name,
                                string $email,
                                string $password,
                                ?int   $id = null
    )
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }
}