<?php 
	define("PATH_BASE", dirname(__FILE__) . "/admin");
    require("admin/config/dbconfig.php");
?>

<!DOCTYPE html>
	<html>
		<head>
			<title>RCFM &middot; Home</title>

			<meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
			<meta http-equiv="content-language" content="en-us">
			<meta charset="utf-8">
			<meta name="charset" content="UTF-8">
			<meta name="description" content="">
			<meta name="keywords" content="">
			<meta name="copyright" content="">
			<meta name="author" content="">
			<meta name="designer" content="">
			<meta name="email" content="">
			<meta name="rating" content="General">
			<meta name="distribution" content="Global">

			<link rel="stylesheet" type="text/css" href="assets/css/layout.css">
		</head>

		<body id="body-project">
			<div class="container-fluid">
				<section class="row" id="header">
					<div class="container">
						<div class="col-xs-4">
							<i class="fa fa-bars menu"></i>
						</div>

						<div class="col-xs-4">
							<h1>Rosana</h1>
						</div>

						<div class="col-xs-4">
							<nav>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-500px"></i></a>
								<a href="#"><i class="fa fa-envelope-o"></i></a>
							</nav>
						</div>
					</div>
				</section>

				<section class="row" id="menu-overlay">
					<div class="wrapper wow fadeIn">
						<i class="fa fa-times"></i>

						<nav>
							<a href="index.php">Home</a>
							<a href="about.php">About</a>
							<a href="/admin">Admin</a>
						</nav>
					</div>
				</section>

				<section class="row wow fadeInUp" id="return">
					<div class="container">
						<div class="col-xs-4">
							<button class="return" onclick="goBack()">
								<i class="fa fa-arrow-circle-o-left"></i> Terug
							</button>
					</div>
				</section>

				<?php foreach($project->readSingleProject($_GET['id']) as $row) { ?>
					<section class="row wow fadeInUp" id="item">
						<div class="container">
							<div class="col-xs-12">
								<div class="wrapper item">
									<img src="album/<?php echo $row['img_url']; ?>">

									<div class="item-information">
										<h2><?php echo $row['title']; ?></h2>
										<p><?php echo $row['content']; ?></p>
										<h5><i class="fa fa-calendar"></i> <?php echo $row['date']; ?></h5>
										<h5><i class="fa fa-user"></i> <?php echo $row['author']; ?></h5>
									</div>
								</div>
							</div>
						</div>
					</section>
				<?php } ?>

				<section class="row wow fadeInUp" id="footer">
					<div class="container">
						<div class="col-xs-12">
							<p>&copy; Rosana Carla Furtado Martins 2016 – All rights reserved.</p>
						</div>
					</div>
				</section>
			</div>

			<script type="text/javascript" src="assets/js/jquery.js"></script>
			<script type="text/javascript" src="assets/js/wow.min.js"></script>
			<script type="text/javascript">
				new WOW().init();

				function goBack() {
				    window.history.back();
				}

				$(".menu").on("click", function() {
					$("#menu-overlay").slideToggle();
				});

				$("#menu-overlay i").on("click", function() {
					$("#menu-overlay").slideToggle();
				});
			</script>
		</body>
	</html>
		