<?php

require "../database/dbBroker.php";
require "../model/beer.php";

session_start();
if (isset($_SESSION['userID'])) {
    $status = Beer::getLastAdded($_SESSION['userID'], $conn);
}
if ($status) {
    // $row = $result->fetch_array();
    // echo json_encode($status);

    while ($row = $status->fetch_assoc()) {
        $myArray[] = $row;
    }
    echo json_encode($myArray);
} else {
    echo 'failed';
}
