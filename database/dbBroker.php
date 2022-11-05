<?php

$host = "localhost";
$db = "itehdomaci";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_errno) {
    exit("Unsuccessfull connection: " . $conn->connect_errno);
}
