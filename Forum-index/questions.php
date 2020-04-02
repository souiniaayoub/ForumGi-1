<?php
// establish PDO Database Connexion 

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


// Acceess to database 
if ($dbh) {
    $lvl = $_SESSION['level'];
    $Query = "SELECT numCourse,nameCourse,descriptionCourse,level,imageCourse,nameTeach  FROM teacher T ,course C WHERE level = $lvl  and T.numTeach = C.teacherId ; ";
    $sth = $dbh->query($Query);
    $courses = $sth->fetchAll(PDO::FETCH_ASSOC);
    $dbh = NULL; // Close PDO connexion
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course - Courses</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Course Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/Question_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header d-flex flex-row">
            <div class="header_content d-flex flex-row align-items-center">
                <!-- Logo -->
                <div class="logo_container">
                    <div class="logo">
                        <img src="images/logo.png" alt="">
                        <span><span>FORUM</span><span style="color: orange">Ino</span></span>
                    </div>
                </div>

                <!-- Main Navigation -->
                <nav class="main_nav_container">
                    <div class="main_nav">
                        <ul class="main_nav_list">
                            <li class="main_nav_item"><a href="indexx.php">home</a></li>
                            <li class="main_nav_item"><a href="courses.php">courses</a></li>
                            <li class="main_nav_item"><a href="questions.php">Questions</a></li>
                            <li class="main_nav_item"><a href="news.php">news</a></li>
                            <li class="main_nav_item"><a href="contact.php">contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="header_side d-flex flex-row justify-content-center align-items-center">
                <img src="images/phone-call.svg" alt="">
                <span><a href="inc/logout.inc.php"> Log Out</a></span>
            </div>

            <!-- Hamburger -->
            <div class="hamburger_container">
                <i class="fas fa-bars trans_200"></i>
            </div>

        </header>

        <!-- Header -->



        <!-- Menu -->
        <div class="menu_container menu_mm">

            <!-- Menu Close Button -->
            <div class="menu_close_container">
                <div class="menu_close"></div>
            </div>

            <!-- Menu Items -->
            <div class="menu_inner menu_mm">
                <div class="menu menu_mm">
                    <ul class="menu_list menu_mm">
                        <li class="menu_item menu_mm"><a href="index.php">Home</a></li>
                        <li class="menu_item menu_mm"><a href="#">About us</a></li>
                        <li class="menu_item menu_mm"><a href="#">Courses</a></li>
                        <li class="menu_item menu_mm"><a href="elements.html">Elements</a></li>
                        <li class="menu_item menu_mm"><a href="news.html">News</a></li>
                        <li class="menu_item menu_mm"><a href="contact.html">Contact</a></li>
                    </ul>

                    <!-- Menu Social -->

                    <div class="menu_social_container menu_mm">
                        <ul class="menu_social menu_mm">
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>

                    <div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
                </div>

            </div>

        </div>

        <!-- Home -->

        <div class="home">
            <div class="home_background_container prlx_parent">
                <div class="home_background prlx" style="background-image:url(images/courses_background.jpg)"></div>
            </div>
            <div class="home_content">
                <h1>Questions</h1>
            </div>
        </div>

        <!-- Popular -->

        <div class="popular page_section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1>Top Questions</h1>
                                </div>
                                <div class="col-md-6">
                                    <h1>
                                        <span class=" btn btn-warning ask" id="ask" style="font-weight: bold;"> Ask Question </span>
                                    </h1>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="container">
                    <form method="POST" id="comment_form" style="display: none;">
                        <div class="form-group">
                            <select name="comment_name" id="comment_name" class="form-control">
                                <option value="" disabled selected> Choose subject </option>
                                <?php foreach ($courses as $course) { ?>
                                    <option value="<?php echo $course['nameCourse']; ?>"><?php echo $course['nameCourse']; ?></option>
                                <?php   } ?>
                            </select>
                            <!--  <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" /> -->
                        </div>
                        <div class="form-group">
                            <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="comment_id" id="comment_id" value="0" />
                            <input type="submit" name="submit" id="submit" class="btn btn-warning" value="Submit" />
                        </div>
                    </form>
                    <span id="comment_message"></span>
                    <br />
                    <div id="display_comment"></div>
                </div>





            </div>
        </div>

        <!-- Footer -->
        <?php require_once('footer.inc.php'); ?>

        <script>
            $(document).ready(function() {

                $('#comment_form').on('submit', function(event) {
                    event.preventDefault();
                    var form_data = $(this).serialize();
                    $.ajax({
                        url: "add_comment.php",
                        method: "POST",
                        data: form_data,
                        dataType: "JSON",
                        success: function(data) {
                            if (data.error != '') {
                                $('#comment_form')[0].reset();
                                $('#comment_message').html(data.error);
                                $('#comment_id').val('0');
                                load_comment();
                            }
                        }
                    })
                });
            });

            $(document).on('click', '.ask', function() {
                $('#comment_form').css('display', 'block');

            });


            load_comment();

            function load_comment() {
                $.ajax({
                    url: "fetch_comment.php",
                    method: "POST",
                    success: function(data) {
                        $('#display_comment').html(data);
                    }
                })
            }

            $(document).on('click', '.reply', function() {
                var comment_id = $(this).attr("id");
                $('#comment_id').val(comment_id);
                $('#comment_name').focus();
                $('#comment_form').css('display', 'block');
            });
        </script>