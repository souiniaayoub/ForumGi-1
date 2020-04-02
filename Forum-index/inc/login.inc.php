<?php
require 'dbh.inc.php';
if (isset($_POST['singIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../loginSingUp.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $pwdCheck = password_verify($password, $row['password']);
            if ($pwdCheck == false) {
                header("Location: ../loginSingUp.php?error=wrongpwd");
                exit();
            } else if ($pwdCheck == true) {
                if ($row['verified'] == 1) {
                    session_start();
                    $_SESSION['firstName'] = $row['firstName'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['cne'] = $row['cne'];
                    $_SESSION['level'] = $row['year'];
                    header("Location: ../indexx.php?login=success");
                    exit();
                } else {
                    header("Location: inverified.php?login=unverified&email=" . $email . "&date=" . $row['created_at']);
                    exit();
                }
            }
        } else {
            header("Location: ../loginSingUp.php?error=nouser");
            exit();
        }
    }
} else {
    header("Location: ../loginSingUp.php");
    exit();
}
