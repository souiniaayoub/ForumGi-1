<?php
require 'dbh.inc.php';
if (isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];
    $resultSet = $conn->query("SELECT verified,vkey FROM users WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");
    if ($resultSet->num_rows == 1) {
        $update = $conn->query("UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
        if ($update) {
            header("Location: verified.php");
            exit();
        } else {
            echo "Something went wrong ! ";
        }
    } else {
        header("Location: inverified.php&deja=multi");
        exit();
    }
}
