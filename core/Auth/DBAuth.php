<?php


namespace Core\Auth;


use Core\Database\Database;


class DBAuth
{

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function login($email, $password)
    {
        $user = $this->db->prepare('SELECT * FROM users WHERE email = ?', [$email], null, true);
        if ($user) {
            if ($user->password === sha1($password)) {
                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        return false;
    }
    public function logged()
    {
        return isset($_SESSION['auth']);
    }

}