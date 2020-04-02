<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "forum";
$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}
