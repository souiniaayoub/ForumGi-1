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
	$Query = "SELECT * FROM teacher  ; ";
	$sth = $dbh->query($Query);
	$teachers = $sth->fetchAll(PDO::FETCH_ASSOC);

	$Query1 = "SELECT * FROM users  ; ";
	$sth = $dbh->query($Query1);
	$students = $sth->fetchAll(PDO::FETCH_ASSOC);

	$Query2 = "SELECT * FROM course  ; ";
	$sth = $dbh->query($Query2);
	$courses = $sth->fetchAll(PDO::FETCH_ASSOC);

	$dbh = NULL; // Close PDO connexion
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Course - Teachers</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Course Project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/teachers_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/teachers_responsive.css">
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
							<li class="main_nav_item"><a href="about.html">about us</a></li>
							<li class="main_nav_item"><a href="courses.html">courses</a></li>
							<li class="main_nav_item"><a href="elements.html">elements</a></li>
							<li class="main_nav_item"><a href="news.html">news</a></li>
							<li class="main_nav_item"><a href="contact.html">contact</a></li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="header_side d-flex flex-row justify-content-center align-items-center">
				<img src="images/phone-call.svg" alt="">
				<span>+43 4566 7788 2457</span>
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
						<li class="menu_item menu_mm"><a href="about.html">About us</a></li>
						<li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
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
				<div class="home_background prlx" style="background-image:url(images/teachers_background.jpg)"></div>
			</div>
			<div class="home_content">
				<h1>Teachers</h1>
			</div>
		</div>

		<!-- Teachers -->

		<div class="teachers page_section">
			<div class="container">
				<div class="row">

					<!-- Teacher -->
					<?php foreach ($teachers as $teacher) { ?>


						<div class="col-lg-4 teacher">
							<div class="card">
								<div class="card_img">
									<div class="card_plus trans_200 text-center"><a href="#">+</a></div>
									<img class="card-img-top trans_200" height="300px" src="<?php if ($teacher['image'] != "") {
																								echo $teacher['image'];
																							} else {
																								echo "images/profs/prof.png";
																							} ?>" alt="https://unsplash.com/@michaeldam">
								</div>
								<div class="card-body text-center">
									<div class="card-title"><a href="#"><?php echo $teacher['nameTeach'] ?></a></div>
									<div class="card-text"><?php echo $teacher['desription'] ?></div>
									<div class="teacher_social">
										<ul class="menu_social">
											<li class="menu_social_item"><a href="<?php echo $teacher['linked'] ?>" target="_blank"><i class=" fab fa-linkedin-in"></i></a></li>
											<li class="menu_social_item"><a href="<?php echo $teacher['fb'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<!-- Milestones -->

		<div class="milestones">
			<div class="milestones_background" style="background-image:url(images/milestones_background.jpg)"></div>

			<div class="container">
				<div class="row">

					<!-- Milestone -->
					<div class="col-lg-4 milestone_col">
						<div class="milestone text-center">
							<div class="milestone_icon"><img src="images/milestone_1.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
							<div class="milestone_counter" data-end-value="<?php echo count($students); ?>">0</div>
							<div class="milestone_text">Current Students</div>
						</div>
					</div>

					<!-- Milestone -->
					<div class="col-lg-4 milestone_col">
						<div class="milestone text-center">
							<div class="milestone_icon"><img src="images/milestone_2.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
							<div class="milestone_counter" data-end-value="<?php echo count($teachers); ?>">0</div>
							<div class="milestone_text">Certified Teachers</div>
						</div>
					</div>

					<!-- Milestone -->
					<div class="col-lg-4 milestone_col">
						<div class="milestone text-center">
							<div class="milestone_icon"><img src="images/milestone_3.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
							<div class="milestone_counter" data-end-value="<?php echo count($courses); ?>">0</div>
							<div class="milestone_text"> Courses</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- Become -->

		<div class="become">
			<div class="container">
				<div class="row row-eq-height">

					<div class="col-lg-6 order-2 order-lg-1">
						<div class="become_title">
							<h1>Become a teacher</h1>
						</div>
						<p class="become_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies venenatis. Suspendisse fermentum sodales lacus, lacinia gravida elit dapibus sed. Cras in lectus elit. Maecenas tempus nunc vitae mi egestas venenatis. Aliquam rhoncus, purus in vehicula porttitor, lacus ante consequat purus, id elementum enim purus nec enim. In sed odio rhoncus, tristique ipsum id, pharetra neque.</p>
						<div class="become_button text-center trans_200">
							<a href="#">All Our Teachers</a>
						</div>
					</div>

					<div class="col-lg-6 order-1 order-lg-2">
						<div class="become_image">
							<img src="images/become.jpg" alt="">
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php require_once('footer.inc.php')  ?>