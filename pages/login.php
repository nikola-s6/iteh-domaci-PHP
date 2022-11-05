<?php


require "../database/dbBroker.php";
require "../model/user.php";


session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $name1 = $_POST['username'];
    $password1 = $_POST['password'];

    $result = User::logIn($name1, $password1, $conn);

    if ($result->num_rows == 1) {
        echo "You logged in sccessfully";
        $_SESSION['isLogged'] = "true";
        $_SESSION['userID'] = $result->fetch_assoc()['userID'];
        $_SESSION['username'] = $result->fetch_assoc()['username'];
        header('Location: home.php');
        exit();
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
                <input type="text" id="login" class="fadeIn second" name="username" placeholder="username">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="register.php">Don't have an account? Register here!</a>
            </div>

        </div>
    </div>


</body>

</html>