<?php


require "../database/dbBroker.php";
require "../model/user.php";


session_start();


if (isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] != '' && $_POST['password'] != '') {
    $name1 = $_POST['username'];
    $password1 = $_POST['password'];

    $result = User::logIn($name1, $password1, $conn);

    if ($result->num_rows == 1) {
        $_SESSION['isLogged'] = "true";
        $_SESSION['userID'] = $result->fetch_column(0);
        $_SESSION['username'] = $name1;
        echo "success";
    } else {
        echo 'noResult';
    }
} else {
    echo 'noFill';
}
