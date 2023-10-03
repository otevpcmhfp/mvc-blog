<?php
require "PersonModel.php";

class UserModel extends PersonModel {

    private ?string $email;
    private ?string $password;
    private DateTime $created_at;

    public function __construct(string $firstName, string $lastName, ?string $email = null, ?string $password = null)
    {
        $this->email = $email;
        $this->password = $password;
        parent::__construct($firstName, $lastName);
    }

    public static function signIn(string $email, string $password):bool {
        $query = "SELECT * FROM myblog.users WHERE email = :email AND password = :password";
        $result = $db->querySingle($query, [
            ':email' => $email,
            ':password' => $password
        ]);
        if($result) {
            $_SESSION['currentUser'] = $result['first_name'] . ' ' . $result['last_name'];
        } else {
            $_SESSION['currentUser'] = null;
        }

        return !!$result;
    }

    public function getEmail():string {
        return $this->email;
    }

    public function setEmail(string $email):void {
        $this->email = $email;
    }

    public function getPassword():string {
        return $this->password;
    }

    public function setPassword(string $password):void {
        $this->password = $password;
    }

    public function save():void {
//        $this->db->execute('');
    }

    public function getFullName(): string
    {
        // TODO: Implement getFullName() method.
    }
}