<?php



class User
{
    public $id;
    public $username;
    public $password;


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
}
