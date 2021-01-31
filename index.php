<?php
    define("PATH_BASE", dirname(__FILE__) . "/admin");
    require("admin/config/dbconfig.php");

    function limit_text_front($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }

        return $text;
    }
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

		<body id="body-index">
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

<!--               	<div id="instafeed">-->
<!--                	<h3>Instagram</h3>-->
<!--				</div>-->

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

				<section class="row" id="grid">
					<div class="grid">
					  <div class="grid-sizer"></div>
					  <?php foreach($project->readProjects() as $row) { ?>
							<div class="grid-item">
								<a href="project.php?id=<?php echo $row['project_id']; ?>">
									<img src="album/<?php echo $row['img_url']; ?>">
									<div class="itemTitle">
										<h2><?php echo $row['title']; ?></h2>
										<p><i class="fa fa-camera"></i> Taken with a Canon Rebel T3i</p>
									</div>
								</a>
							</div>
						<?php } ?>
					</div>
				</section>
			</div>

			<script type="text/javascript" src="assets/js/jquery.js"></script>
			<script type="text/javascript" src="assets/js/wow.min.js"></script>
			<script type="text/javascript" src="assets/js/instafeed.js"></script>
			<script type="text/javascript" src="assets/js/masonry.js"></script>
			<script type="text/javascript">
				new WOW().init();

//			    var feed = new Instafeed({
//			        get: 'user',
//			        userId: '1608051790',
//			        clientId: '2065b6b128ca4cb7ad24fab30309e79a',
//			    });
//			    feed.run();
			</script>

			<script type="text/javascript">
				$(document).ready(function() {
			    	var $grid = $('.grid').masonry({
						itemSelector: '.grid-item',
						percentPosition: true,
						columnWidth: '.grid-sizer'
					});

					$(".menu").on("click", function() {
						$("#menu-overlay").slideToggle();
					});

					$("#menu-overlay i").on("click", function() {
						$("#menu-overlay").slideToggle();
					});
				})
			</script>
		</body>
	</html>
