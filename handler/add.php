<?php

require "../database/dbBroker.php";
require "../model/beer.php";

if (
    isset($_POST['name']) && isset($_POST['country']) && isset($_POST['type']) &&
    isset($_POST['alcohol']) && isset($_POST['size']) && isset($_POST['rating'])
) {
    if (isset($_SESSION['userID'])) {
        $status = Beer::addBeer($_POST['name'], $_POST['country'], $_POST['type'], $_POST['alcohol'], $_POST['size'], $_POST['rating'], $_SESSION['userID'], $conn);
    } else {
        echo "noUser";
    }

    if ($status) {
        echo 'success';
    } else {
        echo $status;
        echo 'failed';
    }
}
