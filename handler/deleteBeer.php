<?php


require "../database/dbBroker.php";
require "../model/beer.php";

if (isset($_POST['beerID'])) {
    $status =  Beer::delete($_POST['beerID'], $conn);
}

if ($status) {
    echo 'success';
} else {
    echo 'failed';
}
