<?php

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function signIn(string $email, string $password): bool
    {
        $query = "SELECT * FROM myblog.users WHERE email = :email AND password = :password";
        $result = $this->querySingle($query, [
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

    public function signOut(): void
    {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header("Location: " . href("/"));
    }

    public function create(UserModel $userModel): bool
    {
        $query = "INSERT INTO myblog.users
                  (first_name,last_name,email,password)
                  VALUES (:first_name,:last_name,:email,:password)";

        return $this->execute($query,[
            ':first_name' => $userModel->first_name,
            ':last_name' => $userModel->last_name,
            ':email' => $userModel->email,
            ':password' => $userModel->password,
        ]);
    }
}