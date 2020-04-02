<?php
// establish PDO Database Connexion 



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

	$Query = "SELECT id,titleNews,descriptionNews,contentNews,imageNews,dateNews,nbCommentsNews FROM news Limit 3";
	$sth = $dbh->query($Query);
	$news = $sth->fetchAll(PDO::FETCH_ASSOC);


	$dbh = NULL; // Close PDO connexion
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Course - News</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Course Project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/news_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/news_responsive.css">
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
						<li class="menu_item menu_mm"><a href="#">News</a></li>
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

					<div class="menu_copyright menu_mm">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
				</div>

			</div>

		</div>

		<!-- Home -->

		<div class="home">
			<div class="home_background_container prlx_parent">
				<div class="home_background prlx" style="background-image:url(images/news_background.jpg)"></div>
			</div>
			<div class="home_content">
				<h1>The News</h1>
			</div>
		</div>

		<!-- News -->

		<div class="news">
			<div class="container">
				<div class="row">

					<!-- News Column -->

					<div class="col-lg-8">

						<div class="news_posts">
							<!-- News Post -->

							<?php foreach ($news as $new) { ?>

								<div class="news_post">
									<div class="news_post_image">
										<img src="../andrea/<?php echo $new['imageNews']; ?>" alt="https://unsplash.com/@dsmacinnes">
									</div>
									<div class="news_post_top d-flex flex-column flex-sm-row">
										<div class="news_post_date_container">
											<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
												<div> <?php echo date('D', strtotime($new['dateNews'])) ?></div>
												<div><?php echo date('M', strtotime($new['dateNews'])) ?></div>
											</div>
										</div>
										<div class="news_post_title_container">
											<div class="news_post_title">
												<a href="news_post.php"><?php echo  $new['titleNews']; ?></a>
											</div>
											<div class="news_post_meta">
												<span class="news_post_author"><a href="#">By Admin</a></span>
												<span>|</span>
												<span class="news_post_comments"><a href="#"><?php echo  $new['nbCommentsNews']; ?> Comments</a></span>
											</div>
										</div>
									</div>
									<div class="news_post_text">
										<p><?php echo substr($new['descriptionNews'], 0, 150) . "...."; ?>.</p>
									</div>
									<div class="news_post_button text-center trans_200">
										<a href="<?php echo 'news_post.php?id=' . $new['id']; ?>">Read More</a>
									</div>
								</div>

							<?php } ?>
						</div>

						<!-- Page Nav -->

						<div class="news_page_nav">
							<ul>
								<li class="active text-center trans_200"><a href="#">01</a></li>
								<li class="text-center trans_200"><a href="#">02</a></li>
								<li class="text-center trans_200"><a href="#">03</a></li>
							</ul>
						</div>

					</div>

					<!-- Sidebar Column -->

					<div class="col-lg-4">
						<div class="sidebar">

							<!-- Archives -->
							<div class="sidebar_section">
								<div class="sidebar_section_title">
									<h3>Archives</h3>
								</div>
								<ul class="sidebar_list">
									<li class="sidebar_list_item"><a href="#">Design Courses</a></li>
									<li class="sidebar_list_item"><a href="#">All you need to know</a></li>
									<li class="sidebar_list_item"><a href="#">Uncategorized</a></li>
									<li class="sidebar_list_item"><a href="#">About Our Departments</a></li>
									<li class="sidebar_list_item"><a href="#">Choose the right course</a></li>
								</ul>
							</div>




							<!-- Tags -->

							<div class="sidebar_section">
								<div class="sidebar_section_title">
									<h3>Tags</h3>
								</div>
								<div class="tags d-flex flex-row flex-wrap">
									<div class="tag"><a href="#">Course</a></div>
									<div class="tag"><a href="#">Design</a></div>
									<div class="tag"><a href="#">FAQ</a></div>
									<div class="tag"><a href="#">Teachers</a></div>
									<div class="tag"><a href="#">School</a></div>
									<div class="tag"><a href="#">Graduate</a></div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php require_once('footer.inc.php')  ?>