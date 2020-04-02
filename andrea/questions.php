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

if ($dbh) {

	$Query = "SELECT * FROM questions WHERE parrent_comment_id = '0' ORDER BY id DESC";
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


	$sql = "SELECT * FROM questions WHERE parrent_comment_id = '0' ORDER BY id DESC LIMIT " . $this_page_first_result . ',' . $results_par_page . "";

	$st = $dbh->query($sql);

	if ($st) {
		$questions = $st->fetchAll(PDO::FETCH_ASSOC);
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
</head>

<body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<?php
		require_once('right_nav.php');
		?>
		<!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
				<div class="container">
					<div class="row d-flex">
						<div class="col-xl-8 px-md-5 py-5">
							<div class="row pt-md-4">


								<div class="container">
									<form method="POST" id="comment_form" style="display: none;">
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



							</div><!-- END-->

						</div>
						<?php
						require_once('left_nav.php')
						?>
						<!-- END COL -->
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
			$('#comment_content').focus();
			$('#comment_form').css('display', 'block');
		});
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