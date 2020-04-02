<?php
require_once('dataSanitize.inc.php');
session_start();
$user = 'root';
$pass = '';
$dsn = 'mysql:host=localhost;dbname=forum';

try {
    $dbh = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    print "Erreur ! : " . $e->getMessage() . "<br/>";
    die();
}
if (isset($_POST['submitcomment'])) {
    $cne = $_SESSION['cne'];
    $idnew = $_GET['id'];
    $comment = validate_string($_POST['comment']);
    $query = "INSERT INTO comments (idNew,cneAuthor,contentComment) VALUES(?,?,?)";
    $stmp = $dbh->prepare($query);
    $stmp->execute([$idnew, $cne, $comment]); // Close PDO connexion

    header('Location:' . $_SERVER['HTTP_REFERER']);
    exit;
}
