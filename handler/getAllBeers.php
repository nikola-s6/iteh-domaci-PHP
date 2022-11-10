<?php

require "../database/dbBroker.php";
require "../model/beer.php";

session_start();

if (isset($_SESSION['userID'])) {
    $result = Beer::getAllBeers($_SESSION['userID'], $conn);
}

if ($result) {
    while ($row = $result->fetch_array()) {
        echo json_encode($row);
    }
} else {
    echo 'failed';
}
