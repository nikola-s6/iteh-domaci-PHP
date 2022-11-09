<?php

require "../database/dbBroker.php";
require "../model/user.php";


session_start();

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordCheck']) && $_POST['username'] != '' && $_POST['password'] != '' && $_POST['passwordCheck'] != '') {
    if ($_POST['password'] == $_POST['passwordCheck']) {
        $username1 = $_POST['username'];
        $password1 = $_POST['password'];
        $result = User::register($username1, $password1, $conn);

        // echo $result;

        if ($result == 1) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'noMatch';
    }
} else {
    echo 'notFilled';
}
