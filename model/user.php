<?php



class User
{
    private $id;
    private $username;
    private $password;


    public function __construct($id = null, $username = null, $password = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
    public static function logIn($username, $password, mysqli $conn)
    {
        $q = "select * from user where username= '" . $username . "' and password ='" . $password . "' limit 1;";

        return $conn->query($q);
    }
    public static function register($username, $password, mysqli $conn)
    {
        $q = "insert into user (username, password) values ('" . $username . "', '" . $password . "');";

        try {
            return $conn->query($q);
        } catch (\Throwable $th) {
            echo '<script type="text/javascript">console.log(' . $th . ';</script>';
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }
}
