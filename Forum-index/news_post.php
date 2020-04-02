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

	if (isset($_GET['id'])) {

		$id = $_GET['id'];
		$Query = "SELECT id,titleNews,descriptionNews,contentNews,imageNews,dateNews,nbCommentsNews From news WHERE id =$id ";
		$sth = $dbh->query($Query);
		$news = $sth->fetchAll(PDO::FETCH_ASSOC);

		$Query1 = "SELECT idNew,U.firstName,contentComment,dateComment FROM users U, Comments C WHERE U.cne = C.cneAuthor and idNew = $id ;";

		$st = $dbh->query($Query1);
		$comments = $st->fetchAll(PDO::FETCH_ASSOC);


		$dbh = NULL; // Close PDO connexion
	}
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Course - News Post</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Course Project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/news_post_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/news_post_responsive.css">
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
						<li class="menu_item menu_mm"><a href="#">About us</a></li>
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

					<!-- News Post Column -->

					<div class="col-lg-8">

						<div class="news_post_container">
							<!-- News Post -->


							<?php

							if (isset($news)) {

								foreach ($news as $new) { ?>

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
													<a href=""><?php echo  $new['titleNews']; ?></a>
												</div>
												<div class="news_post_meta">
													<span class="news_post_author"><a href="#">By Admin</a></span>
													<span>|</span>
													<span class="news_post_comments"><a href="#"><?php echo  $new['nbCommentsNews']; ?> Comments</a></span>
												</div>
											</div>
										</div>
										<div class="news_post_quote">
											<p class="news_post_quote_text"><?php echo  $new['descriptionNews']; ?>.</p>
										</div>
										<div class="news_post_text">
											<p><a href="#"><?php echo  $new['contentNews']; ?> . </p>
										</div>
									</div>

							<?php }
							} ?>

						</div>

						<!-- Comments -->
						<div class="news_post_comments">
							<div class="comments_title">Comments</div>
							<ul class="comments_list">



								<?php

								if (isset($comments)) {

									foreach ($comments as $comment) {

								?>
										<li class="comment">
											<div class="comment_container d-flex flex-row">
												<div>
													<div class="comment_image">
														<img src="images/comment_2.jpg" alt="">
													</div>
												</div>
												<div class="comment_content">
													<div class="comment_meta">
														<span class="comment_name"><a href="#"> <?php echo $comment['firstName']; ?> </a></span>
														<span class="comment_separator">|</span>
														<span class="comment_date"><?php echo $comment['dateComment']; ?></span>
														<span class="comment_separator">|</span>
														<span class="comment_reply_link"><a href="#">Reply</a></span>
													</div>
													<p class="comment_text"><?php echo $comment['contentComment']; ?>. </p>
												</div>
											</div>
										</li>
								<?php }
								}  ?>

							</ul>

						</div>

						<!-- Leave Comment -->

						<div class="leave_comment">
							<div class="leave_comment_title">Leave a comment</div>

							<div class="leave_comment_form_container">
								<form action="inc/comments.inc.php?id=<?php echo $_GET['id'] ?>" method="POST">
									<textarea id="comment_form_message" class="text_field contact_form_message" name="comment" placeholder="Comment" required="required" data-error="Please, write us a comment."></textarea>
									<button id="comment_send_btn" type="submit" name="submitcomment" class="comment_send_btn trans_200" value="Submit">send Comment</button>
								</form>
							</div>
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

							<!-- Latest Posts -->

							<div class="sidebar_section">
								<div class="sidebar_section_title">
									<h3>Latest posts</h3>
								</div>

								<div class="latest_posts">

									<!-- Latest Post -->
									<?php
									if (isset($comments)) {

										foreach ($comments as $comment) { ?>

											<div class="latest_post">
												<div class="latest_post_image">
													<img src="images/latest_1.jpg" alt="https://unsplash.com/@dsmacinnes">
												</div>
												<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
												<div class="latest_post_meta">
													<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
													<span>|</span>
													<span class="latest_post_comments"><a href="#">3 Comments</a></span>
												</div>
											</div>

									<?php }
									}  ?>

									<!-- Latest Post -->
									<div class="latest_post">
										<div class="latest_post_image">
											<img src="images/latest_2.jpg" alt="https://unsplash.com/@erothermel">
										</div>
										<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
										<div class="latest_post_meta">
											<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
											<span>|</span>
											<span class="latest_post_comments"><a href="#">3 Comments</a></span>
										</div>
									</div>

									<!-- Latest Post -->
									<div class="latest_post">
										<div class="latest_post_image">
											<img src="images/latest_3.jpg" alt="https://unsplash.com/@element5digital">
										</div>
										<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
										<div class="latest_post_meta">
											<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
											<span>|</span>
											<span class="latest_post_comments"><a href="#">3 Comments</a></span>
										</div>
									</div>

								</div>

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