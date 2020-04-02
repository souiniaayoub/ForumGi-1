<?php

$user = 'root';
$pass = '';
$dsn = 'mysql:host=localhost;dbname=forum';

try {
    $dbh = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    print "Erreur ! : " . $e->getMessage() . "<br/>";
    die();
}


// Acceess to database 
if ($dbh) {

    $Query = "SELECT * FROM messages Where statu=0 ";
    $sth = $dbh->query($Query);
    $news = $sth->fetchAll(PDO::FETCH_ASSOC);
    $results_par_page = 2;
    $number_of_results = count($news);

    $number_of_pages = ceil($number_of_results / $results_par_page);

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $this_page_first_result = ($page - 1) * $results_par_page;


    $sql = "SELECT * FROM messages Where statu=0 ORDER By id desc LIMIT " . $this_page_first_result . ',' . $results_par_page . "";

    $st = $dbh->query($sql);

    if ($st) {
        $messages = $st->fetchAll(PDO::FETCH_ASSOC);
    } else {
    }

    if (isset($_POST["replayto"])) {
        $id = $_POST["idMsg"];
        $userEmail = $_POST["sendto"];
        $msg = $_POST["replayedMsgs"];
        $Query = "UPDATE  messages SET statu = 1 WHERE id = '$id'";
        $sth = $dbh->prepare($Query);
        $sth->execute();
        $to = $userEmail;
        $subject = "Replay from ForumIno";
        $message = $msg;
        $headers = "From : GI Forum Support\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        if (mail($to, $subject, $message, $headers)) {
            header("Location: messages.php?signup=success");
            exit();
        } else {
            echo "mail failed";
        }
    }

    $dbh = NULL; // Close PDO connexion
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Andrea - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
</head>

<body>

    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <?php
        require_once('right_nav.php');
        ?>
        <!-- END COLORLIB-ASIDE -->
        <div id="colorlib-main">
            <section class="ftco-section">
                <div class="container">
                    <div class="row px-md-4">

                        <?php foreach ($messages as $message) { ?>
                            <div class="col-md-12  btn-light ">
                                <div class="blog-entry ftco-animate d-md-flex">
                                    <div class="text text-2 pl-md-4">
                                        <h5 class="mb-2"><a href="single.html"> From <?php echo $message['fullName']; ?> | Email : <?php echo $message['email']; ?></a></h5>

                                        <p class="mb-4"><?php echo $message['message']; ?>.</p>
                                        <p class="mb-4 ml-4 btn btn-warning " id="btn-<?php echo $message['id']; ?>" style="float: right;" onclick="replay(<?php echo $message['id']; ?>)">Replay</p>

                                        <?php

                                        ?>
                                        <div class="rep" id="rep-<?php echo $message['id']; ?>" style="display: none">

                                            <form action="" method="post">

                                                <input type="hidden" name="sendto" value="<?php echo $message['email']; ?>">
                                                <input type="hidden" name="idMsg" value="<?php echo $message['id']; ?>">

                                                <textarea class="mt-3 " name="replayedMsgs" id="" cols="30" rows="10"></textarea>

                                                <input type="submit" name="replayto" class="btn btn-info mt-3 " value="Replay">
                                            </form>


                                        </div>


                                    </div>
                                </div>
                            </div>
                        <?php }  ?>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="block-27">
                                <ul>
                                    <?php
                                    for ($page = 1; $page <= $number_of_pages; $page++) {
                                        echo '<li class="active ml-1 mr-1 "><span> ' . ' <a href="messages.php?page=' . $page . '" >' . $page . '</a>' . ' </span></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
        </div><!-- END COLORLIB-MAIN -->
    </div><!-- END COLORLIB-PAGE -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>

    <script>
        function replay(id) {
            document.getElementById("rep-" + id).style.display = "block";
            document.getElementById("btn-" + id).style.display = "none";
        }
    </script>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>