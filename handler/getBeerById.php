<?php

require "../database/dbBroker.php";
require "../model/beer.php";

session_start();

if (isset($_POST['beerID'])) {
    if (isset($_SESSION['userID'])) {
        $status = Beer::getBeerById($_SESSION['userID'], $_POST['beerID'], $conn);
    } else {
        echo 'userIDnotSet';
    }
    if ($status) {
        while ($row = $status->fetch_assoc()) {
            $myArray[] = $row;
        }
        echo json_encode($myArray);
    } else {
        echo 'failed';
    }
} else {
    echo 'failedBeerID';
}
