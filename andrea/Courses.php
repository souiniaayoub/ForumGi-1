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

	$Query = "SELECT numCourse,nameCourse,descriptionCourse,level,imageCourse,nameTeach  FROM teacher T ,course C WHERE T.numTeach = C.teacherId ";
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


	$sql = "SELECT numCourse,nameCourse,descriptionCourse,level,imageCourse,nameTeach,pdf  FROM teacher T ,course C WHERE T.numTeach = C.teacherId ORDER By C.numCourse desc LIMIT " . $this_page_first_result . ',' . $results_par_page . "";

	$st = $dbh->query($sql);

	if ($st) {
		$courses = $st->fetchAll(PDO::FETCH_ASSOC);
	} else {
	}

	$sql1 = "SELECT numTeach,nameTeach from teacher";

	$st1 = $dbh->query($sql1);

	if ($st1) {
		$teachers = $st1->fetchAll(PDO::FETCH_ASSOC);
	} else {
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

						<?php foreach ($courses as $course) { ?>
							<div class="col-md-12">
								<div class="blog-entry ftco-animate d-md-flex">
									<a href="" class="img img-2" style="background-image: url('<?php echo $course['imageCourse']; ?>');"></a>
									<div class="text text-2 pl-md-4">
										<h3 class="mb-2"><a href=""><?php echo $course['nameCourse']; ?></a></h3>
										<div class="meta-wrap">
											<p class="meta">
												<span><a href=""><i class="icon-folder-o mr-2"></i>Techer : <?php echo $course['nameTeach']; ?></a></span>
												<span><i class="icon-comment2 mr-2"></i>Level:<?php echo $course['level']; ?></span>
											</p>
										</div>
										<p class="mb-4"><?php echo $course['descriptionCourse']; ?>.</p>
										<p><a href="<?php echo $course['pdf']; ?>" class="btn-custom">Course link <span class="ion-ios-arrow-forward"></span></a></p>
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
										echo '<li class="active ml-1 mr-1 "><span> ' . ' <a href="Courses.php?page=' . $page . '" >' . $page . '</a>' . ' </span></li>';
									}

									?>
								</ul>
							</div>
						</div>
					</div>
					<?php if (isset($success)) { ?>
						<div class="alert-success">
							<p>
								<?php echo $success; ?>
							</p>
						</div>
					<?php } ?>
					<?php if (isset($failed)) { ?>
						<div class="alert-danger">
							<p>
								<?php echo $failed; ?>
							</p>
						</div>
					<?php } ?>
					<div class="col-xl-8 py-5 px-md-5">

						<h1> Let's Add New Course To Our Students</h1>

						<form method="POST" id="comment_form" action="add_course.php" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" class="form-control" name="title" id="title" placeholder="News Title" value="jdosjoifcd">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="description" id="description" placeholder="News description" value="jdosjoifcd">
							</div>
							<div class="form-group">
								<select class="form-control" name="teacher" required>
									<option value="" selected disabled>select the course teacher</option>
									<?php foreach ($teachers as $teacher) { ?>
										<option name="teacher" value="<?php echo $teacher['numTeach']; ?>"> <?php echo $teacher['nameTeach']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" name="level" required>
									<option value="" selected disabled>select the course Level</option>
									<option value="1">1</option>
									<option value="2">2</option>
								</select>
							</div>
							<div class="form-group">
								<label for="pdf">Course Image</label>
								<input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
							</div>
							<div class="form-group">
								<label for="pdf">Upload Course</label>
								<input type="file" class="form-control" name="pdf" id="pdf">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" id="submit" class="btn btn-warning" value="Submit" />
							</div>
						</form>
					</div>
					<span id="comment_message">
						<?php
						if (isset($error)) {
							foreach ($error as $err) { ?>

								<div>
									<p class="btn btn-warning"> <?php echo $err; ?> </p>
								</div>

						<?php 	}
						}
						?>
					</span>

				</div>
			</section>

		</div><!-- END COLORLIB-MAIN -->

	</div><!-- END COLORLIB-PAGE -->

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


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