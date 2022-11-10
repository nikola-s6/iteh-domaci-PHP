<?php

require "../database/dbBroker.php";
require "../model/beer.php";

if (
    isset($_POST['name']) && isset($_POST['country']) && isset($_POST['type']) &&
    isset($_POST['alcohol']) && isset($_POST['size']) && isset($_POST['rating']) && isset($_POST['beerID'])
) {
    $status = Beer::updateBeer($_POST['beerID'], $_POST['name'], $_POST['country'], $_POST['type'], $_POST['alcohol'], $_POST['size'], $_POST['rating'], $conn);

    if ($status) {
        echo 'success';
    } else {
        echo 'nestoNIjeDObro';
    }
} else {
    echo 'noSet';
}
