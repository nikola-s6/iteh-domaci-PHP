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
            <!-- Icon -->
            <div class="fadeIn first">
                <img src="/util/logo.png" id="icon" alt="User Icon" />
            </div>

            <!-- Register Form -->
            <form method="POST" id="formRegister">
                <input type="text" id="login" class="fadeIn second form-control" name="username" placeholder="username">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="password" id="passwordCheck" class="fadeIn fourth block" name="passwordCheck" placeholder="repeat password">

                <input type="submit" class="fadeIn fifth" value="Register" id="btnRegister">
            </form>

            <!-- Log in link -->
            <div id="formFooter">
                <a class="underlineHover" href="login.php">Already have and account? Log in here!</a>
            </div>

        </div>
    </div>


    <script src="/js/login.js"></script>
    <script src="/js/main.js"></script>

</body>

</html>