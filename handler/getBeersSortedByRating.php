<?php

require "../database/dbBroker.php";
require "../model/beer.php";

session_start();

if (isset($_SESSION['userID'])) {
    $status = Beer::getBeersSortedByRating($_SESSION['userID'], $_POST['name'], $conn);
} else {
    echo 'failedUserID';
}

if ($status) {
    while ($row = $status->fetch_array()) {
        echo json_encode($row);
    }
}
