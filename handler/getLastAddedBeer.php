<?php

require "../database/dbBroker.php";
require "../model/beer.php";

$status = Beer::getLastAdded($conn);

if ($status) {
    echo json_encode($status);
} else {
    echo 'failed';
}
