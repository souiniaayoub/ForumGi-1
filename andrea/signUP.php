<?php
require '../Forum-index/inc/dbh.inc.php';
$lastName = "Mustapha";
$firstName = "Amrouch";
$email = "med.oblla@gmail.com";
$password = "zlatan";
$cne = "J545748";


$sql = "INSERT INTO admine (cne,firstName,lastName,email,password) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo $conn->error;
} else {
    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss", $cne, $firstName, $lastName, $email, $hashedpwd);
    mysqli_stmt_execute($stmt);
}


mysqli_stmt_close($stmt);
mysqli_close($conn);
