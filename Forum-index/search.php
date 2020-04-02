<?php
// establish PDO Database Connexion 

if (isset($_POST['search'])) {

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
        $lvl = $_POST['lvl'];
        $crs = $_POST['coursename'];
        $Query = "SELECT nameCourse,descriptionCourse,level,imageCourse,nameTeach  FROM teacher T ,course C WHERE level = $lvl and nameCourse like '%$crs%'   and T.numTeach = C.teacherId ; ";
        $sth = $dbh->query($Query);
        $courses = $sth->fetchAll(PDO::FETCH_ASSOC);


        $dbh = NULL; // Close PDO connexion
    }
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
                        <span>course</span>
                    </div>
                </div>

                <!-- Main Navigation -->
                <nav class="main_nav_container">
                    <div class="main_nav">
                        <ul class="main_nav_list">
                            <li class="main_nav_item"><a href="index.html">home</a></li>
                            <li class="main_nav_item"><a href="#">about us</a></li>
                            <li class="main_nav_item"><a href="#">courses</a></li>
                            <li class="main_nav_item"><a href="elements.html">elements</a></li>
                            <li class="main_nav_item"><a href="news.html">news</a></li>
                            <li class="main_nav_item"><a href="contact.html">contact</a></li>
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
                        <li class="menu_item menu_mm"><a href="index.html">Home</a></li>
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
                <h1>Courses</h1>
            </div>
        </div>

        <!-- Popular -->

        <div class="popular page_section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1>Popular Courses</h1>
                        </div>
                    </div>
                </div>

                <div class="row course_boxes">

                    <!-- Popular Course Item -->
                    <?php

                    foreach ($courses as $course) { ?>

                        <div class="col-lg-4 course_box">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo $course['imageCourse']; ?>" alt="<?php echo $course['nameCourse']; ?> Course">
                                <div class="card-body text-center">
                                    <div class="card-title"><a href="courses.html"><?php echo $course['nameCourse']; ?></a></div>
                                    <div class="card-text"><?php echo $course['descriptionCourse']; ?> etc...</div>
                                </div>
                                <div class="price_box d-flex flex-row align-items-center">
                                    <div class="course_author_image">
                                        <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                                    </div>
                                    <div class="course_author_name"> <?php echo $course['nameTeach']; ?> , <span>Author</span></div>
                                    <div class="course_price d-flex flex-column align-items-center justify-content-center"><span style="font-weightbolder;">></span></div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>


                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once('footer.inc.php')  ?>