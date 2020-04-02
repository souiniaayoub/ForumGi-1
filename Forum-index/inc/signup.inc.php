<?php
require 'dbh.inc.php';
require 'functions.inc.php';
if (isset($_POST["singUp"])) {
    $userName = explode(" ", $_POST["userName"]);
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cne = $_POST["cne"];
    // Escping SQL injection attacks-----------------------------
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);
    $cne = $conn->real_escape_string($cne);
    $firstName = $conn->real_escape_string($userName[0]);
    $lastName = $conn->real_escape_string($userName[1]);
    $year = (empty($year)) ? $_POST["year"] : null;
    // Generating Verification key--------------------------------
    $vkey = md5(time() . $lastName);
    if (!validate_string($firstName) && !validate_string($lastName) && !validate_email($email) && !validate_num($cne) && !validate_password($password) && $year == null) {
        header("Location: ../loginSingUp.php?error=invalidInput");
        exit();
    } else if (!validate_string($firstName) || !validate_string($lastName)) {
        header("Location: ../loginSingUp.php?error=invaliduser&email=" . $firstName . "&cne=" . $lastName);
        exit();
    } else if (!validate_email($email)) {
        header("Location: ../loginSingUp.php?error=invalidmail&user=" . $userName . "&cne=" . $cne);
        exit();
    } else if (!validate_password($password)) {
        header("Location: ../loginSingUp.php?error=invalidpwd&user=" . $userName . "&email=" . $email . "&cne=" . $cne);
        exit();
    } else if ($year == null) {
        header("Location: ../loginSingUp.php?error=requiredyear&user=" . $userName . "&email=" . $email . "&cne=" . $cne);
        exit();
    } else {
        $sql = "SELECT cne FROM users WHERE cne=? OR email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../loginSingUp.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $cne, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../loginSingUp.php?error=exists&user=" . $userName);
                exit();
            } else {
                $sql = "INSERT INTO users (cne,firstName,lastName,email,password,year,vkey) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../loginSingUp.php?error=sqlerror");
                    exit();
                } else {
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssssss", $cne, $firstName, $lastName, $email, $hashedpwd, $year, $vkey);
                    mysqli_stmt_execute($stmt);
                    $to = $email;
                    $subject = "Email Verification";
                    $message = "<a href = 'http://localhost/forum/Forum-index/inc/verify.php?vkey=$vkey'>Register Account</a>";
                    $headers = "From : GI Forum Support\r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    if (mail($to, $subject, $message, $headers)) {
                        header("Location: ../loginSingUp.php?signup=success");
                        exit();
                    } else {
                        echo "mail failed";
                    }
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../loginSingUp.php");
    exit();
}
