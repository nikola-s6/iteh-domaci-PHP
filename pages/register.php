<?php

require "../database/dbBroker.php";
require "../model/user.php";


session_start();

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordCheck'])) {
    if ($_POST['password'] == $_POST['passwordCheck']) {
        $username1 = $_POST['username'];
        $password1 = $_POST['password'];
        $result = User::register($username1, $password1, $conn);

        if ($result == 1) {
            header('Location: login.php');
            exit();
        } else {
            echo '<script type="text/javascript">alert("Username already exists!");</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Passwords do not match!");</script>';
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/util/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/login-page.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Pivoteka</title>
</head>

<body>


    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="/util/logo.png" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form method="POST">
                <input type="text" id="login" class="fadeIn second form-control" name="username" placeholder="username">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="password" id="passwordCheck" class="fadeIn fourth block" name="passwordCheck" placeholder="repeat password">

                <input type="submit" class="fadeIn fifth" value="Register" id="btnRegister">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="login.php">Already have and account? Log in here!</a>
            </div>

        </div>
    </div>


    <script src="/js/login.js"></script>

</body>

</html>