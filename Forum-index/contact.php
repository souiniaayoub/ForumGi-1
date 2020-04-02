<!DOCTYPE html>
<html lang="en">

<head>
	<title>Course - Contact</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Course Project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
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
						<li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
						<li class="menu_item menu_mm"><a href="elements.html">Elements</a></li>
						<li class="menu_item menu_mm"><a href="news.html">News</a></li>
						<li class="menu_item menu_mm"><a href="#">Contact</a></li>
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
				<div class="home_background prlx" style="background-image:url(images/contact_background.jpg)"></div>
			</div>
			<div class="home_content">
				<h1>Contact</h1>
			</div>
		</div>

		<!-- Contact -->

		<div class="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">

						<!-- Contact Form -->
						<div class="contact_form">

							<div class="contact_title">Get in touch</div>

							<div class="contact_form_container">
								<form name="f" METHOD="POST" ACTION="SendMessageToDB.php">
									<input name="name" class="input_field contact_form_name" type="text" placeholder="Name" required data-error="Name is required.">
									<input name="email" class="input_field contact_form_email" type="email" placeholder="E-mail" required data-error="Valid email is required.">
									<textarea name="message" class="text_field contact_form_message" name="message" placeholder="Message" required data-error="Please, write us a message."></textarea>
									<button type=submit class="contact_send_btn trans_200" value="Submit" name="SendMessage">send message</button>
								</form>
							</div>

						</div>

					</div>

					<div class="col-lg-4">
						<div class="about">
							<div class="about_title">Join Courses</div>
							<p class="about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.</p>

							<div class="contact_info">
								<ul>
									<li class="contact_info_item">
										<div class="contact_info_icon">
											<img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
										</div>
										Blvd Libertad, 34 m05200 Arévalo
									</li>
									<li class="contact_info_item">
										<div class="contact_info_icon">
											<img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
										</div>
										0034 37483 2445 322
									</li>
									<li class="contact_info_item">
										<div class="contact_info_icon">
											<img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
										</div>hello@company.com
									</li>
								</ul>
							</div>

						</div>
					</div>

				</div>

			</div>
		</div>

		<!-- Footer -->
		<?php require_once('footer.inc.php')  ?>